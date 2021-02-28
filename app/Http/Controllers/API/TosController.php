<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tos;
use Illuminate\Http\Request;

class TosController extends Controller
{
    /**
     * @group Terms & Conditions
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
     * @group Terms & Conditions
     * 
     * Add a tos
     * 
     * Add a tos.
     * 
     * @bodyParam tos_en string required
     * @bodyParam tos_hk string required
     * @bodyParam tos_cn string required
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tos_en' => 'required',
            'tos_hk' => 'required',
            'tos_cn' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, (new Tos($validator->valid()))->save() ? 200 : 401);
    }

    /**
     * @group Terms & Conditions
     * 
     * Retrieve a tos
     * 
     * Retrieve a tos.
     *
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function show(Tos $to)
    {
        return $to;
    }

    /**
     * @group Terms & Conditions
     * 
     * Update a tos
     * 
     * Update a tos.
     * 
     * @bodyParam tos_en string required
     * @bodyParam tos_hk string required
     * @bodyParam tos_cn string required
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tos $to)
    {
        $validator = Validator::make($request->all(), [
            'tos_en' => 'required',
            'tos_hk' => 'required',
            'tos_cn' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, $to->update($validator->valid()) ? 200 : 401);
    }

    /**
     * @group Terms & Conditions
     * 
     * Remove a tos
     * 
     * Remove a tos.
     *
     * @param  \App\Models\Tos  $tos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tos $to)
    {
        Branch::destroy($to->id);
        return response(null, 200);
    }
}
