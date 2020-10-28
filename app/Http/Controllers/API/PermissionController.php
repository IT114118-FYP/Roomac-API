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
     * @group Users
     * 
     * Assign permissions to a user
     * 
     * Assign permissions to a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function storeMany(Request $request, User $user)
    {
        error_log($user);
    }

    /**
     * @group Users
     * 
     * Get a user's permissions
     * 
     * Retrieve all permissions associated with the user.
     * 
     * @response status=200 scenario="success" [{"name":"create:users","granted":true,"role":"Custom Create"},{"name":"update:users","granted":false,"role":null},{"name":"delete:users","granted":true,"role":"User Admin"}]
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
            $granted = $in_role = false;
            $len = sizeof($user_perms);
            for ($i = 0; $i < $len; $i++) {
                if ($user_perms[$i]['id'] == $permission['id']) {
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
     * @group Users
     * 
     * Remove permissions from a user
     * 
     * Remove permissions from a user.
     *
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam user_id int required The id of the user. Example: 9
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request, User $user)
    {
        error_log($request->all());
        if (is_array($request->all())) 
        {
            error_log('is array');
        }
        else
        {
            error_log('is not array');
            //Product::findOrFail($id)->delete();
        }
    }
}
