<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBan;
use App\Models\ResourceBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Excel;

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
     * Retrieve all users
     * 
     * Retrieve all users.
     * 
     * @authenticated
     *
     * @response status=200 scenario="success" [{"id":1,"name":"190189768","email":"190189768@stu.vtc.edu.hk","permission":"1","program_id":"IT114118","branch_id":"ST","first_name":"Tat","last_name":"Chan","chinese_name":"\u4f55\u4e16","created_at":"2020-10-07T17:44:37.000000Z","updated_at":"2020-10-09T06:31:23.000000Z","deleted_at":null},{"id":6,"name":"190271174","email":"190271174@stu.vtc.edu.hk","permission":"1","program_id":"IT114118","branch_id":"ST","first_name":"Wing Kit","last_name":"To","chinese_name":"CHinese name","created_at":"2020-10-09T06:42:02.000000Z","updated_at":"2020-10-09T06:42:02.000000Z","deleted_at":null}]
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
     * Add a user
     * 
     * Add a user.
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
            'program_id' => 'nullable',
            'branch_id' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'chinese_name' => 'nullable',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'sometimes|nullable',
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

        $validated_data = $validator->valid();
        $validated_data['password'] = Hash::make($validated_data['password']);

        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, (new User($validated_data))->save() ? 200 : 401);
    }

    /**
     * @group User
     * 
     * Retrieve a user
     * 
     * Retrieve a user.
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
     * @group User
     * 
     * Update a user
     * 
     * Update a user.
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
            'name' => 'sometimes|required',
            'email' => 'sometimes|required',
            'password' => 'sometimes|required',
            'program_id' => 'sometimes|nullable',
            'branch_id' => 'sometimes|nullable',
            'first_name' => 'sometimes|nullable',
            'last_name' => 'sometimes|nullable',
            'chinese_name' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url' => 'sometimes|nullable',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        if (isset($request->image) && !is_null($request->image)) {
            $validated_data['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        }

        return response(null, $user->update($validated_data) ? 200 : 401);
    }

    /**
     * @group User
     * 
     * Remove a user
     * 
     * Remove a user.
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
     * @group User Ban
     * 
     * Get ban status
     * 
     * Get ban status.
     * 
     * @authenticated
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function indexBan(Request $request, User $user)
    {
        if (UserBan::where('user_id', $user->id)->where('expire_time', '>', now())->exists()) {
            $userban = UserBan::where('user_id', $user->id)->where('expire_time', '>', now())->select('expire_time')->first();
            return response(["expire_time" => $userban->expire_time], 200);
        }

        return response(["expire_time" => null], 200);
    }

    /**
     * @group User
     * 
     * Remove multiple users
     * 
     * Remove multiple users.
     * 
     * @bodyParam ids array required Array of the users' id Example: {"ids": [1, 2]}
     *
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        User::destroy($request->ids);
        return response(null, 200);
    }

    /**
     * @group User
     * 
     * Reset users
     * 
     * Remove all users.
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        User::whereNotNull('id')->delete();
        return response(null, 200);
    }

    /**
     * @group User
     * 
     * Export users
     * 
     * Export users.
     * 
     * @queryParam format Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx. Example: csv
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function export(Request $request)
    {
        $export = new UsersExport;
        $format = $request->query('format', 'xlsx');   
        switch (mb_strtoupper($format)) {
            case 'CSV': return $export->download('users.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
            case 'TSV': return $export->download('users.tsv', Excel::TSV);
            case 'ODS': return $export->download('users.ods', Excel::ODS);
            case 'XLS': return $export->download('users.xls', Excel::XLS);
            case 'HTML': return $export->download('users.html', Excel::HTML);
            default: return $export->download('users.xlsx', Excel::XLSX);
        }
    }

    /**
     * @group User
     * 
     * Import users
     * 
     * Import users.
     * 
     * @bodyParam file file required
     * 
     * @authenticated
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $import = new UsersImport;
        $import->import($request->file('file'));
        return response($import->getErrors(), 200);
    }

    /**
     * @group User
     * 
     * Get myself
     * 
     * Get current account informations with permissions.
     * 
     * @authenticated
     * 
     * @response status=200 scenario="success" {"id":2,"name":"190189768","email":"190189768@stu.vtc.edu.hk","program_id":"CE114301","branch_id":"CW","first_name":"Pui Tat","last_name":"Tse","chinese_name":"\u8b1d\u6c9b\u9054","created_at":"2020-11-01T09:00:22.000000Z","updated_at":"2020-11-01T09:00:22.000000Z","deleted_at":null,"permissions":[{"name":"login:admin","granted":true,"role":"root"},{"name":"create:roles","granted":true,"role":"root"},{"name":"update:roles","granted":true,"role":"root"},{"name":"delete:roles","granted":true,"role":"root"},{"name":"grant:roles","granted":true,"role":"root"},{"name":"revoke:roles","granted":true,"role":"root"},{"name":"create:programs","granted":true,"role":"root"},{"name":"update:programs","granted":true,"role":"root"},{"name":"delete:programs","granted":true,"role":"root"},{"name":"create:branches","granted":true,"role":"root"},{"name":"update:branches","granted":true,"role":"root"},{"name":"delete:branches","granted":true,"role":"root"},{"name":"create:users","granted":true,"role":"root"},{"name":"update:users","granted":true,"role":"root"},{"name":"delete:users","granted":true,"role":"root"},{"name":"grant:permissions","granted":true,"role":"root"},{"name":"revoke:permissions","granted":true,"role":"root"}]}
     *
     * @return \Illuminate\Http\Response
     */
    public function myself(Request $request)
    {
        return $request->user();
    }

    /**
     * @group User
     * 
     * Update myself avatar
     * 
     * Update current account avatar.
     * 
     * @bodyParam image file
     * 
     * @authenticated
     * 
     * @return \Illuminate\Http\Response
     */
    public function myselfAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validatedData = $validator->valid();
        $validatedData['image_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        return response(null, $request->user()->update($validatedData) ? 200 : 401);
    }

    /**
     * @group User
     * 
     * Update myself password
     * 
     * Update current account password.
     * 
     * @bodyParam old_password string
     * @bodyParam new_password string
     * 
     * @authenticated
     * 
     * @return \Illuminate\Http\Response
     */
    public function myselfPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validatedData = $validator->valid();

        if (Hash::check($validatedData['old_password'], $request->user()->password)) {
            if ($validatedData['old_password'] === $validatedData['new_password']) {
                return response('Old password cannot be the same as new password', 403);
            }

            $validatedData['password'] = Hash::make($validatedData['new_password']);

            // revoke all user login token
            $request->user()->tokens()->delete();

            return response(null, $request->user()->update($validatedData) ? 200 : 401);
        }

        return response('Old password is not the valid', 402);
    }

    /**
     * @group User
     * 
     * Get myself bookings
     * 
     * Get current account bookings.
     * 
     * @authenticated
     * 
     * @return \Illuminate\Http\Response
     */
    public function myselfBookings(Request $request)
    {
        return ResourceBooking::where('user_id', $request->user()->id)
            ->with(['resource'])->orderBy('created_at', 'desc')->get();
    }
}
