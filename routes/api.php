<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { 
    return $request->user();
});

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
