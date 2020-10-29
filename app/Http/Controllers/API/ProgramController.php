<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * @group Program
     * 
     * Retrieve all Programs
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
     * Add a Program
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
    
        // Validate the data
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $program = new Program;
        $program->id = $request->id;
        $program->title_en = $request->title_en;
        $program->title_hk = $request->title_hk;
        $program->title_cn = $request->title_cn;
        
        return response(null, $program->save() ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Retrieve a Program
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
     * Update a Program
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
        $program->title_en = $request->title_en;
        $program->title_hk = $request->title_hk;
        $program->title_cn = $request->title_cn;

        return response(null, $program->save() ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Remove a Program
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
}
