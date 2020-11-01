<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * @group User
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
     * @param  \App\Models\Permission  $permission
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
     * @group User
     * 
     * Update permissions from a user
     * 
     * Update permissions from a user.
     *
     * @bodyParam create:roles bool Example: true
     * @bodyParam update:roles bool Example: true
     * @bodyParam delete:roles bool Example: true
     * 
     * @authenticated
     * 
     * @response status=200 scenario="success" [{"name":"create:roles","granted":true,"role":null},{"name":"update:roles","granted":true,"role":null},{"name":"delete:roles","granted":false,"role":null},{"name":"grant:roles","granted":false,"role":null},{"name":"revoke:roles","granted":false,"role":null},{"name":"create:programs","granted":true,"role":"Custom Create"},{"name":"update:programs","granted":true,"role":null},{"name":"delete:programs","granted":false,"role":null},{"name":"create:branches","granted":true,"role":"Custom Create"},{"name":"update:branches","granted":false,"role":null},{"name":"delete:branches","granted":false,"role":null},{"name":"create:users","granted":true,"role":"Custom Create"},{"name":"update:users","granted":true,"role":"User Admin"},{"name":"delete:users","granted":true,"role":"User Admin"},{"name":"grant:permissions","granted":false,"role":null},{"name":"revoke:permissions","granted":false,"role":null}]
     * @response status=401 scenario="not_exist" {"not_exist":["create:roless","update:rolex"]}
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $permissions = $this->show($user);
        $validated = array();
        $name_not_found = array();

        foreach ($request->all() as $name => $value) {
            $name_not_found[] = $name;
            $len = sizeof($permissions);
            for ($i = 0; $i < $len; $i++) {
                if ($permissions[$i]['name'] === $name && $permissions[$i]['role'] === null) {
                    $granted = ($value === null || $value === false) ? false : true;
                    $validated[$name] = $granted;
                    unset($name_not_found[$name]);
                    break;
                }
            }
        }

        if (sizeof($name_not_found) == 0) {
            foreach ($validated as $name => $granted) {
                if ($granted) {
                    $user->givePermissionTo($name);
                } else {
                    $user->revokePermissionTo($name);
                }
            }
            return $this->show($user);
        } else {
            return response(array("not_exist" => $name_not_found), 401);
        }
    }
}
