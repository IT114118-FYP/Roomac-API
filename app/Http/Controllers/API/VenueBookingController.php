<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\VenueBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BranchSettingController;

class VenueBookingController extends Controller
{
    /**
     * @group Venue Booking
     * 
     * Retrieve all venue's bookings timetable
     *
     * @response status=200 scenario="success" {"interval":30,"bookings":{"reserved":[{"id":1,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T09:00:00.000000Z","end_time":"2020-12-14T10:30:00.000000Z","created_at":"2020-12-14T00:17:48.000000Z","updated_at":"2020-12-14T00:17:48.000000Z"},{"id":2,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T10:30:00.000000Z","end_time":"2020-12-14T12:30:00.000000Z","created_at":"2020-12-14T00:17:48.000000Z","updated_at":"2020-12-14T00:17:48.000000Z"},{"id":5,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-15T13:00:00.000000Z","end_time":"2020-12-15T14:30:00.000000Z","created_at":"2020-12-14T00:17:50.000000Z","updated_at":"2020-12-14T00:17:50.000000Z"},{"id":6,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-15T15:30:00.000000Z","end_time":"2020-12-15T16:30:00.000000Z","created_at":"2020-12-14T00:17:51.000000Z","updated_at":"2020-12-14T00:17:51.000000Z"}],"unavailable":[]}}
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Venue $venue)
    {
        $controller = new BranchSettingController;
        $settings = $controller->getFormattedSettings($venue->branch_id, $controller->getActiveVersion($venue->branch_id));
        
        for ($i = 0; $i < sizeof($settings); $i++) {
            if ($settings[$i]->id == 'MINUTE_PER_SESSION') {
                $MINUTE_PER_SESSION = (int)$settings[$i]->value;
            }
        }

        $reserved = VenueBooking::where('venue_id', $venue->id)->get();

        return [
            'interval' => $MINUTE_PER_SESSION,
            'bookings' => [
                'reserved' => $reserved,
                'unavailable' => ["TODO, I make later"],
            ]         
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VenueBooking  $venueBooking
     * @return \Illuminate\Http\Response
     */
    public function show(VenueBooking $venueBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VenueBooking  $venueBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VenueBooking $venueBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VenueBooking  $venueBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(VenueBooking $venueBooking)
    {
        //
    }
}
