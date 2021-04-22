<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use App\Models\Resource;
use App\Models\ResourceAvailable;
use App\Models\ResourceBooking;
use App\Models\ResourceReservation;
use App\Models\CheckInCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BranchSettingController;

use Carbon\Carbon;

class ResourceBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['checkIn']);
    }

    /**
     * @group Resource Booking
     * 
     * Retrieve all resource's bookings
     * 
     * Retrieve all resource's bookings. Example: /api/resources/1/bookings?start=2021-01-24&end=2021-01-30&except=1
     * 
     * @queryParam start query start time in Y-m-d format. Defaults to 2021-01-13.
     * @queryParam end query end time in Y-m-d format. Defaults to 2021-01-15.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Resource $resource)
    {
        $query_start = $request->query('start', now());
        $query_end = $request->query('end', now());
        $except = $request->query('except', null);

        try {
            $start_date = Carbon::parse($query_start);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $end_date = Carbon::parse($query_end);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

/*
        if ($except == null) {
            $booked = ResourceBooking::where('resource_id', $resource->id)->get();
        } else {
            $booked = ResourceBooking::where('resource_id', $resource->id)->where('id', '!=' , $except)->get();
        }

        $reserved = ResourceReserved::where('resource_id', $resource->id)->get();
*/

        $interval = $resource->interval;

        $closing_time = explode(":", $resource->closing_time);
        $closing_hour = (int)$closing_time[0]; $closing_minute = (int)$closing_time[1]; $closing_second = (int)$closing_time[2];

        $allow_times = [];
        $current_date = $start_date;

        while ($current_date->lte($end_date)) {
            $date_times = [];
            $end_time = $resource->opening_time;

            for ($i = 0; $i < 1440; $i++) {
                // Get previous end_time
                $start_time = $end_time;

                // Get hour, minute, second
                $time = explode(":", $start_time);
                $hour = (int)$time[0]; $minute = (int)$time[1] + $interval; $second = (int)$time[2];
                while ($minute >= 60) { $minute -= 60; $hour += 1; }
                if ($closing_hour <= $hour && $closing_minute < $minute || $closing_hour < $hour && $closing_minute <= $minute) { break; }

                $end_time = str_pad($hour, 2, '0', STR_PAD_LEFT).':'.str_pad($minute, 2, '0', STR_PAD_LEFT).':'.str_pad($second, 2, '0', STR_PAD_LEFT);

                $startTime = Carbon::parse($current_date->toDateString() . 'T' . $start_time);
                $endTime = Carbon::parse($current_date->toDateString() . 'T' . $end_time);

                $date_times[] = [
                    'id' => $i + 1,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'available' => !$this->isBookingExists($resource->id, $startTime, $endTime, $except) && !$this->isReserved($resource->id, $startTime, $endTime),
                ];
            }

            $allow_times[] = [$current_date->toDateString() => $date_times];
            $current_date = $current_date->addDay();
        }

        return [
            'interval' => $interval,
            'opening_time' => $resource->opening_time,
            'closing_time' => $resource->closing_time,
            'allow_times' => $allow_times
        ];
    }

    /**
     * @group Resource Booking
     * 
     * Retrieve all resource's bookings (admin)
     * 
     * Retrieve all resource's bookings. Example: /api/resources/1/bookings_admin?start=2021-01-24&end=2021-01-30
     * 
     * @queryParam start query start time in Y-m-d format. Defaults to 2021-01-13.
     * @queryParam end query end time in Y-m-d format. Defaults to 2021-01-15.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(Request $request, Resource $resource)
    {
        $query_start = $request->query('start', null);
        $query_end = $request->query('end', null);

        if ($query_start == null || $query_end == null) {
            return [
                'interval' => $resource->interval,
                'opening_time' => $resource->opening_time,
                'closing_time' => $resource->closing_time,
                'bookings' => ResourceBooking::where('resource_id', $resource->id)->get(),
            ];
        }

        try {
            $start_date = Carbon::parse($query_start);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $end_date = Carbon::parse($query_end);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        return [
            'interval' => $resource->interval,
            'opening_time' => $resource->opening_time,
            'closing_time' => $resource->closing_time,
            'bookings' => ResourceBooking::where('resource_id', $resource->id)->where('start_time', '>=', $query_start)->where('end_time', '<=', $query_end)->get(),
        ];
    }

    /**
     * @group Resource Booking
     * 
     * Retrieve all resource's bookings (traditional)
     * 
     * Retrieve all resource's bookings. Example: /api/resourcebookings?start=2021-01-24&end=2021-01-30
     * 
     * @queryParam start query start time in Y-m-d format. Defaults to 2021-01-13.
     * @queryParam end query end time in Y-m-d format. Defaults to 2021-01-15.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTraditional(Request $request)
    {
        $query_start = $request->query('start', null);
        $query_end = $request->query('end', null);

        if ($query_start == null || $query_end == null) {
            return ResourceBooking::all();
        }

        try {
            $start_date = Carbon::parse($query_start);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $end_date = Carbon::parse($query_end);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        return ResourceBooking::where('start_time', '>=', $query_start)->where('end_time', '<=', $query_end)->get();
    }

    /**
     * @group Resource Booking
     * 
     * Add a new booking record
     * 
     * Add a new booking record.
     * 
     * @bodyParam date string required Date of the booking (Y-m-d).
     * @bodyParam start string required Start time of the booking (H:i:s).
     * @bodyParam end string required End time of the booking (H:i:s).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resource $resource)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|date_format:Y-m-d',
            'start' => 'required',
            'end' => 'required',
            'user_id' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();

        try {
            $startTime = Carbon::parse($validated_data['date'] . 'T' . $validated_data['start']);
        }
        catch (Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $endTime = Carbon::parse($validated_data['date'] . 'T' . $validated_data['end']);
            if ($endTime->format('H:i:s') === '00:00:00') {
                $endTime->addDay();
            }
        }
        catch (Exception $err) {
            return response($err->getMessage(), 400);
        }

        if ($this->isBookingExists($resource->id, $startTime, $endTime)) {
            return response('The booking was invalid.', 401);
        }

        if ($this->isReserved($resource->id, $startTime, $endTime)) {
            return response('The booking was invalid.', 402);
        }

        if (isset($validated_data['user_id'])) {
            $user = User::where('id', $validated_data['user_id'])->first();
            $user_id = $user->id;
        } else {
            $user_id = $request->user()->id;
        }

        $resourceBooking = new ResourceBooking([
            'user_id' => $user_id,
            'resource_id' => $resource->id,
            'branch_setting_version_id' => (new BranchSettingController)->getActiveVersion($resource->branch_id),
            'number' => '',
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
        $resourceBooking->save();

        $bookingReference = "RM-" . str_replace('-', '', $validated_data['date']) . str_pad($resourceBooking->id, 5, '0', STR_PAD_LEFT);
        $resourceBooking->update(['number' => $bookingReference]);

        return response($bookingReference, 200);
    }

    /**
     * @group User Booking
     * 
     * Retrieve all user's bookings
     * 
     * Retrieve all user's bookings. Example: /api/users/1/bookings?start=2021-01-24&end=2021-01-30
     * 
     * @queryParam start query start time in Y-m-d format. Defaults to 2021-01-13.
     * @queryParam end query end time in Y-m-d format. Defaults to 2021-01-15.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser(Request $request, User $user)
    {
        $query_start = $request->query('start', null);
        $query_end = $request->query('end', null);

        if ($query_start == null && $query_end == null) {
            return ResourceBooking::where('user_id', $user->id)
                    ->with(['resource'])->get();
        }

        try {
            $start_date = Carbon::parse($query_start);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $end_date = Carbon::parse($query_end);
            $end_date->addDay();
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        return ResourceBooking::where('user_id', $user->id)
                    ->whereBetween('start_time', [$start_date, $end_date])
                    ->with(['resource'])->get();
    }

    /**
     * @group Branch Booking
     * 
     * Retrieve all branch's bookings
     * 
     * Retrieve all branch's bookings. Example: /api/branches/1/bookings?start=2021-01-24&end=2021-01-30
     * 
     * @queryParam start query start time in Y-m-d format. Defaults to 2021-01-13.
     * @queryParam end query end time in Y-m-d format. Defaults to 2021-01-15.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBranch(Request $request, Branch $branch)
    {
        $query_start = $request->query('start', null);
        $query_end = $request->query('end', null);

        try {
            $start_date = Carbon::parse($query_start);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $end_date = Carbon::parse($query_end);
        }
        catch (\Exception $err) {
            return response($err->getMessage(), 400);
        }

        $query = ResourceBooking::with(['resource' => function($query){ $query->where('branch_id', $branch->id); }]);

        if ($query_start !== null && $query_end !== null) {
            $query = $query->whereBetween('start_time', [$start_date, $end_date]);
        }

        return $query->with(['user', 'resource'])->get();
    }

    /**
     * @group Resource Booking
     *
     * Retrieve a booking record
     * 
     * Retrieve a booking record.
     *
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceBooking $resourceBooking)
    {
        return $resourceBooking;
    }

    /**
     * @group Resource Booking
     * 
     * Update a booking record
     * 
     * Update a booking record.
     * 
     * @bodyParam date string required Date of the booking (Y-m-d).
     * @bodyParam start string required Start time of the booking (H:i:s).
     * @bodyParam end string required End time of the booking (H:i:s).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceBooking $resourceBooking)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|date_format:Y-m-d',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();

        try {
            $startTime = Carbon::parse($validated_data['date'] . 'T' . $validated_data['start']);
        }
        catch (Exception $err) {
            return response($err->getMessage(), 400);
        }

        try {
            $endTime = Carbon::parse($validated_data['date'] . 'T' . $validated_data['end']);
            if ($endTime->format('H:i:s') === '00:00:00') {
                $endTime->addDay();
            }
        }
        catch (Exception $err) {
            return response($err->getMessage(), 400);
        }

        if ($this->isBookingExists($resourceBooking->resource_id, $startTime, $endTime)) {
            return response('The booking was invalid.', 401);
        }

        if ($this->isReserved($resourceBooking->resource_id, $startTime, $endTime)) {
            return response('The booking was invalid.', 402);
        }

        return response(null, $resourceBooking->update(['start_time' => $startTime, 'end_time' => $endTime]) ? 200 : 401);
    }

    /**
     * @group Resource Booking
     * 
     * Remove a booking record
     * 
     * Remove a booking record.
     *
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceBooking $resourceBooking)
    {
        ResourceBooking::destroy($resourceBooking->id);
        return response(null, 200);
    }

    /**
     * @group Resource Booking
     * 
     * Get a check-in code
     * 
     * Get a check-in code (Convert to QR code in front-end).
     *
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function getCode(Request $request, ResourceBooking $resourceBooking)
    {
        // Return if the resource booking is not belong to user
        if ($request->user()->id !== $resourceBooking->user_id) {
            return response('Unauthorized', 401);
        }

        // Return if the resource booking is already checked-in
        if ($resourceBooking->checkin_time !== null) {
            //return response('Already checked-in', 402);
        }

        // Generate or update the code
        $checkInCode = CheckInCode::updateOrCreate([
            'resource_booking_id' => $resourceBooking->id,
        ], [
            'code' => Str::uuid()->toString(),
        ]);

        return response(['code' => $checkInCode->code], 200);
    }

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
    /*public function checkIn(Request $request, Resource $resource)
    {
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
    }*/

    /**
     * @group Resource Booking
     * 
     * Check-in (admin)
     * 
     * Check-in (admin).
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function adminCheckIn(ResourceBooking $resourceBooking)
    {
        $resourceBooking->update(['checkin_time' => now()]);

        return response(null, 200);
    }

    public function getSettingsKV(Resource $resource) {
        $settingsKV = array();
        $settings = $controller->getFormattedSettings($resource->branch_id, $controller->getActiveVersion($resource->branch_id));
        
        for ($i = 0; $i < sizeof($settings); $i++) {

            if ($settings[$i]->id == 'RESOURCE_MINUTE_PER_SESSION') {
                $settingsKV['RESOURCE_MINUTE_PER_SESSION'] = (int)$settings[$i]->value;
            }

            if ($settings[$i]->id == 'TIME_ZONE') {
                $TIME_ZONE = $settings[$i]->value;
            }
        }
    }
    
    private function isBookingExists($resourceId, $startTime, $endTime, $except=null) {
        $rb = ResourceBooking::where('resource_id', $resourceId);

        if ($except !== null) {
            $rb = $rb->where('id', '!=' , $except);
        }

        return $rb->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '>', $startTime)->where('end_time', '<', $startTime);
                    })->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '<', $endTime)->where('end_time', '>', $endTime);
                    })->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '>', $startTime)->where('end_time', '<', $endTime);
                    })->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '<', $endTime)->where('end_time', '>', $startTime);
                    });
                })->exists();
    }

    private function isReserved($resourceId, $startTime, $endTime) {
        if (ResourceReservation::where('resource_id', $resourceId)
            ->where('repeat', 0)
            ->where(function ($query) use ($startTime, $endTime) {
            $query->where(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '>', $startTime)->where('end_time', '<', $startTime);
                })->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<', $endTime)->where('end_time', '>', $endTime);
                })->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '>', $startTime)->where('end_time', '<', $endTime);
                })->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<', $endTime)->where('end_time', '>', $startTime);
                });
            })->exists()) {
                return true;
            }

        $dayOfWeek = $startTime->dayOfWeek;
        $start = $startTime->format('H:i:s');
        $end = $endTime->format('H:i:s');

        return ResourceReservation::where('resource_id', $resourceId)
            ->where('repeat', 1)
            ->where('day_of_week', $dayOfWeek)
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($query) use ($start, $end) {
                        $query->where('start', '>', $start)->where('end', '<', $start);
                    })->orWhere(function ($query) use ($start, $end) {
                        $query->where('start', '<', $end)->where('end', '>', $end);
                    })->orWhere(function ($query) use ($start, $end) {
                        $query->where('start', '>', $start)->where('end', '<', $end);
                    })->orWhere(function ($query) use ($start, $end) {
                        $query->where('start', '<', $end)->where('end', '>', $start);
                    });
                })->exists();
    }
}
