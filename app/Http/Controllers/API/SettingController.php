<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @group Setting
     * 
     * Retrieve all settings
     * 
     * Retrieve all settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all()->toArray();
        $len = sizeof($settings);

        for ($i = 0; $i < $len; $i++) {
            switch ($settings[$i]['data_type']) {
                case 'BOOLEAN': $settings[$i]['default_value'] = $settings[$i]['default_value'] == 1; break;
            }
        }

        return $settings;
    }

    /**
     * @group Setting
     * 
     * Retrieve a settings
     * 
     * Retrieve a settings.
     * 
     * @urlParam setting string required The ID of the setting. Example: OPEN_TIME
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        switch ($setting['data_type']) {
            case 'BOOLEAN': $setting['default_value'] = $setting['default_value'] == 1; break;
            //case 'INTEGER': $setting['default_value'] = bindec($setting['default_value']); break;
        }

        return $setting;
    }
}
