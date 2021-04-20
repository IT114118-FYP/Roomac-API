<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ResourceReservation;
use Illuminate\Http\Request;

class ResourceReservationController extends Controller
{
    /**
     * @group Resource Reservation
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceReservation $resourceReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceReservation $resourceReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceReservation  $resourceReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceReservation $resourceReservation)
    {
        //
    }
}
