<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\ResourcesImport;
use App\Exports\ResourcesExport;
use Maatwebsite\Excel\Excel;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @group Resource
     * 
     * Retrieve all resources
     * 
     * Retrieve all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resource::with(['branch', 'category', 'tos'])->get();
    }

    /**
     * @group Resource
     * 
     * Add a resource
     * 
     * Add a resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required|exists:App\Models\Branch,id',
            'category_id' => 'nullable',
            'tos_id' => 'nullable',
            'number' => 'required',
            'title_en' => 'required',
            'title_hk' => 'required|nullable',
            'title_cn' => 'required|nullable',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();
        
        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, (new Resource($validated_data))->save() ? 200 : 401);
    }

    /**
     * @group Resource
     * 
     * Retrieve a resource
     * 
     * Retrieve a resource.
     *
     * @urlParam resource string required The ID of the resource. Example: 1
     * 
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return $resource->where('id', $resource->id)->with(['branch', 'category', 'tos'])->first();
    }

    /**
     * @group Resource
     * 
     * Update a resource
     * 
     * Update a resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required|exists:App\Models\Branch,id',
            'category_id' => 'nullable',
            'tos_id' => 'nullable',
            'number' => 'required',
            'title_en' => 'required',
            'title_hk' => 'required|nullable',
            'title_cn' => 'required|nullable',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();
        
        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, $resource->update($validated_data) ? 200 : 401);
    }

    /**
     * @group Resource
     * 
     * Remove a resource
     * 
     * Remove a resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        Resource::destroy($resource->id);
        return response(null, 200);
    }

    /**
     * @group Resource
     * 
     * Remove multiple resources
     * 
     * Remove multiple resources.
     * 
     * @bodyParam ids array required Array of the resources' id Example: {"ids": [1, 2]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        Resource::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group Resource
     * 
     * Reset resources
     * 
     * Remove all resources.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        Resource::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group Resource
     * 
     * Export resources
     * 
     * Export resources.
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
        $export = new ResourcesExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('resources.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('resources.tsv', Excel::TSV);
            case 'ODS': return $export->download('resources.ods', Excel::ODS);
            case 'XLS': return $export->download('resources.xls', Excel::XLS);
            case 'HTML': return $export->download('resources.html', Excel::HTML);
            default: return $export->download('resources.xlsx', Excel::XLSX);
        }
    }

     /**
     * @group Resource
     * 
     * Import resources
     * 
     * Import resources.
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
        $import = new ResourcesImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }
}
