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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_code' => 'required',
            'program_title_en' => 'required',
            'program_title_hk' => 'required',
            'program_title_cn' => 'required',
        ]);
    
        // Validate the data
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $program = new Program;
        $program->program_code = $request->program_code;
        $program->program_title_en = $request->program_title_en;
        $program->program_title_hk = $request->program_title_hk;
        $program->program_title_cn = $request->program_title_cn;
        
        return response(null, $program->save() ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Retrieve a Program
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->program_code = $request->program_code;
        $program->program_title_en = $request->program_title_en;
        $program->program_title_hk = $request->program_title_hk;
        $program->program_title_cn = $request->program_title_cn;

        return response(null, $program->save() ? 200 : 401);
    }

    /**
     * @group Program
     * 
     * Remove a Program
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
