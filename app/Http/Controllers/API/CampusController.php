<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @group Campus
     * 
     * Retrieve all Campuses
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campus::all();
    }

    /**
     * @group Campus
     * 
     * Add a Campus
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campus_code' => 'required',
            'campus_title_en' => 'required',
            'campus_title_hk' => 'required',
            'campus_title_cn' => 'required',
        ]);
    
        // Validate the data
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $campus = new Campus;
        $campus->campus_code = $request->campus_code;
        $campus->campus_title_en = $request->campus_title_en;
        $campus->campus_title_hk = $request->campus_title_hk;
        $campus->campus_title_cn = $request->campus_title_cn;
        
        return response(null, $campus->save() ? 200 : 401);
    }

    /**
     * @group Campus
     * 
     * Retrieve a Campus
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        return $campus;
    }

    /**
     * @group Campus
     * 
     * Update a Campus
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $campus->campus_code = $request->campus_code;
        $campus->campus_title_en = $request->campus_title_en;
        $campus->campus_title_hk = $request->campus_title_hk;
        $campus->campus_title_cn = $request->campus_title_cn;

        return response(null, $campus->save() ? 200 : 401);
    }

    /**
     * @group Campus
     * 
     * Remove a Campus
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        Campus::destroy($campus->id);
        return response(null, 200);
    }
}
