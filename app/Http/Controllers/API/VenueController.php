<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\VenuesImport;
use App\Exports\VenuesExport;
use Maatwebsite\Excel\Excel;

class VenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @group Venue
     * 
     * Retrieve all venues
     * 
     * Retrieve all venues.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Venue::all();
    }

    /**
     * @group Venue
     * 
     * Add a venue
     * 
     * Add a venue.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'number' => 'required',
            'title_en' => 'required',
            'title_hk' => 'required',
            'title_cn' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, (new Venue($validator->valid()))->save() ? 200 : 401);
    }

    /**
     * @group Venue
     * 
     * Retrieve a venue
     * 
     * Retrieve a venue.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        return $venue;
    }

    /**
     * @group Venue
     * 
     * Update a venue
     * 
     * Update a venue.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'number' => 'required',
            'title_en' => 'required',
            'title_hk' => 'required',
            'title_cn' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, $venue->update($validator->valid()) ? 200 : 401);
    
    }

    /**
     * @group Venue
     * 
     * Remove a venue
     * 
     * Remove a venue.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        Venue::destroy($branch->id);
        return response(null, 200);
    }

    /**
     * @group Venue
     * 
     * Remove multiple venues
     * 
     * Remove multiple venues.
     * 
     * @bodyParam ids array required Array of the venues' id Example: {"ids": [1, 2]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        Venue::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group Venue
     * 
     * Reset venues
     * 
     * Remove all venues.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        Venue::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group Venue
     * 
     * Export venues
     * 
     * Export venues.
     * 
     * @queryParam format Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx. Example: csv
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function export(Request $request)
    {
        $export = new VenuesExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('venues.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('venues.tsv', Excel::TSV);
            case 'ODS': return $export->download('venues.ods', Excel::ODS);
            case 'XLS': return $export->download('venues.xls', Excel::XLS);
            case 'HTML': return $export->download('venues.html', Excel::HTML);
            default: return $export->download('venues.xlsx', Excel::XLSX);
        }
    }

     /**
     * @group Venue
     * 
     * Import venues
     * 
     * Import venues.
     * 
     * @bodyParam file file required
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $import = new VenuesImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }
}
