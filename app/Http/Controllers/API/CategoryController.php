<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\CategoriesImport;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Excel;

class CategoryController extends Controller
{
    /**
     * @group Category
     * 
     * Retrieve all categories
     * 
     * Retrieve all categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * @group Category
     * 
     * Add a category
     * 
     * Add a category.
     * 
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_hk' => 'nullable',
            'title_cn' => 'nullable',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'sometimes|nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        } else {
            $validated_data = $validator->valid();
        }

        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, (new Category($validated_data))->save() ? 200 : 401);
    }

    /**
     * @group Category
     * 
     * Retrieve category items (Resources)
     * 
     * Retrieve category items (Resources).
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return Resource::where('category_id', $category->id)->with(['branch', 'category', 'tos'])->get();
    }

    /**
     * @group Category
     * 
     * Update a category
     * 
     * Update a category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'sometimes|required',
            'title_hk' => 'sometimes|nullable',
            'title_cn' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'sometimes|nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        } else {
            $validated_data = $validator->valid();
        }

        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, $category->update($validated_data) ? 200 : 401);
    }

    /**
     * @group Category
     * 
     * Remove a category
     * 
     * Remove a category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return response(null, 200);
    }

    /**
     * @group Category
     * 
     * Remove multiple categories
     * 
     * Remove multiple categories.
     * 
     * @bodyParam ids array required Array of the categories' id Example: {"ids": [1, 2]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        Category::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group Category
     * 
     * Reset categories
     * 
     * Remove all categories.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        Category::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group Category
     * 
     * Export categories
     * 
     * Export categories.
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
        $export = new CategoriesExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('categories.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('categories.tsv', Excel::TSV);
            case 'ODS': return $export->download('categories.ods', Excel::ODS);
            case 'XLS': return $export->download('categories.xls', Excel::XLS);
            case 'HTML': return $export->download('categories.html', Excel::HTML);
            default: return $export->download('categories.xlsx', Excel::XLSX);
        }
    }

     /**
     * @group Category
     * 
     * Import categories
     * 
     * Import categories.
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
        $import = new CategoriesImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }
}
