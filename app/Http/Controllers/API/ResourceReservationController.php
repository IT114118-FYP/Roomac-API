<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ResourceReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourceReservationController extends Controller
{
    /**
     * @group Resource Reservation
     * 
     * Retrieve all resource's reservations
     * 
     * Retrieve all resource's reservations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourceReservation::all();
    }

    /**
     * @group Resource Reservation
     * 
     * Add a new resource reservation record
     * 
     * Add a new resource reservation record.
     * 
     * @bodyParam resource_id integer required Resource Id.
     * @bodyParam date string required Date of the booking (Y-m-d).
     * @bodyParam start string required Start time of the booking (H:i:s).
     * @bodyParam end string required End time of the booking (H:i:s).
     * @bodyParam repeat boolean required Is repeat? true or false.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'start' => 'required',
            'end' => 'required',
            'repeat' => 'required|boolean',
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

        if (isset($validated_data['user_id'])) {
            $user = User::where('id', $validated_data['user_id'])->first();
            $user_id = $user->id;
        } else {
            $user_id = $request->user()->id;
        }

        $dayOfWeek = $startTime->dayOfWeek;

        $resourceReservation = new ResourceReservation([
            'user_id' => $user_id,
            'resource_id' => $validated_data['resource_id'],
            'start_time' => $startTime,
            'end_time' => $endTime,
            'start' => Carbon::parse($startTime->format('H:i:s')),
            'end' => Carbon::parse($endTime->format('H:i:s')),
            'day_of_week' => $dayOfWeek,
            'repeat' => $validated_data['repeat'],
        ]);
        $resourceReservation->save();
    }

    /**
     * @group Resource Reservation
     * 
     * Retrieve a resource's reservation record
     * 
     * Retrieve a resource's reservation record.
     *
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceReservation $resourceReservation)
    {
        return $resourceReservation;
    }

    /**
     * @group Resource Reservation
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, ResourceReservation $resourceReservation) { }

    /**
     * @group Resource Reservation
     * 
     * Remove a resource's reservation record
     * 
     * Remove a resource's reservation record.
     *
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceReservation $resourceReservation)
    {
        ResourceReservation::destroy($resourceReservation->id);
        return response(null, 200);
    }
}
