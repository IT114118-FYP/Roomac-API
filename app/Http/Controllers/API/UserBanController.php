<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class UserBanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * @group User Ban
     * 
     * Retrieve all user ban records
     * 
     * Retrieve all user ban records.
     * 
     * @authenticated
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserBan::all();
    }

    /**
     * @group User Ban
     * 
     * Ban a user
     * 
     * Ban a user.
     * 
     * @authenticated
     * 
     * @bodyParam user_id string required
     * @bodyParam ban_minutes integer required
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ban_minutes' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();

        $validated_data['expire_time'] = Carbon::now()->addMinutes($validated_data['ban_minutes']);

        $user = User::where('id', $validated_data['user_id'])->first();
        $user->tokens()->delete();

        return response(null, (new UserBan($validated_data))->save() ? 200 : 401);
    }

    /**
     * @group User Ban
     * 
     * Retrieve a user ban record
     * 
     * Retrieve a user ban record.
     * 
     * @authenticated
     *
     * @param  \App\Models\UserBan  $userBan
     * @return \Illuminate\Http\Response
     */
    public function show(UserBan $userBan)
    {
        return $userBan;
    }

    /**
     * @group User Ban
     * 
     * Update a user ban record
     * 
     * Update a user ban record.
     * 
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserBan  $userBan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBan $userBan)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|required',
            'expire_time' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $validated_data = $validator->valid();

        return response(null, $userBan->update($validated_data) ? 200 : 401);
    }

    /**
     * @group User Ban
     * 
     * Remove a user ban record
     * 
     * Remove a user ban record
     *
     * @param  \App\Models\UserBan  $userBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBan $userBan)
    {
        UserBan::destroy($userBan->id);
        return response(null, 200);
    }
}
