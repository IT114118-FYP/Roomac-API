<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Branch;
use App\Models\Program;
use App\Models\Resource;
use App\Models\Setting;
use App\Models\BranchSetting;
use App\Models\ResourceAvailable;
use App\Models\ResourceBooking;
use App\Models\ResourceReserved;
use App\Models\Category;
use App\Models\Tos;

use \DateTime;
use \DateTimeZone;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        # Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        # Truncate all models
        Schema::disableForeignKeyConstraints();
        BranchSetting::truncate();
        Setting::truncate();
        ResourceAvailable::truncate();
        ResourceBooking::truncate();
        ResourceReserved::truncate();
        Resource::truncate();
        User::truncate();
        Program::truncate();
        Branch::truncate();
        Role::truncate();
        Permission::truncate();
        Category::truncate();
        Tos::truncate();
        Schema::enableForeignKeyConstraints();

        # Permission
        $permissions = [
            'login:admin',
            'create:roles', 'update:roles', 'delete:roles', 'grant:roles', 'revoke:roles',
            'create:programs', 'update:programs', 'delete:programs',
            'create:branches', 'update:branches', 'delete:branches',
            'create:users', 'update:users', 'delete:users',
            'grant:permissions', 'revoke:permissions',
        ];
        $this->seedPermission($permissions);

        # Role
        $roles = [
            'root' => $permissions,
            'User Admin' => ['create:users', 'update:users', 'delete:users'],
            'Custom Create' => ['create:programs', 'create:branches', 'create:users'],
            //'staff' => ''
        ];
        $this->seedRole($roles);

        # Program
        $rows = [
            ['IT114118', 'Higher Diploma in AI and Mobile Applications Development', '人工智能及手機軟件開發高級文憑', '人工智能及手机软件开发高级文凭'],
            ['IT114105', 'Higher Diploma in Software Engineering','軟件工程高級文憑', '软件工程高级文凭'],
            ['CE114301', 'Higher Diploma in Child Care and Education', '幼兒教育高級文憑', '幼儿教育高级文凭'],
        ];
        $this->seedProgram($rows);

        # Branch
        $rows = [
            ['CW', 'Chai Wan', '柴灣', '柴湾'], ['HW', 'Haking Wong', '黃克競', '黄克竞'], ['KC', 'Kwai Chung', '葵涌', '葵涌'],
            ['KT', 'Kwun Tong', '觀塘', '观塘'], ['LWL', 'Lee Wai Lee', '李惠利', '李惠利'], ['MH', 'Morrison Hill', '摩理臣山', '摩理臣山'],
            ['ST', 'Sha Tin', '沙田', '沙田'], ['TY', 'Tsing Yi', '青衣', '青衣'], ['TM', 'Tuen Mun', '屯門', '屯门'],
        ];
        $this->seedBranch($rows);

        # Category
        $rows = [
            ['Classroom', '課室', '教室', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1610342834/riak0mox4pqzxesenegs.jpg'],
            ['Library', '圖書館', '图书馆', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1610343016/ca8zmlcwcbcspgw6sked.jpg'],
        ];
        $this->seedCategory($rows);

        # Terms and Conditions
        $rows = [
            [
'- Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.
- line 2
- line 3',
'',
''
            ],
        ];
        $this->seedTos($rows);

        # Resource
        $rows = [
            [1, 'ST', 1, 'IT-417A', 'Interview Room', '接見室', '接见室', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453326/aqmyrwsqxucpt5ql5dwj.jpg', 1, 20, '08:00', '15:00'],
            [1, 'ST', 1, 'IT-421B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [1, 'ST', 1, 'CS-442', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [1, 'ST', 1, 'CS-404', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'ST', 1, 'CS-332B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'ST', 1, 'CS-N108B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'ST', 1, 'IT-427B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
        ];
        $this->seedResource($rows);

        # User
        $rows = [
            ['000000000', 'admin@vtc.edu.hk', '12345678', null, null, null, 'admin', null],
            ['190189768', '190189768@stu.vtc.edu.hk', '12345678', 'CE114301', 'CW', 'Pui Tat', 'Tse', '謝沛達'],
            ['190271174', '190271174@stu.vtc.edu.hk', '12345678', 'IT114118', 'ST', 'Wing Kit', 'To', '涂穎傑'],
            ['190057409', '190057409@stu.vtc.edu.hk', '12345678', 'IT114105', 'ST', 'Wai Shing Vincent', 'Tai', '戴偉城'],
            ['190184921', '190184921@stu.vtc.edu.hk', '12345678', 'IT114118', 'KT', 'Cho Lok', 'Lam', '林祖樂'],
        ];
        $this->seedUser($rows);

        # Branch Setting
        $rows = [
            ['TIME_ZONE', 'VARCHAR', 'Asia/Hong_Kong'],
            ['OPEN_TIME', 'TIME', '08:30:00'],
            ['CLOSE_TIME', 'TIME', '20:00:00'],
            
            ['TIME_IN_ADVANCE', 'TIME', '24:00:00'],
            ['RESOURCE_MINUTE_PER_SESSION', 'INTEGER', '30'],
            ['MIN_CLIENT_UNLOCK', 'INTEGER', '3'],
            
            ['TEST_BOOLEAN_TRUE', 'BOOLEAN', '1'],
            ['TEST_VARCHAR', 'VARCHAR', 'Test String'], ['TEST_BOOLEAN_FALSE', 'BOOLEAN', '0'],
        ];
        $this->seedSetting($rows);

        # Branch Setting
        $rows = [
            ['ST', 'OPEN_TIME', '07:00:00', '1'], ['ST', 'CLOSE_TIME', '19:00:00', '1'],
        ];
        $this->seedBranchSetting($rows);

        # Resource Available
        $rows = [
            ['1', '12:00:00', '17:00:00', 1, true],
            ['1', '08:30:00', '18:00:00', 2, true],
            ['1', '06:30:00', '19:00:00', 3, true],
            ['1', '04:30:00', '20:00:00', 4, true],
            ['1', '02:30:00', '21:00:00', 5, true],
        ];
        $this->seedResourceAvailable($rows);

        # Resource Booking
        $rows = [
            ['2', '1', null, '2020-12-14 09:30:00', '2020-12-14 10:30:00'],
            ['2', '1', null, '2020-12-14 10:30:00', '2020-12-14 11:30:00'],
            ['2', '1', null, '2020-12-14 12:30:00', '2020-12-14 13:30:00'],
            ['2', '2', null, '2020-12-14 14:30:00', '2020-12-14 15:30:00'],
            ['2', '2', null, '2020-12-14 16:30:00', '2020-12-14 17:30:00'],
        ];
        $this->seedResourceBooking($rows);

        # User (Set roles and permissions)
        User::where('name', '000000000')->first()->assignRole('root');
        User::where('name', '190189768')->first()->assignRole(['User Admin', 'Custom Create']);
        User::where('name', '190189768')->first()->givePermissionTo('update:programs');
    }

    private function seedProgram($rows) {
        foreach ($rows as $row) {
            (new Program([
                'id' => $row[0],
                'title_en' => $row[1], 
                'title_hk' => $row[2],
                'title_cn' => $row[3],
            ]))->save();
        }
    }

    private function seedBranch($rows) {
        foreach ($rows as $row) {
            (new Branch([
                'id' => $row[0],
                'title_en' => $row[1], 
                'title_hk' => $row[2],
                'title_cn' => $row[3],
            ]))->save();
        }
    }

    private function seedCategory($rows) {
        foreach ($rows as $row) {
            (new Category([
                'title_en' => $row[0],
                'title_hk' => $row[1],
                'title_cn' => $row[2],
                'image_url' => $row[3],
            ]))->save();
        }
    }

    private function seedTos($rows) {
        foreach ($rows as $row) {
            (new Tos([
                'tos_en' => $row[0],
                'tos_hk' => $row[1],
                'tos_cn' => $row[2],
            ]))->save();
        }
    }

    private function seedResource($rows) {
        foreach ($rows as $row) {
            (new Resource([
                'category_id' => $row[0],
                'branch_id' => $row[1],
                'tos_id' => $row[2],
                'number' => $row[3],
                'title_en' => $row[4],
                'title_hk' => $row[5],
                'title_cn' => $row[6],
                'image_url' => $row[7],
                'min_user' => $row[8],
                'max_user' => $row[9],
                'opening_time' => $row[10],
                'closing_time' => $row[11],
            ]))->save();
        }
    }

    private function seedUser($rows) {
        foreach ($rows as $row) {
            (new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => Hash::make($row[2]),
                'program_id' => $row[3],
                'branch_id' => $row[4],
                'first_name' => $row[5],
                'last_name' => $row[6],
                'chinese_name' => $row[7],
            ]))->save();
        } 
    }

    private function seedSetting($rows) {
        foreach ($rows as $row) {
            (new Setting([
                'id' => $row[0],
                'data_type' => $row[1],
                'default_value' => $row[2],
            ]))->save();
        }
    }

    private function seedBranchSetting($rows) {
        foreach ($rows as $row) {
            (new BranchSetting([
                'branch_id' => $row[0],
                'setting_id' => $row[1],
                'value' => $row[2],
                'version' => $row[3],
            ]))->save();
        }
    }

    private function seedPermission($permissions) {
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    private function seedRole($roles) {
        foreach ($roles as $role => $permissions) {
            Role::create(['name' => $role])->givePermissionTo($permissions);
        }
    }

    private function seedResourceAvailable($rows) {
        foreach ($rows as $row) {
            //$start_time = new DateTime($row[1], new DateTimeZone('Asia/Hong_Kong'));
            //$start_time->setTimezone(new DateTimeZone('UTC'));

            //$end_time = new DateTime($row[2], new DateTimeZone('Asia/Hong_Kong'));
            //$end_time->setTimezone(new DateTimeZone('UTC'));

            (new ResourceAvailable([
                'resource_id' => $row[0],
                'start_time' => $row[1],
                'end_time' => $row[2],
                'day_of_week' => $row[3],
                'repeat' => $row[4],
            ]))->save();
        }
    }

    private function seedResourceBooking($rows) {
        foreach ($rows as $row) {
            //$start_time = new DateTime($row[3], new DateTimeZone('Asia/Hong_Kong'));
            //$start_time->setTimezone(new DateTimeZone('UTC'));

            //$end_time = new DateTime($row[4], new DateTimeZone('Asia/Hong_Kong'));
            //$end_time->setTimezone(new DateTimeZone('UTC'));

            (new ResourceBooking([
                'user_id' => $row[0],
                'resource_id' => $row[1],
                'branch_setting_version_id' => $row[2],
                'start_time' => $row[3],
                'end_time' => $row[4],
            ]))->save();
        }
    }
}
