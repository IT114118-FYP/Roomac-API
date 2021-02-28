<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @group Role
     * 
     * Retrieve all roles
     * 
     * Retrieve all roles.
     * 
     * @authenticated
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * @group Role
     * 
     * Add a new role
     * 
     * Add a new role.
     * 
     * @authenticated
     * 
     * @bodyParam name string required The role name.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validatedData = $validator->valid();

        $role = Role::create(['name' => $validatedData['name']]);

        return response(null, 200);
    }

    /**
     * @group Role
     * 
     * Retrieve a role
     * 
     * Retrieve a role.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $role;
    }

    /**
     * @group Role
     * 
     * Update a role
     * 
     * Update a role.
     * 
     * @bodyParam name string required
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        return response(null, $role->update($validator->valid()) ? 200 : 401);
    }

    /**
     * @group Role
     * 
     * Remove a role
     * 
     * Remove a role.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);
        return response(null, 200);
    }
}
