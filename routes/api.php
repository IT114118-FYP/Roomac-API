<?php

use App\Models\User;
use App\Models\Branch;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserPermissionController;

Route::apiResource('/branch', BranchController::class);
Route::apiResource('/program', ProgramController::class);

//Route::get('/user/{user}/permission', [UserController::class, 'permission']);
Route::get('/user/me', [UserController::class, 'myself']);
Route::apiResource('/user', UserController::class);
Route::apiResource('/user.permission', UserPermissionController::class);


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
