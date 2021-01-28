<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use App\Models\Resource;
use App\Models\ResourceAvailable;
use App\Models\ResourceBooking;
use App\Models\ResourceReserved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BranchSettingController;

use Carbon\Carbon;

class ResourceBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * @group Resource Booking
     * 
     * Retrieve all resource's bookings
     * 
     * Retrieve all resource's bookings. Example: /api/resources/1/bookings?start=2021-01-24&end=2021-01-30
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

        $controller = new BranchSettingController;
        $settingsKv = $controller->getSettingsKeyValues($resource->branch_id);
        $booked = ResourceBooking::where('resource_id', $resource->id)->get();
        $reserved = ResourceReserved::where('resource_id', $resource->id)->get();
        $interval = $settingsKv['RESOURCE_MINUTE_PER_SESSION'];

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
                $date_times[] = [
                    'id' => $i + 1,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'available' => !$this->isBookingExists($resource, Carbon::parse($current_date->toDateString() . 'T' . $start_time), Carbon::parse($current_date->toDateString() . 'T' . $end_time)),
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
        }
        catch (Exception $err) {
            return response($err->getMessage(), 400);
        }

        if ($this->isBookingExists($resource, $startTime, $endTime)) {
            return response('The booking was invalid.', 401);
        }

        $resourceBooking = new ResourceBooking([
            'user_id' => $request->user()->id,
            'resource_id' => $resource->id,
            'branch_setting_version_id' => (new BranchSettingController)->getActiveVersion($resource->branch_id),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
        $resourceBooking->save();

        $bookingReference = "RM-" . str_replace('-', '', $validated_data['date']) . "-" . str_pad($resourceBooking->id, 5, '0', STR_PAD_LEFT);
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
        $query_start = $request->query('start', now());
        $query_end = $request->query('end', now());

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

        $query = ResourceBooking::with(['resource'=> function($query){ $query->where('branch_id', $branch->id); }]);

        if ($query_start !== null && $query_end !== null) {
            $query = $query->whereBetween('start_time', [$start_date, $end_date]);
        }

        return $query->with(['user', 'resource'])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceBooking $resourceBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceBooking $resourceBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceBooking  $resourceBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceBooking $resourceBooking)
    {
        //
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
    
    private function isBookingExists($resource, $startTime, $endTime) {
        return ResourceBooking::where('resource_id', $resource->id)->where(function ($query) use ($startTime, $endTime) {
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
}
