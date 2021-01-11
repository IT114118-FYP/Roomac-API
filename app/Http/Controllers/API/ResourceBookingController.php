<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
     * Retrieve all resource's bookings - Display in Timetable
     *
     * @response status=200 scenario="success" {"interval":30,"timezone":"Asia\/Hong_Kong","opening_time":"08:00:00","closing_time":"21:00:00","bookings":{"allow_times":[{"id":1,"resource_id":1,"start_time":"2020-12-14T04:00:00.000000Z","end_time":"2020-12-14T21:00:00.000000Z","day_of_week":1,"repeat":1,"created_at":"2020-12-14T22:25:00.000000Z","updated_at":"2020-12-14T22:25:00.000000Z"},{"id":2,"resource_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":2,"repeat":1,"created_at":"2020-12-14T22:25:00.000000Z","updated_at":"2020-12-14T22:25:00.000000Z"},{"id":3,"resource_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":3,"repeat":1,"created_at":"2020-12-14T22:25:01.000000Z","updated_at":"2020-12-14T22:25:01.000000Z"},{"id":4,"resource_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":4,"repeat":1,"created_at":"2020-12-14T22:25:01.000000Z","updated_at":"2020-12-14T22:25:01.000000Z"},{"id":5,"resource_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":5,"repeat":1,"created_at":"2020-12-14T22:25:02.000000Z","updated_at":"2020-12-14T22:25:02.000000Z"}],"unavailable":{"booked":[{"id":1,"user_id":2,"resource_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T01:30:00.000000Z","end_time":"2020-12-14T02:30:00.000000Z","created_at":"2020-12-14T22:25:02.000000Z","updated_at":"2020-12-14T22:25:02.000000Z"},{"id":2,"user_id":2,"resource_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T02:30:00.000000Z","end_time":"2020-12-14T03:30:00.000000Z","created_at":"2020-12-14T22:25:03.000000Z","updated_at":"2020-12-14T22:25:03.000000Z"},{"id":3,"user_id":2,"resource_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T04:30:00.000000Z","end_time":"2020-12-14T05:30:00.000000Z","created_at":"2020-12-14T22:25:04.000000Z","updated_at":"2020-12-14T22:25:04.000000Z"}],"reserved":[]}}}
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Resource $resource)
    {
        $controller = new BranchSettingController;
        $settingsKv = $controller->getSettingsKeyValues($resource->branch_id);
        $available = ResourceAvailable::where('resource_id', $resource->id)->get();
        $booked = ResourceBooking::where('resource_id', $resource->id)->get();
        $reserved = ResourceReserved::where('resource_id', $resource->id)->get();

        return [
            'interval' => $settingsKv['RESOURCE_MINUTE_PER_SESSION'],
            'timezone' => $settingsKv['TIME_ZONE'],
            'opening_time' => $resource->opening_time,
            'closing_time' => $resource->closing_time,
            'bookings' => [
                'allow_times' => $available,
                'unavailable' => [
                    'booked' => $booked,
                    'reserved' => $reserved,
                ]
            ]
        ];
    }

    /**
     * @group Resource Booking
     * 
     * Add a new booking record
     * 
     * Add a new booking record.
     * 
     * @bodyParam start_time string required Start time of the booking in UTC datetime format (Y-m-dTH:i:sZ)
     * @bodyParam end_time string required End time of the booking in UTC datetime format (Y-m-dTH:i:sZ)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resource $resource)
    {
        $validator = Validator::make($request->all(), [
            'start_time' => 'required|date|date_format:Y-m-d\TH:i:s|after:now',
            'end_time' => 'required|date|date_format:Y-m-d\TH:i:s|after:start_time',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();
        
        // Check is it in avaliable times
        $dtStartTime = Carbon::create($validated_data['start_time'], 'UTC')->setDate(now()->format("Y"), now()->format("m"), now()->format("d"));
        $dtEndTime = Carbon::create($validated_data['end_time'], 'UTC')->setDate(now()->format("Y"), now()->format("m"), now()->format("d"));
        $available = ResourceAvailable::where(['resource_id' => $resource->id, 'day_of_week' => $dtStartTime->dayOfWeek])->first();
        if ($available->start_time->gt($dtStartTime) || $available->end_time->lt($dtEndTime)) {
            dump($dtStartTime);
            return response('The time range is not within the available time', 401);
        }


        dd($dtStartTime->dayOfWeek);
        dd($available);

        // Check is it unavailable

/*
        $settingsKv = $controller->getSettingsKeyValues($venue->branch_id);

        $start_time->setTimezone(new DateTimeZone('UTC'));

        $end_time = new DateTime($row[4], new DateTimeZone('Asia/Hong_Kong'));
        $end_time->setTimezone(new DateTimeZone('UTC'));

        (new VenueBooking([
            'user_id' => $row[0],
            'venue_id' => $row[1],
            'branch_setting_version_id' => $row[2],
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]))->save();


        dd($request->user()->id);*/
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
}
