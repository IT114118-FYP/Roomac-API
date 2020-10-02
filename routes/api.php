<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


/**
 * POST /api/login
 * 
 * 200 - OK
 * 400 - The request was invalid and/or malformed.
 * 401 - The user was not found or the password was incorrect.
 */
Route::post('/login', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    // Validate the data
    if ($validator->fails()) {
        return response($validator->errors(), 400);
    }

    // Get user object by email or name(cna)
    $user = User::where(filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name', $request->email)->first();

    // If user not exist OR password not match => return error message
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response('The provided credentials are incorrect.', 401);
    }
    
    return $user->createToken($request->device_name)->plainTextToken;
});


/**
 * POST /api/logout?global={global}
 * 
 * global [Boolean] OPTIONAL Defaults to false
 * When this value is set to true all of the tokens issued to the user will be revoked.
 * 
 * 200 - OK
 * 500 - The request was invalid and/or malformed.
 */
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $global = $request->query('global', false);

    if ($global) {
        $request->user()->tokens()->delete();
    } else {
        $request->user()->currentAccessToken()->delete();
    }

    return response(null, 200);
});


/**
 * POST /api/user/me
 * 
 * Fetch current user information
 * 
 * 200 - OK
 * 500 - The request was invalid and/or malformed.
 */
Route::middleware('auth:sanctum')->get('/user/me', function (Request $request) {
    $client = DB::select('SELECT * FROM Client WHERE cna = ?', [$request->user()->name])[0];
    $user = $request->user();
    $user['program_id'] = $client->program_id;
    $user['campus_id'] = $client->campus_id;
    $user['permission_type'] = $client->permission_type;
    $user['first_name'] = $client->first_name;
    $user['last_name'] = $client->last_name;
    $user['chinese_name'] = $client->chinese_name;
    unset($user['id']);
    unset($user['email_verified_at']);

    return $user;
});


/**
 * POST /api/user/create
 * 
 * Create a user with admin account 
 * ⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
 * also Campus Admin cannot create Root Admin account, Campus Admin cannot create Campus Admin/Staff/User account from another campus
 * 
 * 200 - OK
 * 400 - The request was invalid and/or malformed.
 * 401 - The user is already exist.
 * 402 - Not enough permissions.
 * 403 - Cannot create user from another campus.
 * 500 - The request was invalid and/or malformed.
 */
Route::middleware(['auth:sanctum', 'is_campus_admin'])->post('/user/create', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'program_id' => 'required',
        'campus_id' => 'required',
        'permission_type' => 'required|digits_between:0,3',
        'first_name' => 'nullable',
        'last_name' => 'nullable',
        'chinese_name' => 'nullable',
    ]);

    // Validate the data
    if ($validator->fails()) {
        return response($validator->errors(), 400);
    }

    // Check is user already exist
    if (DB::table('users')->where('name', $request->name)->exists()) {
        return response('The user is already exist.', 401);
    }

    // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
    // Prevent Campus Admin create Root Admin account
    $client = DB::select('SELECT permission_type, campus_id FROM Client WHERE cna = ?', [$request->user()->name])[0];
    if ($request->permission_type == 1 && $client->permission_type !== 1) {
        return response('Not enough permissions.', 402);
    }

    // Prevent Campus Admin create Campus Admin/Staff/User account from another campus
    if ($request->permission_type !== 1 && $client->campus_id != $request->campus_id) {
        if ($client->permission_type !== 1) {
            return response('Cannot create user from another campus.', 403);
        }
    }

    // Add User to Database
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    DB::table('Client')->insert([
        'cna' => $request->name,
        'program_id' => $request->program_id,
        'campus_id' => $request->campus_id,
        'permission_type' => $request->permission_type,
        'password' => Hash::make($request->password),
        'first_name' => $request->first_name ?? null,
        'last_name' => $request->last_name ?? null,
        'chinese_name' => $request->chinese_name ?? null,
        'book_quota' => 3,
    ]);

    return response(null, 200);
});


/**
 * POST /api/user/delete
 * 
 * Delete a user with admin account 
 * ⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
 * also Campus Admin cannot delete Root Admin account, Campus Admin cannot delete Campus Admin/Staff/User account from another campus
 * 
 * 200 - OK
 * 400 - The request was invalid and/or malformed.
 * 401 - The user is not exist.
 * 402 - Not enough permissions.
 * 403 - Cannot delete user from another campus.
 * 500 - The request was invalid and/or malformed.
 */
Route::middleware(['auth:sanctum', 'is_campus_admin'])->post('/user/delete', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
    ]);

    // Validate the data
    if ($validator->fails()) {
        return response($validator->errors(), 400);
    }

    // Check is user exist or not
    if (DB::table('users')->where('name', $request->name)->doesntExist()) {
        return response('The user is not exist.', 401);
    }

    // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
    // Prevent Campus Admin delete Root Admin account
    $user = DB::select('SELECT permission_type, campus_id FROM Client WHERE cna = ?', [$request->name])[0];
    $client = DB::select('SELECT permission_type, campus_id FROM Client WHERE cna = ?', [$request->user()->name])[0];
    if ($user->permission_type == 1 && $client->permission_type !== 1) {
        return response('Not enough permissions.', 402);
    }

    // Prevent Campus Admin delete Campus Admin/Staff/User account from another campus
    if ($user->permission_type !== 1 && $client->campus_id != $user->campus_id) {
        if ($client->permission_type !== 1) {
            return response('Cannot delete user from another campus.', 403);
        }
    }

    // Delete User from Database
    DB::table('users')->where('name', $request->name)->delete();
    DB::table('Client')->where('cna', $request->name)->delete();

    return response(null, 200);
});

/*

Some tests...

0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff

---------------------------
POST /api/user/create

L | 1 | 2 | <- Current user permission create account with different permissions
---------------
0 | ✔️ | ✔️ |
1 | ✔️ | ❌(Not enough permissions.) |
2 | ✔️ | ✔️ |
3 | ✔️ | ✔️ |

---------------------------
POST /api/user/delete

L | 1 | 2 | <- Current user permission create account with different permissions
---------------
0 | ✔️ | ✔️ |
1 | ✔️ | ❌(Not enough permissions.) |
2 | ✔️ | ✔️ |
3 | ✔️ | ✔️ |

*/