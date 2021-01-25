<?php

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\ResourceBookingController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\BranchSettingController;
use App\Http\Controllers\API\CategoryController;

Route::post('/branches/import', [BranchController::class, 'import']);
Route::get('/branches/export', [BranchController::class, 'export']);
Route::delete('/branches', [BranchController::class, 'destroyMany']);
Route::delete('/branches/reset', [BranchController::class, 'reset']);
Route::delete('/branches', [BranchController::class, 'destroyMany']);
Route::apiResource('/branches', BranchController::class);

Route::post('/programs/import', [ProgramController::class, 'import']);
Route::get('/programs/export', [ProgramController::class, 'export']);
Route::delete('/programs', [ProgramController::class, 'destroyMany']);
Route::delete('/programs/reset', [ProgramController::class, 'reset']);
Route::delete('/programs', [ProgramController::class, 'destroyMany']);
Route::apiResource('/programs', ProgramController::class);

Route::post('/resources/import', [ResourceController::class, 'import']);
Route::get('/resources/export', [ResourceController::class, 'export']);
Route::delete('/resources', [ResourceController::class, 'destroyMany']);
Route::delete('/resources/reset', [ResourceController::class, 'reset']);
Route::delete('/resources', [ResourceController::class, 'destroyMany']);
Route::apiResource('/resources', ResourceController::class);

Route::get('/resources/{resource}/bookings', [ResourceBookingController::class, 'index']);
Route::post('/resources/{resource}/bookings', [ResourceBookingController::class, 'store']);
Route::get('/users/{user}/bookings', [ResourceBookingController::class, 'indexUser']);
Route::get('/branches/{branch}/bookings', [ResourceBookingController::class, 'indexBranch']);

Route::get('/users/me', [UserController::class, 'myself']);
Route::post('/users/import', [UserController::class, 'import']);
Route::get('/users/export', [UserController::class, 'export']);
Route::delete('/users', [UserController::class, 'destroyMany']);
Route::delete('/users/reset', [UserController::class, 'reset']);
Route::delete('/users', [UserController::class, 'destroyMany']);
Route::apiResource('/users', UserController::class);

Route::get('/users/{user}/permissions', [PermissionController::class, 'show']);
Route::post('/users/{user}/permissions', [PermissionController::class, 'update']);

Route::get('/branches/{branch}/settings/active', [BranchSettingController::class, 'active']);
Route::get('/branches/{branch}/settings', [BranchSettingController::class, 'index']);
Route::post('/branches/{branch}/settings', [BranchSettingController::class, 'store']);
Route::get('/branches/{branch}/settings/{version}', [BranchSettingController::class, 'show']);
Route::put('/branches/{branch}/settings/{version}', [BranchSettingController::class, 'update']);
Route::delete('/branches/{branch}/settings/{version}', [BranchSettingController::class, 'destroy']);

Route::post('/categories/import', [CategoryController::class, 'import']);
Route::get('/categories/export', [CategoryController::class, 'export']);
Route::delete('/categories', [CategoryController::class, 'destroyMany']);
Route::delete('/categories/reset', [CategoryController::class, 'reset']);
Route::delete('/categories', [CategoryController::class, 'destroyMany']);
Route::apiResource('/categories', CategoryController::class);

Route::apiResource('/settings', SettingController::class);

/**
 * @group Login
 * 
 * Authenticate a user
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
 * Logout a user
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
