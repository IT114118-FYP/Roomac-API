<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Setting;
use App\Models\BranchSetting;
use App\Models\BranchSettingVersion;
use Illuminate\Http\Request;

class BranchSettingController extends Controller
{
    private string $DEFAULT_SETTINGS_NAME = 'Default Settings';

    /**
     * @group Branch Setting
     * 
     * Retrieve all branch's settings versions
     * 
     * Retrieve all branch's settings versions.
     *
     * @urlParam branch string required The ID of the branch. Example: ST
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $branch)
    {
        $branch_svs = BranchSettingVersion::where('branch_id', $branch->id)->get();
        $versions = array(['version' => 0, 'name' => $this->DEFAULT_SETTINGS_NAME]);
        foreach ($branch_svs as $branch_sv) {
            $versions[] = ['version' => $branch_sv->version, 'name' => $branch_sv->name];
        }

        return [
            'active_version' => $this->getActiveVersion($branch->id),
            'versions' => $versions,
        ];
    }

    /**
     * @group Branch Setting
     * 
     * Add a new version of branch's settings
     * 
     * Add a new version of branch's settings
     *
     * @urlParam branch string required The ID of the branch. Example: ST
     * @queryParam name The name of the setting. Defaults to "New Settings". Example: My Special Settings
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Branch $branch)
    {
        $name = $request->query('name', 'New Settings');
        $new_version = BranchSettingVersion::where('branch_id', $branch->id)->max('version') + 1;
        (new BranchSettingVersion([
            'branch_id' => $branch->id,
            'name' => $name,
            'version' => $new_version,
        ]))->save();

        return [
            'version' => $new_version,
            'name' => $name,
            'active_at' => BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $new_version])->first()->active_at,
            'is_active' => $new_version == $this->getActiveVersion($branch->id),
            'settings' => $this->getFormattedSettings($branch->id, $new_version),
        ];
    }

    /**
     * @group Branch Setting
     * 
     * Retrieve a branch's settings by version
     * 
     * Retrieve a branch's settings by version.
     * 
     * @urlParam branch string required The ID of the branch. Example: ST
     * @urlParam version string required The version of the setting. Example: 0
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch, int $version)
    {
        if ($version == 0) {
            return [
                'version' => 0,
                'name' => $this->DEFAULT_SETTINGS_NAME,
                'active_at' => 0,
                'is_active' => $this->getActiveVersion($branch->id) == $version,
                'settings' => $this->getFormattedSettings($branch->id, 0),
            ];
        }

        $branch_sv = BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $version]);
        if (!$branch_sv->exists()) {
            return response(null, 404);
        }

        $branch_sv_obj = $branch_sv->first();
        return [
            'version' => $version,
            'name' => $branch_sv_obj->name,
            'active_at' => $branch_sv_obj->active_at,
            'is_active' => $version == $this->getActiveVersion($branch->id),
            'settings' => $this->getFormattedSettings($branch->id, $version)
        ];
    }

    /**
     * @group Branch Setting
     * 
     * Update a branch's settings by version
     * 
     * Update a branch's settings by version.
     * 
     * @urlParam branch string required The ID of the branch. Example: ST
     * @urlParam version string required The version of the setting. Example: 1
     * @queryParam name The new name of the setting. Example: My New Settings Name
     * 
     * @response status=200 scenario="success" ""
     * @response status=401 scenario="default_version_not_editable" ""
     * @response status=402 scenario="active_version_not_editable" ""
     * @response status=404 scenario="version_not_found" ""
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch, int $version)
    {
        if ($version == 0) {
            return response(null, 401);
        }

        if ($this->getActiveVersion($branch->id) == $version) {
            return response(null, 402);
        }

        if (!BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $version])->exists()) {
            return response(null, 404);
        }

        foreach ($request->all() as $setting_id => $new_value) {
            BranchSetting::where(['setting_id' => $setting_id, 'version' => $version])->update(['value' => $new_value]);
        }

        $new_name = $request->query('name', false);
        if ($new_name) {
            BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $version])->update(['name' => $new_name]);
        }

        return response(null, 200);
    }

    /**
     * @group Branch Setting
     * 
     * Remove a branch's settings by version
     * 
     * Remove a branch's settings by version.
     * 
     * @urlParam branch string required The ID of the branch. Example: ST
     * @urlParam version string required The version of the setting. Example: 0
     * 
     * @response status=200 scenario="success" ""
     * @response status=401 scenario="default_version_not_editable" ""
     * @response status=402 scenario="active_version_not_editable" ""
     * @response status=404 scenario="version_not_found" ""
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch, int $version)
    {
        if ($version == 0) {
            return response(null, 401);
        }

        if ($this->getActiveVersion($branch->id) == $version) {
            return response(null, 402);
        }

        if (!BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $version])->exists()) {
            return response(null, 404);
        } else {
            $id = BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $version])->first()->id;
            BranchSettingVersion::destroy($id);
            BranchSetting::where(['branch_id' => $branch->id, 'version' => $version])->destroy();
            return response(null, 200);
        }
    }

    /**
     * @group Branch Setting
     * 
     * Retrieve the active branch's settings
     * 
     * Retrieve the active branch's settings.
     * 
     * @urlParam branch string required The ID of the branch. Example: ST
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function active(Branch $branch)
    {
        $active_version = $this->getActiveVersion($branch->id);

        return [
            'version' => $active_version,
            'name' => $active_version == 0 ? $this->DEFAULT_SETTINGS_NAME : BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $active_version])->first()->name,
            'active_at' => $active_version == 0 ? 0 : BranchSettingVersion::where(['branch_id' => $branch->id, 'version' => $active_version])->first()->active_at,
            'is_active' => true,
            'settings' => $this->getFormattedSettings($branch->id, $active_version),
        ];
    }

    private function getFormattedSettings($branch_id, $version)
    {
        $branch_settings_kv = array();
        $branch_settings = BranchSetting::where(['branch_id' => $branch_id, 'version' => $version])->get();   
        for ($i = 0; $i < sizeof($branch_settings); $i++) {
            $setting_id = $branch_settings[$i]->setting_id;
            $branch_settings_kv[$setting_id] = [
                $branch_settings[$i]->value,
                $branch_settings[$i]->create_at,
                $branch_settings[$i]->update_at,
            ];
        }
        
        $settings = Setting::all();
        for ($i = 0; $i < sizeof($settings); $i++) {
            if (isset($branch_settings_kv[$settings[$i]->id])) {
                $branch_setting = $branch_settings_kv[$settings[$i]->id];
                $settings[$i]['value'] = $branch_setting[0];
                $settings[$i]['create_at'] = $branch_setting[1];
                $settings[$i]['update_at'] = $branch_setting[2];
            } else {
                $settings[$i]['value'] = $settings[$i]->default_value;
            }
        }

        return $settings;
    }

    private function getActiveVersion($branch_id) 
    {
        return (BranchSettingVersion::where('branch_id', $branch_id)->whereDate('active_at', '>', now())->orderBy('active_at', 'desc')->first())['version'] ?? 0;
    }
}
