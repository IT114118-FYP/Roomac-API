<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * @group Role Permission
     * 
     * Retrieve a role's permissions
     * 
     * Retrieve a role's permissions.
     * 
     * @authenticated
     * 
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();
        $role_perms = $role->permissions;

        $role_perm_ids = [];
        foreach ($role_perms as $role_perm) {
            $role_perm_ids[] += $role_perm['id'];
        }

        $return = array();
        foreach ($permissions as $permission) {
            $return[$permission['name']] = in_array($permission['id'], $role_perm_ids);
        }

        return $return;
    }

    /**
     * @group Role Permission
     * 
     * Update a role permissions
     * 
     * Update a role permissions.
     * 
     * @bodyParam create:roles bool Example: true
     * @bodyParam update:roles bool Example: true
     * @bodyParam delete:roles bool Example: true
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $permissions = $this->show($role);

        foreach ($request->all() as $name => $value) {
            if (isset($permissions[$name]) && $permissions[$name] !== $value) {
                if ($value === true) {
                    $role->givePermissionTo($name);
                } else if ($value === false) {
                    $role->revokePermissionTo($name);
                }
            }
        }

        return $this->show($role);
    }
}
