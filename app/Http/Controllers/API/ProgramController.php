<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\ProgramsImport;
use App\Exports\ProgramsExport;
use Maatwebsite\Excel\Excel;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @group Program
     * 
     * Retrieve all programs
     * 
     * Retrieve all programs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Program::all();
    }

    /**
     * @group Program
     * 
     * Add a program
     * 
     * Add a program.
     *
     * @bodyParam id string required The ID of the program. Example: IT114118
     * @bodyParam title_en string required Title of the program in English. Example: Higher Diploma in AI and Mobile Applications Development
     * @bodyParam title_hk string required Title of the program in Traditional Chinese. Example: 人工智能及手機軟件開發高級文憑
     * @bodyParam title_cn string required Title of the program in Simplified Chinese. Example: 人工智能及手机软件开发高级文凭
     * 
     * @authenticated
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

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        
        return response(null, (new Program($validator->valid()))->save() ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Retrieve a program
     * 
     * Retrieve a program.
     *
     * @urlParam program string required The ID of the program. Example: IT114118
     * 
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return $program;
    }

    /**
     * @group Program
     * 
     * Update a program
     * 
     * Update a program.
     *
     * @urlParam program string required The ID of the program. Example: IT114118
     * 
     * @bodyParam title_en string required Title of the program in English. Example: Higher Diploma in AI and Mobile Applications Development
     * @bodyParam title_hk string required Title of the program in Traditional Chinese. Example: 人工智能及手機軟件開發高級文憑
     * @bodyParam title_cn string required Title of the program in Simplified Chinese. Example: 人工智能及手机软件开发高级文凭
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_hk' => 'required',
            'title_cn' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, $program->update($validator->valid()) ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Remove a program
     * 
     * Remove a program.
     * 
     * @urlParam program string required The ID of the program. Example: IT114118
     *
     * @authenticated
     * 
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        Program::destroy($program->id);
        return response(null, 200);
    }

    /**
     * @group Program
     * 
     * Remove multiple programs
     * 
     * Remove multiple programs.
     * 
     * @bodyParam ids array required Array of the programs' id Example: {"ids": ["IT114118", "IT123456"]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        Program::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group Program
     * 
     * Reset programs
     * 
     * Remove all programs.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        Program::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group Program
     * 
     * Export programs
     * 
     * Export programs.
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
        $export = new ProgramsExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('programs.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('programs.tsv', Excel::TSV);
            case 'ODS': return $export->download('programs.ods', Excel::ODS);
            case 'XLS': return $export->download('programs.xls', Excel::XLS);
            case 'HTML': return $export->download('programs.html', Excel::HTML);
            default: return $export->download('programs.xlsx', Excel::XLSX);
        }
    }
   
    /**
     * @group Program
     * 
     * Import programs
     * 
     * Import programs.
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
        $import = new ProgramsImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }
}
