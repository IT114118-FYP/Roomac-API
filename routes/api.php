<?php

use App\Models\User;
use App\Models\UserBan;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Program;
use App\Models\Resource;
use App\Models\ResourceBooking;
use App\Models\CheckInCode;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserBanController;
use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\ResourceBookingController;
use App\Http\Controllers\API\ResourceReservationController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\UserRoleController;
use App\Http\Controllers\API\UserPermissionController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\BranchSettingController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TosController;

use Dialogflow\WebhookClient;
use Dialogflow\Action\Questions\Confirmation;

use Carbon\Carbon;

use App\Exports\ReportExport;

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
Route::get('/resourcebookings', [ResourceBookingController::class, 'indexTraditional']);
Route::get('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'show']);
Route::put('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'update']);
Route::delete('/resourcebookings/{resourceBooking}', [ResourceBookingController::class, 'destroy']);
Route::get('/resourcebookings/{resourceBooking}/code', [ResourceBookingController::class, 'getCode']);

//Route::post('/resources/{resource}/checkin', [ResourceBookingController::class, 'checkIn']);

Route::post('/resourcebookings/{resourceBooking}/checkin', [ResourceBookingController::class, 'adminCheckIn']);
Route::get('/branches/{branch}/bookings', [ResourceBookingController::class, 'indexBranch']);

Route::get('/resources/{resource}/reservations', [ResourceReservationController::class, 'indexAdmin']);
Route::apiResource('/reservations', ResourceReservationController::class);

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

Route::get('/users/{user}/bans', [UserController::class, 'indexBan']);
Route::delete('/users/{user}/unban', [UserController::class, 'destroyBan']);

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
            'program' => Program::count(),
            'resource' => Resource::count(),
            'active_bookings' => ResourceBooking::where('end_time', '>', today())->count(),
            'total_bookings' => ResourceBooking::count(),
        ],
        'active_bookings' => ResourceBooking::where('end_time', '>', today())->get(),
    ];
});


/**
 * @group Resource Booking
 * 
 * Check-in
 * 
 * Check-in.
 *
 * @param  \App\Models\Resource  $resource
 * @return \Illuminate\Http\Response
 */
