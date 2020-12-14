<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\VenueAvailable;
use App\Models\VenueBooking;
use App\Models\VenueReserved;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BranchSettingController;

class VenueBookingController extends Controller
{
    /**
     * @group Venue Booking
     * 
     * Retrieve all venue's bookings timetable
     *
     * @response status=200 scenario="success" {"interval":30,"timezone":"Asia\/Hong_Kong","opening_time":"08:00:00","closing_time":"21:00:00","bookings":{"allow_times":[{"id":1,"venue_id":1,"start_time":"2020-12-14T04:00:00.000000Z","end_time":"2020-12-14T21:00:00.000000Z","day_of_week":1,"repeat":1,"created_at":"2020-12-14T22:25:00.000000Z","updated_at":"2020-12-14T22:25:00.000000Z"},{"id":2,"venue_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":2,"repeat":1,"created_at":"2020-12-14T22:25:00.000000Z","updated_at":"2020-12-14T22:25:00.000000Z"},{"id":3,"venue_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":3,"repeat":1,"created_at":"2020-12-14T22:25:01.000000Z","updated_at":"2020-12-14T22:25:01.000000Z"},{"id":4,"venue_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":4,"repeat":1,"created_at":"2020-12-14T22:25:01.000000Z","updated_at":"2020-12-14T22:25:01.000000Z"},{"id":5,"venue_id":1,"start_time":"2020-12-14T00:30:00.000000Z","end_time":"2020-12-14T22:00:00.000000Z","day_of_week":5,"repeat":1,"created_at":"2020-12-14T22:25:02.000000Z","updated_at":"2020-12-14T22:25:02.000000Z"}],"unavailable":{"booked":[{"id":1,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T01:30:00.000000Z","end_time":"2020-12-14T02:30:00.000000Z","created_at":"2020-12-14T22:25:02.000000Z","updated_at":"2020-12-14T22:25:02.000000Z"},{"id":2,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T02:30:00.000000Z","end_time":"2020-12-14T03:30:00.000000Z","created_at":"2020-12-14T22:25:03.000000Z","updated_at":"2020-12-14T22:25:03.000000Z"},{"id":3,"user_id":2,"venue_id":1,"branch_setting_version_id":null,"start_time":"2020-12-14T04:30:00.000000Z","end_time":"2020-12-14T05:30:00.000000Z","created_at":"2020-12-14T22:25:04.000000Z","updated_at":"2020-12-14T22:25:04.000000Z"}],"reserved":[]}}}
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Venue $venue)
    {
        $controller = new BranchSettingController;
        $settings = $controller->getFormattedSettings($venue->branch_id, $controller->getActiveVersion($venue->branch_id));
        
        for ($i = 0; $i < sizeof($settings); $i++) {
            if ($settings[$i]->id == 'VENUE_MINUTE_PER_SESSION') {
                $VENUE_MINUTE_PER_SESSION = (int)$settings[$i]->value;
            }

            if ($settings[$i]->id == 'TIME_ZONE') {
                $TIME_ZONE = $settings[$i]->value;
            }
        }

        $available = VenueAvailable::where('venue_id', $venue->id)->get();
        $booked = VenueBooking::where('venue_id', $venue->id)->get();
        $reserved = VenueReserved::where('venue_id', $venue->id)->get();

        return [
            'interval' => $VENUE_MINUTE_PER_SESSION,
            'timezone' => $TIME_ZONE,
            'opening_time' => $venue->opening_time,
            'closing_time' => $venue->closing_time,
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
