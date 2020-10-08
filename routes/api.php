<?php

use App\Models\User;
use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\CampusController;

Route::apiResource('/campus', CampusController::class)->middleware('auth:sanctum');

// temp create me
/*
Route::get('/tempcreate', function (Request $request) {
    //create user
    try {
        $user = new User;
        $user->name = '190189768';
        $user->email = '190189768@stu.vtc.edu.hk';
        $user->password = Hash::make('12345678');
        $user->permission = 1;
        $user->program_id = 'IT114118';
        $user->campus_id = 'ST';
        $user->first_name = 'Tat';
        $user->last_name = 'Chan';
        $user->chinese_name = '何世';
        $user->save();
    } 
    catch (Exception $e) { }
    
    //create campus
    try {
        $campus = new Campus;
        $campus->campus_code = '190189768';
        $campus->campus_title_en = 'campus_title_en';
        $campus->campus_title_hk = 'campus_title_hk';
        $campus->campus_title_cn = 'campus_title_cn';
        $campus->save();
    } catch (Exception $e) { }

    return response(null, 200);
});
*/

/**
 * @group Login
 * 
 * Authenticate a User
 * 
 * @response status=200 scenario="success" 1|sNt8wF0Zh4oGJ20O22gns0K4bI2HJfkqNZWiKoEX
 * @response status=401 scenario="The user was not found or the password was incorrect."
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
 * @group Login
 * 
 * Logout a User
 * 
 * @authenticated
 * 
 * @queryParam global When this value is set to true all of the tokens issued to the user will be revoked. Defaults to false. No-example
 * 
 * @response status=200 scenario="success"
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
 * @group Login
 * 
 * Fetch current user information
 * 
 * @authenticated
 * 
 * @response status=200 scenario="success" {"id":1,"name":"190189768","email":"190189768@stu.vtc.edu.hk","permission":"1","program_id":"IT114118","campus_id":"ST","first_name":"Tat","last_name":"Chan","chinese_name":"\u4f55\u4e16","created_at":"2020-10-07T17:44:37.000000Z","updated_at":"2020-10-07T17:44:37.000000Z","deleted_at":null}
 */
Route::middleware('auth:sanctum')->get('/user/me', function (Request $request) {
    $user = User::where('name', $request->user()->name)->first();
    return $user ?? response(null, 500);
});


/**
 * @group User
 * 
 * Create a User
 * 
 * ⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
 * also Campus Admin cannot create Root Admin account, Campus Admin cannot create Campus Admin/Staff/User account from another campus
 * 
 * @authenticated
 * 
 * @response status=200 scenario="success"
 * @response status=400 scenario="The request was invalid and/or malformed."
 * @response status=401 scenario="The user is already exist."
 * @response status=402 scenario="Not enough permissions."
 * @response status=403 scenario="Cannot create user from another campus."
 * @response status=500 scenario="The request was invalid and/or malformed."
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
    if (User::where('name', $request->name)->exists()) {
        return response('The user is already exist.', 401);
    }

    // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
    // Prevent Campus Admin create Root Admin account
    if ($request->permission_type == 1 && $request->user()->permission_type !== 1) {
        return response('Not enough permissions.', 402);
    }

    // Prevent Campus Admin create Campus Admin/Staff/User account from another campus
    if ($request->permission_type !== 1 && $request->user()->campus_id != $request->campus_id) {
        if ($request->user()->permission_type !== 1) {
            return response('Cannot create user from another campus.', 403);
        }
    }

    // Add User
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->permission = 1;
    $user->program_id = $request->program_id;
    $user->campus_id = $request->campus_id;
    $user->first_name = $request->first_name ?? null;
    $user->last_name = $request->last_name ?? null;
    $user->chinese_name = $request->chinese_name ?? null;

    return response(null, $user->save() ? 200 : 405);
});


/**
 * @group User
 * 
 * Delete a User
 * 
 * ⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
 * also Campus Admin cannot delete Root Admin account, Campus Admin cannot delete Campus Admin/Staff/User account from another campus
 * 
 * @response status=200 scenario="success"
 * @response status=400 scenario="The request was invalid and/or malformed."
 * @response status=401 scenario="The user is not exist."
 * @response status=402 scenario="Not enough permissions."
 * @response status=403 scenario="Cannot delete user from another campus."
 * @response status=500 scenario="The request was invalid and/or malformed."
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
    if (User::where('name', $request->name)->doesntExist()) {
        return response('The user is not exist.', 401);
    }

    // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
    // Prevent Campus Admin delete Root Admin account
    $user = User::where('name', $request->name)->first();
    if ($user->permission_type == 1 && $request->user()->permission_type !== 1) {
        return response('Not enough permissions.', 402);
    }

    // Prevent Campus Admin delete Campus Admin/Staff/User account from another campus
    if ($user->permission_type !== 1 && $request->user()->campus_id != $user->campus_id) {
        if ($request->user()->permission_type !== 1) {
            return response('Cannot delete user from another campus.', 403);
        }
    }

    // Delete User from Database
    User::where('name', $request->name)->delete();

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