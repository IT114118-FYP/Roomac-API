<?php

use App\Models\User;
use App\Models\UserBan;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Resource;
use App\Models\ResourceBooking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserBanController;
use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\ResourceBookingController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\UserRoleController;
use App\Http\Controllers\API\UserPermissionController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\BranchSettingController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TosController;

Route::post('/branches/import', [BranchController::class, 'import']);
Route::get('/branches/export', [BranchController::class, 'export']);
Route::delete('/branches', [BranchController::class, 'destroyMany']);
Route::delete('/branches/reset', [BranchController::class, 'reset']);
Route::apiResource('/branches', BranchController::class);

Route::post('/programs/import', [ProgramController::class, 'import']);
Route::get('/programs/export', [ProgramController::class, 'export']);
Route::delete('/programs', [ProgramController::class, 'destroyMany']);
Route::delete('/programs/reset', [ProgramController::class, 'reset']);
Route::apiResource('/programs', ProgramController::class);

Route::post('/resources/import', [ResourceController::class, 'import']);
Route::get('/resources/export', [ResourceController::class, 'export']);
Route::delete('/resources', [ResourceController::class, 'destroyMany']);
Route::delete('/resources/reset', [ResourceController::class, 'reset']);
Route::apiResource('/resources', ResourceController::class);

Route::get('/users/me/bookings', [UserController::class, 'myselfBookings']);

Route::get('/resources/{resource}/bookings_admin', [ResourceBookingController::class, 'indexAdmin']);
Route::get('/resources/{resource}/bookings', [ResourceBookingController::class, 'index'])->name('resources.bookings.index');
Route::post('/resources/{resource}/bookings', [ResourceBookingController::class, 'store']);
Route::get('/users/{user}/bookings', [ResourceBookingController::class, 'indexUser']);
Route::get('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'show']);
Route::put('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'update']);
Route::delete('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'destroy']);
Route::get('/resourcebookings/{resourceBooking}/code', [ResourceBookingController::class, 'getCode']);
Route::post('/resources/{resource}/checkin', [ResourceBookingController::class, 'checkIn']);
Route::post('/resourcebookings/{resourceBooking}/checkin', [ResourceBookingController::class, 'adminCheckIn']);
Route::get('/branches/{branch}/bookings', [ResourceBookingController::class, 'indexBranch']);

Route::apiResource('/userbans', UserBanController::class);

Route::get('/users/me', [UserController::class, 'myself']);
Route::post('/users/me/avatar', [UserController::class, 'myselfAvatar']);
Route::post('/users/me/password', [UserController::class, 'myselfPassword']);
Route::post('/users/import', [UserController::class, 'import']);
Route::get('/users/export', [UserController::class, 'export']);
Route::delete('/users', [UserController::class, 'destroyMany']);
Route::delete('/users/reset', [UserController::class, 'reset']);
Route::apiResource('/users', UserController::class);

Route::apiResource('/roles', RoleController::class);

Route::get('/roles/{role}/permissions', [RolePermissionController::class, 'show']);
Route::post('/roles/{role}/permissions', [RolePermissionController::class, 'update']);

Route::get('/users/{user}/roles', [UserRoleController::class, 'index']);
Route::post('/users/{user}/roles', [UserRoleController::class, 'store']);
Route::delete('/users/{user}/roles', [UserRoleController::class, 'destroy']);

Route::get('/users/{user}/permissions', [UserPermissionController::class, 'show']);
Route::put('/users/{user}/permissions', [UserPermissionController::class, 'update']);

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
Route::apiResource('/categories', CategoryController::class);

Route::apiResource('/tos', TosController::class);

Route::apiResource('/settings', SettingController::class);

/**
 * @group Dashboard
 * 
 * Get Dashboard data
 * 
 * @response status=200 scenario="success" {"count":{"user":5,"branch":10,"category":3,"resource":19,"active_bookings":1,"total_bookings":10},"active_bookings":[{"id":17,"user_id":2,"resource_id":4,"branch_setting_version_id":null,"number":"RM-2021041300017","start_time":"2021-04-13T13:00:00","end_time":"2021-04-13T13:30:00","checkin_time":null,"created_at":"2021-04-10T17:22:47.000000Z","updated_at":"2021-04-10T17:22:47.000000Z"}]}
 * 
 */
Route::get('/dashboard', function () {
    return [
        'count' => [
            'user' => User::count(),
            'branch' => Branch::count(),
            'category' => Category::count(),
            'resource' => Resource::count(),
            'active_bookings' => ResourceBooking::where('end_time', '>', today())->count(),
            'total_bookings' => ResourceBooking::count(),
        ],
        'active_bookings' => ResourceBooking::where('end_time', '>', today())->get(),
    ];
});

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
    
    // Check is admin
    if ($request->device_name == 'admin pc' && $user->can('login:admin')) {
        return $user->createToken($request->device_name)->plainTextToken;
    }

    // Check is user banned
    if (UserBan::where('user_id', $user->id)->where('expire_time', '>', now())->exists()) {
        $userban = UserBan::where('user_id', $user->id)->where('expire_time', '>', now())->select('expire_time')->first();
        return response($userban->expire_time, 402);
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
