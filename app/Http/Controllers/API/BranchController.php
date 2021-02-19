<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\BranchesImport;
use App\Exports\BranchesExport;
use Maatwebsite\Excel\Excel;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @group Branch
     * 
     * Retrieve all branches
     * 
     * Retrieve all branches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Branch::all();
    }

    /**
     * @group Branch
     * 
     * Add a branch
     * 
     * Add a branch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title_en' => 'required',
            'title_hk' => 'required',
            'title_cn' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, (new Branch($validator->valid()))->save() ? 200 : 401);
    }

    /**
     * @group Branch
     * 
     * Retrieve a branch
     * 
     * Retrieve a branch.
     * 
     * @urlParam branch string required The ID of the branch. Example: ST
     * 
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return $branch;
    }

    /**
     * @group Branch
     * 
     * Update a branch
     * 
     * Update a branch.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_hk' => 'required',
            'title_cn' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, $branch->update($validator->valid()) ? 200 : 401);
    }

    /**
     * @group Branch
     * 
     * Remove a branch
     * 
     * Remove a branch.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        Branch::destroy($branch->id);
        return response(null, 200);
    }

    /**
     * @group Branch
     * 
     * Remove multiple branches
     * 
     * Remove multiple branches.
     * 
     * @bodyParam ids array required Array of the branches' id Example: {"ids": ["ST", "TY"]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        Branch::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group Branch
     * 
     * Reset branches
     * 
     * Remove all branches.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        Branch::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group Branch
     * 
     * Export branches
     * 
     * Export branches.
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
        $export = new BranchesExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('branches.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('branches.tsv', Excel::TSV);
            case 'ODS': return $export->download('branches.ods', Excel::ODS);
            case 'XLS': return $export->download('branches.xls', Excel::XLS);
            case 'HTML': return $export->download('branches.html', Excel::HTML);
            default: return $export->download('branches.xlsx', Excel::XLSX);
        }
    }

    /**
     * @group Branch
     * 
     * Import branches
     * 
     * Import branches.
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
        $import = new BranchesImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }
}
