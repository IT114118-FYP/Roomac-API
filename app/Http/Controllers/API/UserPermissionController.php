<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    /**
     * @group User Permission
     * 
     * Retrieve all Permissions in User
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        error_log($user);
        return Permission::all();
    }

    /**
     * @group User Permission
     * 
     * Add a Permission to User
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        error_log($user);
    }

    /**
     * @group User Permission
     * 
     * Check User has the specified Permission.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Permission $permission)
    {
        return Permission::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, User $user, Permission $permission) { }

    /**
     * @group User Permission
     * 
     * Remove the Permission from User.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Permission $permission)
    {
        //
    }
}
