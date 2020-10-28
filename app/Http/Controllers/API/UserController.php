<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        //$this->middleware('is_campus_admin')->only(['store', 'update', 'destory']);
    }

    /**
     * @group Users
     * 
     * List users
     * 
     * @authenticated
     *
     * @response status=200 scenario="success" [{"id":1,"name":"190189768","email":"190189768@stu.vtc.edu.hk","permission":"1","program_id":"IT114118","campus_id":"ST","first_name":"Tat","last_name":"Chan","chinese_name":"\u4f55\u4e16","created_at":"2020-10-07T17:44:37.000000Z","updated_at":"2020-10-09T06:31:23.000000Z","deleted_at":null},{"id":6,"name":"190271174","email":"190271174@stu.vtc.edu.hk","permission":"1","program_id":"IT114118","campus_id":"ST","first_name":"Wing Kit","last_name":"To","chinese_name":"CHinese name","created_at":"2020-10-09T06:42:02.000000Z","updated_at":"2020-10-09T06:42:02.000000Z","deleted_at":null}]
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * @group Users
     * 
     * Create a user
     * 
     * @authenticated
     * 
     * @response status=200 scenario="success"
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'program_id' => 'required',
            'branch_id' => 'required',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'chinese_name' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        /*
        // Check is user already exist
        if (User::where('name', $request->name)->exists()) {
            return response('The user is already exist.', 401);
        }

        // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
        // Prevent Campus Admin create Root Admin account
        if ($request->permission_type == 1 && $request->user()->permission_type !== 1) {
            return response('Not enough permissions.', 402);
        }

        // Prevent Campus Admin create Campus Admin/Staff/User account from another campus
        if ($request->permission_type !== 1 && $request->user()->campus_id != $request->campus_id) {
            if ($request->user()->permission_type !== 1) {
                return response('Cannot create user from another campus.', 403);
            }
        }*/

        // Add User
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->program_id = $request->program_id;
        $user->branch_id = $request->branch_id;
        $user->first_name = $request->first_name ?? null;
        $user->last_name = $request->last_name ?? null;
        $user->chinese_name = $request->chinese_name ?? null;
        
        return response(null, $user->save() ? 200 : 401);
    }

    /**
     * @group Users
     * 
     * Get a User
     * 
     * @authenticated
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * @group Users
     * 
     * Update a User
     * 
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->program_id = $request->program_id;
        $user->branch_id = $request->branch_id;
        $user->first_name = $request->first_name ?? null;
        $user->last_name = $request->last_name ?? null;
        $user->chinese_name = $request->chinese_name ?? null;

        return response(null, $user->save() ? 200 : 401);
    }

    /**
     * @group Users
     * 
     * Delete a User
     * 
     * @authenticated
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        User::destroy($user->id);
        return response(null, 200);
    }

    
    /**
     * @group Users
     * 
     * Get myself
     * 
     * @authenticated
     * 
     * @response status=200 scenario="success" {"id":2,"name":"190189768","email":"190189768@stu.vtc.edu.hk","program_id":"CE114301","branch_id":"CW","first_name":"Pui Tat","last_name":"Tse","chinese_name":"\u8b1d\u6c9b\u9054","created_at":"2020-10-28T04:37:56.000000Z","updated_at":"2020-10-28T04:37:56.000000Z","deleted_at":null}
     *
     * @return \Illuminate\Http\Response
     */
    public function myself(Request $request)
    {
        return $request->user();
    }
}
