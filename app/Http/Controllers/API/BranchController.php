<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        ]);
    
        // Validate the data
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $branch = new Branch;
        $branch->id = $request->id;
        $branch->title_en = $request->title_en;
        $branch->title_hk = $request->title_hk;
        $branch->title_cn = $request->title_cn;
        
        return response(null, $branch->save() ? 200 : 401);
    }

    /**
     * @group Branch
     * 
     * Retrieve a branch
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->title_en = $request->title_en;
        $branch->title_hk = $request->title_hk;
        $branch->title_cn = $request->title_cn;

        return response(null, $branch->save() ? 200 : 401);
    }

    /**
     * @group Branch
     * 
     * Remove a branch
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
}
