<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        //$this->middleware('is_campus_admin')->only(['store', 'update', 'destory']);
    }

    /**
     * @group User
     * 
     * Retrieve all Users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * @group User
     * 
     * Add a User
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
            'campus_id' => 'required',
            'permission' => 'required|digits_between:0,3',
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
        $user->permission = $request->permission;
        $user->program_id = $request->program_id;
        $user->campus_id = $request->campus_id;
        $user->first_name = $request->first_name ?? null;
        $user->last_name = $request->last_name ?? null;
        $user->chinese_name = $request->chinese_name ?? null;
        
        return response(null, $user->save() ? 200 : 401);
    }

    /**
     * @group User
     * 
     * Retrieve a User
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * @group User
     * 
     * Update a User
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->permission = $request->permission;
        $user->program_id = $request->program_id;
        $user->campus_id = $request->campus_id;
        $user->first_name = $request->first_name ?? null;
        $user->last_name = $request->last_name ?? null;
        $user->chinese_name = $request->chinese_name ?? null;

        return response(null, $user->save() ? 200 : 401);
    }

    /**
     * @group User
     * 
     * Remove a User
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
     * @group User
     * 
     * Retrieve me
     *
     * @return \Illuminate\Http\Response
     */
    public function myself(Request $request)
    {
        $user = User::where('name', $request->user()->name)->first();
        return $user ?? response(null, 500);
    }
}
