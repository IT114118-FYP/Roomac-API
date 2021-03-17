<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\Resource;
use App\Models\ResourceBooking;
use App\Http\Controllers\API\BranchSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () { return view('welcome'); });

Route::redirect('/', '/docs/index.html');

Route::get('/checkin/{resource}', function (Resource $resource)
{
    return view('checkin', getCheckInData($resource));
});

Route::get('/api/checkin/{resource}/refresh', function (Resource $resource)
{
    return getCheckInData($resource);
});

function getCheckInData(Resource $resource) {
    // Get current time range
    [$rangeStart, $rangeEnd] = getCurrentTimeRange($resource->interval);
    $timeString = $rangeStart->format('H:i') . ' - ' . $rangeEnd->format('H:i');

    // Get bookings record
    $booking = ResourceBooking::where('resource_id', $resource->id)
        ->where('start_time', '<=', Carbon::now())
        ->where('end_time', '>=', Carbon::now())->with('user')
        ->first();

    return [
        'resource' => $resource,
        'timeString' => $timeString,
        'booking' => $booking,
    ];
}

function getCurrentTimeRange(int $interval) {
    $now = Carbon::now();
    $start = Carbon::now()->startOfDay();

    do {
        $start->addMinutes($interval);
    } while ($start->lte($now));

    return array($start->copy()->subMinutes($interval), $start->copy());
}