Route::post('/resources/{resource}/checkin', function (Request $request, Resource $resource) {
    $validator = Validator::make($request->all(), [
        'code' => 'required',
    ]);

    if ($validator->fails()) {
        return response($validator->errors(), 400);
    }

    $validatedData = $validator->valid();

    $checkInCode = CheckInCode::where('code', $validatedData['code'])->first();

    if ($checkInCode === null) {
        return response('Invalid code', 401);
    }

    $resourceBooking = ResourceBooking::where('id', $checkInCode->resource_booking_id)->first();

    if ($resourceBooking === null || $resourceBooking->resource_id !== $resource->id) {
        return response('Invalid code', 402);
    }

    $resourceBooking->update(['checkin_time' => now()]);

    CheckInCode::destroy($checkInCode->id);

    return response(null, 200);
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
    if (UserBan::where('user_id', $user->id)->where('is_cancelled', 0)->where('expire_time', '>', now())->exists()) {
        $userban = UserBan::where('user_id', $user->id)->where('is_cancelled', 0)->where('expire_time', '>', now())->select('expire_time')->first();
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


Route::post('/dialogflow', function (Request $request) {
    $agent = WebhookClient::fromData($request->json()->all());
	$intent = $agent->getIntent();
	$payload = $agent->getOriginalRequest()['payload'];
	
	if (!isset($payload['user_id'])) {
		$agent->reply('Some errors have occurred, please try again later.');
		return response()->json($agent->render());
	}
	
	// Debug code:
	// $agent->reply($request->getContent());
	// $agent->reply(var_export($agent->getOriginalRequest()['payload']['user_id'], true));
	
	$userId = $payload['user_id'];
	
	if ($intent == 'All Bookings') {
		$count = ResourceBooking::where('user_id', $userId)->count();
		$agent->reply('You have ' . $count . ' booking record' . ($count > 1 ? 's' : '') . '. Please go to My Bookings to view all bookings.');	
	} else if ($intent == 'Delete Booking') {
		$parameters = $agent->getParameters();
		$number = $parameters['number'];
		
		if (!ResourceBooking::where('user_id', $userId)->where('number', $number)->exists()) {
			$agent->reply('The booking record with reference number ' . $number . ' could not be found.');
			return response()->json($agent->render());
		}
		
		if (ResourceBooking::where('user_id', $userId)->where('number', $number)->where('start_time', '<', now())->exists()) {
			$agent->reply('The booking record with reference number ' . $number . ' has passed, it cannot be deleted.');
			return response()->json($agent->render());
		}
		
		$rb = ResourceBooking::where('number', $number)->first();
		ResourceBooking::destroy($rb->id);
		
		$agent->reply('The booking record with reference number ' . $number . ' has deleted.');
	} else if ($intent == 'Get Check-In QR Code') {
		$parameters = $agent->getParameters();
		
		if (isset($parameters['number'])) {
			$number = $parameters['number'];
			
			if (!ResourceBooking::where('user_id', $userId)->where('number', $number)->exists()) {
				$agent->reply('The booking record with reference number ' . $number . ' could not be found.');
				return response()->json($agent->render());
			}
			
			if (ResourceBooking::where('user_id', $userId)->where('number', $number)->where('end_time', '<', now())->exists()) {
				$agent->reply('The booking record with reference number ' . $number . ' has passed.');
				return response()->json($agent->render());
			}
			
			if (ResourceBooking::where('user_id', $userId)->where('number', $number)->whereNotNull('checkin_time')->exists()) {
				$agent->reply('The booking record with reference number ' . $number . ' has been checked-in.');
				return response()->json($agent->render());
			}
			
			$rbq = ResourceBooking::where('user_id', $userId)->where('number', $number);
		} else {
			$rbq = ResourceBooking::where('user_id', $userId)
				->whereNull('checkin_time')
				->where('end_time', '>', now())
				->orderBy('start_time', 'ASC');
		}
		
		if (!$rbq->exists()) {
			$agent->reply('No active booking record found.');
			return response()->json($agent->render());
		}
		
		$rb = $rbq->with('resource')->first();
		
		// Generate or update the code
        $checkInCode = CheckInCode::updateOrCreate([
            'resource_booking_id' => $rb->id,
        ], [
            'code' => Str::uuid()->toString(),
        ]);
		
		$card = \Dialogflow\RichMessage\Card::create()
			->image('https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($checkInCode->code));
			
		$agent->reply($card);
		
		$agent->reply('Here is the Check-In QR Code of ' . $rb->resource->number . ' (' . $rb->number . ').');
		$agent->reply('Date: ' . Carbon::parse($rb->start_time)->format('Y-m-d'));
		$agent->reply('Time: ' . Carbon::parse($rb->start_time)->format('H:i') . ' - ' . Carbon::parse($rb->end_time)->format('H:i'));
	} else {
		$agent->reply($request->getContent());
	}
	
    return response()->json($agent->render());
});

/**
 * @group Report
 * 
 * Get report data, using for chart purpose
 * 
 * @authenticated
 *
 * @response status=200 scenario="success"
 */
Route::middleware('auth:sanctum')->get('/report', function (Request $request) {
    $query_start = $request->query('start', null);
    $query_end = $request->query('end', null);

    try {
        $startDate = Carbon::parse($query_start);
    }
    catch (\Exception $err) {
        return response($err->getMessage(), 400);
    }

    try {
        $endDate = Carbon::parse($query_end);
        $endDate->addDay();
    }
    catch (\Exception $err) {
        return response($err->getMessage(), 400);
    }

    // Booking Count
    $bookingCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->count();

    // Booking Check-in
    $bookingCheckInCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->whereNotNull('checkin_time')
        ->count();

    // Booking Not Check-in
    $bookingNotCheckInCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->whereNull('checkin_time')
        ->count();


    $details = [];
    $tempStartDate = $startDate->copy();

    do {
        if ($tempStartDate->copy()->endOfMonth()->lt($endDate)) {
            $details[] = getBookingsDetails($tempStartDate, $tempStartDate->copy()->endOfMonth());
        } else {
            $details[] = getBookingsDetails($tempStartDate, $endDate);
        }
        $tempStartDate = $tempStartDate->addMonth()->startOfMonth();
    } while ($tempStartDate->lt($endDate));

    // Booking Resources
    $bookingsResources = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
        ->selectRaw('resource_id, resources.number, count(*) as total')
        ->groupBy('resource_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    // Booking Users
    $bookingsUsers = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('users', 'users.id', '=', 'resource_bookings.user_id')
        ->selectRaw('user_id, users.name, count(*) as total')
        ->groupBy('user_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    // Booking Branches
    $bookingsBranches = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
        ->join('branches', 'branches.id', '=', 'resources.branch_id')
        ->selectRaw('resources.branch_id, branches.title_en, count(*) as total')
        ->groupBy('resources.branch_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    // Booking Categories
    $bookingsCategories = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
        ->join('categories', 'categories.id', '=', 'resources.category_id')
        ->selectRaw('resources.category_id, categories.title_en, count(*) as total')
        ->groupBy('resources.category_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    // Booking Programs
    $bookingsPrograms = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('users', 'users.id', '=', 'resource_bookings.user_id')
        ->join('programs', 'programs.id', '=', 'users.program_id')
        ->selectRaw('users.program_id, programs.title_en, count(*) as total')
        ->groupBy('users.program_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    // Booking User Branches
    $bookingsUsersBranches = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->join('users', 'users.id', '=', 'resource_bookings.user_id')
        ->join('branches', 'branches.id', '=', 'users.branch_id')
        ->selectRaw('users.branch_id, branches.title_en, count(*) as total')
        ->groupBy('users.branch_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

    return [
        'bookings' => [
            'total' => $bookingCount,
            'checkIn' => $bookingCheckInCount,
            'notCheckIn' => $bookingNotCheckInCount,
            'details' => $details,
        ],
        'branches' => $bookingsBranches,
        'categories' => $bookingsCategories,
        'resources' => $bookingsResources,
        'users' => $bookingsUsers,
        'users_programs' => $bookingsPrograms,
        'users_branches' => $bookingsUsersBranches,
    ];
});

function getBookingsDetails($startDate, $endDate) {
    // Booking Count
    $bookingCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->count();

    // Booking Check-in
    $bookingCheckInCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->whereNotNull('checkin_time')
        ->count();

    // Booking Not Check-in
    $bookingNotCheckInCount = ResourceBooking::whereBetween('start_time', [$startDate, $endDate])
        ->whereNull('checkin_time')
        ->count();

    return [
        'date' => $startDate->format('F Y'),
        'total' => $bookingCount,
        'checkIn' => $bookingCheckInCount,
        'notCheckIn' => $bookingNotCheckInCount,
    ];
}

/**
 * @group Report
 * 
 * Export Report
 * 
 * @authenticated
 *
 * @response status=200 scenario="success"
 */
Route::get('/report/export', function (Request $request) {
    $query_start = $request->query('start', null);
    $query_end = $request->query('end', null);

    try {
        $startDate = Carbon::parse($query_start);
    }
    catch (\Exception $err) {
        return response($err->getMessage(), 400);
    }

    try {
        $endDate = Carbon::parse($query_end);
        $endDate->addDay()->subSecond();
    }
    catch (\Exception $err) {
        return response($err->getMessage(), 400);
    }

    return (new ReportExport($startDate, $endDate))
        ->download('Report (' . $startDate->format('Y-m-d') .' to ' . $endDate->format('Y-m-d') . ').xlsx');
});
