<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * @group User Role
     * 
     * Get a user's roles
     * 
     * Retrieve all roles associated with the user.
     * 
     * @authenticated
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $roles = $user->getRoleNames();

        return $roles;
    }

    /**
     * @group User Role
     * 
     * Update roles from a user
     * 
     * Update roles from a user.
     *
     * @bodyParam roles array Example: [{"update:roles", "delete:roles"}]
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'roles' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validatedData = $validator->valid();

        $user->syncRoles($validatedData['roles']);
    }
}
