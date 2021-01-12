<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tos;
use Illuminate\Http\Request;

class TosController extends Controller
{
    /**
     * @group TOS
     * 
     * Retrieve all tos
     * 
     * Retrieve all tos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tos::all();
    }

    /**
     * @group TOS
     * 
     * Add a tos
     * 
     * Add a tos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @group TOS
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function show(Tos $tos)
    {
        return $tos;
    }

    /**
     * @group TOS
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tos $tos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tos $tos)
    {
        //
    }
}
