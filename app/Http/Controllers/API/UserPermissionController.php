<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    /**
     * @group User Permission
     * 
     * Get a user's permissions
     * 
     * Retrieve all permissions associated with the user.
     * 
     * @authenticated
     * 
     * @response status=200 scenario="success" [{"name":"create:roles","granted":true,"role":null},{"name":"update:roles","granted":true,"role":null},{"name":"delete:roles","granted":false,"role":null},{"name":"grant:roles","granted":false,"role":null},{"name":"revoke:roles","granted":false,"role":null},{"name":"create:programs","granted":true,"role":"Custom Create"},{"name":"update:programs","granted":true,"role":null},{"name":"delete:programs","granted":false,"role":null},{"name":"create:branches","granted":true,"role":"Custom Create"},{"name":"update:branches","granted":false,"role":null},{"name":"delete:branches","granted":false,"role":null},{"name":"create:users","granted":true,"role":"Custom Create"},{"name":"update:users","granted":true,"role":"User Admin"},{"name":"delete:users","granted":true,"role":"User Admin"},{"name":"grant:permissions","granted":false,"role":null},{"name":"revoke:permissions","granted":false,"role":null}]
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $permissions = Permission::all();
        $user_perms = $user->getAllPermissions()->toArray();

        $return = array();
        foreach ($permissions as $permission) {
            $granted = false;
            $role = null;
            $len = sizeof($user_perms);
            for ($i = 0; $i < $len; $i++) {
                if ($user_perms[$i]['id'] === $permission['id']) {
                    $granted = true;
                    $role = isset($user_perms[$i]['pivot']['role_id']) ? Role::where('id', $user_perms[$i]['pivot']['role_id'])->first()->name : null;
                    array_splice($user_perms, $i, $i);
                    break;
                }
            }
            $return[] = [
                'name' => $permission['name'],
                'granted' => $granted,
                'role' => $role,
            ];
        }

        return $return;
    }

    /**
     * @group User Permission
     * 
     * Update permissions from a user
     * 
     * Update permissions from a user.
     *
     * @bodyParam name String Example: "create:users"
     * @bodyParam granted bool Example: true
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        foreach ($request->all() as $permission) {
            if (isset($permission['name']) && isset($permission['granted'])) {
                if ($permission['granted']) {
                    $user->givePermissionTo($permission['name']);
                } else {
                    $user->revokePermissionTo($permission['name']);
                }
            }
        }
    }
}
