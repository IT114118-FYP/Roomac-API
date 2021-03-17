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
use App\Models\ResourceBooking;
use App\Models\ResourceReserved;
use App\Models\CheckInCode;
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
        ResourceBooking::truncate();
        ResourceReserved::truncate();
        Resource::truncate();
        User::truncate();
        Program::truncate();
        Branch::truncate();
        Role::truncate();
        Permission::truncate();
        Category::truncate();
        CheckInCode::truncate();
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
            ['CW', 'Chai Wan', '柴灣', '柴湾', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550859/CW_limxvp.jpg', 22.27184971280416, 114.23966999966933],
            ['HW', 'Haking Wong', '黃克競', '黄克竞', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550860/HW_nhu0jr.jpg', 22.335515694307148, 114.15235303926177],
            ['KC', 'Kwai Chung', '葵涌', '葵涌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550860/KC_hxxaga.jpg', 22.361874882559448, 114.12739740522944],
            ['KT', 'Kwun Tong', '觀塘', '观塘', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550861/KT_ktbvgg.jpg', 22.313565596542393, 114.2319411398032],
            ['LWL', 'Lee Wai Lee', '李惠利', '李惠利', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550860/LWL_s7uimr.jpg', 22.306200688765475, 114.25416772280548],
            ['MH', 'Morrison Hill', '摩理臣山', '摩理臣山', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550860/MH_tt43bg.jpg', 22.276190534604194, 114.17792360959957],
            ['ST', 'Sha Tin', '沙田', '沙田', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550859/ST_riofal.jpg', 22.39041332110964, 114.19803820902872],
            ['TY', 'Tsing Yi', '青衣', '青衣', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550859/TY_rli7ox.jpg', 22.342613629893574, 114.1062498109674],
            ['TM', 'Tuen Mun', '屯門', '屯门', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614550860/TM_vwyaga.jpg', 22.393113443939484, 113.96646235039742],
        ];
        $this->seedBranch($rows);

        # Category
        $rows = [
            ['Classroom', '課室', '教室', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1610342834/riak0mox4pqzxesenegs.jpg'],
            ['Library', '圖書館', '图书馆', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1610343016/ca8zmlcwcbcspgw6sked.jpg'],
            ['Computer Room', '電腦房', '电脑房', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611592893/o72p9styjrmdhbrf77zw.jpg'],
        ];
        $this->seedCategory($rows);

        # Terms and Conditions
        $rows = [
            [
'* Users should check-in within 15 minutes of the first session, otherwise the booking system will forfeit their reservation and will count against the quota limit.
* Users are expected to behave in these bookable spaces in accordance with the VTC\'s code of conduct: [https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf](https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf)
* Resources bookinged are for your use only, booking made via your account on behalf of other users will be invalid.',

'* 用戶應在15分鐘內到達，否則預訂系統將取消其預訂，併計入配額限制。
* 用戶應按照VTC的行為準則：[https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf](https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf)
* 預訂的資源僅供您使用，通過您的帳戶代表其他用戶進行的預訂將無效。',

'* 用户应在15分钟内到达，否则预订系统将取消其预订，并计入重新限制。
* 用户应遵循VTC的行为规范：[https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf](https://www.vtc.edu.hk/ti/mhti/hp2011/ivesite/html/tc/campus/OHD_Handbook_AY20-21.pdf)
* 预订的资源仅供您使用，通过您的帐户代表其他用户进行的预订将无效。',
            ],
        ];
        $this->seedTos($rows);

        # Resource
        $rows = [
            [1, 'ST', 1, 'IT-417A', 'Interview Room', '接見室', '接见室', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453326/aqmyrwsqxucpt5ql5dwj.jpg', 1, 20, '00:00', '24:00'],
            [1, 'ST', 1, 'IT-421B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [1, 'CW', 1, 'CS-442', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [1, 'CW', 1, 'CS-404', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'HW', 1, 'CS-332B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'TM', 1, 'CS-N108B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [2, 'TM', 1, 'IT-427B', '', '', '', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1608453111/qqz4jdu2hyielwrjl6zj.jpg', 2, 10, '08:00', '21:00'],
            [3, 'ST', 1, 'PC-001', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-002', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-003', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-004', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-005', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-006', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'ST', 1, 'PC-007', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'TM', 1, 'PC-001', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'TM', 1, 'PC-002', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'TM', 1, 'PC-003', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'TM', 1, 'PC-004', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
            [3, 'TM', 1, 'PC-005', 'Computer Desk', '電腦桌', '电脑桌', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1611590696/e2mxmh5fcbbkcudch59s.jpg', 2, 10, '08:00', '18:00'],
        ];
        $this->seedResource($rows);

        # User
        $rows = [
            ['000000000', 'admin@vtc.edu.hk', '12345678', null, null, null, 'admin', null, 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614553760/room_avzedt.png'],
            ['190189768', '190189768@stu.vtc.edu.hk', '12345678', 'CE114301', 'CW', 'Pui Tat', 'Tse', '謝沛達', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614553613/tat_pztvry.jpg'],
            ['190271174', '190271174@stu.vtc.edu.hk', '12345678', 'IT114118', 'ST', 'Wing Kit', 'To', '涂穎傑', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614553755/tommy_txftkf.png'],
            ['190057409', '190057409@stu.vtc.edu.hk', '12345678', 'IT114105', 'ST', 'Wai Shing Vincent', 'Tai', '戴偉城', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614553853/vin_o2nvrj.jpg'],
            ['190184921', '190184921@stu.vtc.edu.hk', '12345678', 'IT114118', 'KT', 'Cho Lok', 'Lam', '林祖樂', 'https://res.cloudinary.com/hkzbjzedn/image/upload/v1614553850/mo_rtpvry.jpg'],
        ];
        $this->seedUser($rows);

        # Branch Setting
        $rows = [
            ['OPEN_TIME', 'TIME', '08:30:00'],
            ['CLOSE_TIME', 'TIME', '20:00:00'],
            
            ['TIME_IN_ADVANCE', 'TIME', '24:00:00'],
            ['RESOURCE_MINUTE_PER_SESSION', 'INTEGER', '30'],
            ['MIN_CLIENT_UNLOCK', 'INTEGER', '3'],
            
            ['TEST_BOOLEAN_TRUE', 'BOOLEAN', '1'],
            ['TEST_VARCHAR', 'VARCHAR', 'Test String'],
            ['TEST_BOOLEAN_FALSE', 'BOOLEAN', '0'],
        ];
        $this->seedSetting($rows);

        # Branch Setting
        $rows = [
            ['ST', 'OPEN_TIME', '07:00:00', '1'], ['ST', 'CLOSE_TIME', '19:00:00', '1'],
        ];
        $this->seedBranchSetting($rows);

        # Resource Booking
        $rows = [];
        $this->seedResourceBooking($rows);

        # User (Set roles and permissions)
        User::where('name', '000000000')->first()->assignRole('root');
        User::where('name', '190189768')->first()->assignRole(['User Admin', 'Custom Create']);
        User::where('name', '190189768')->first()->givePermissionTo('update:programs');
    }

    private function seedProgram($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'id' => $row[0],
                'title_en' => $row[1], 
                'title_hk' => $row[2],
                'title_cn' => $row[3],
            ];
        }
        Program::insert($r);
    }

    private function seedBranch($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'id' => $row[0],
                'title_en' => $row[1], 
                'title_hk' => $row[2],
                'title_cn' => $row[3],
                'image_url' => $row[4],
                'lat' => $row[5],
                'lng' => $row[6],
            ];
        }
        Branch::insert($r);
    }

    private function seedCategory($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'title_en' => $row[0],
                'title_hk' => $row[1],
                'title_cn' => $row[2],
                'image_url' => $row[3],
            ];
        }
        Category::insert($r);
    }

    private function seedTos($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'tos_en' => $row[0],
                'tos_hk' => $row[1],
                'tos_cn' => $row[2],
            ];
        }
        Tos::insert($r);
    }

    private function seedResource($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
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
            ];
        }
        Resource::insert($r);
    }

    private function seedUser($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'name' => $row[0],
                'email' => $row[1],
                'password' => Hash::make($row[2]),
                'program_id' => $row[3],
                'branch_id' => $row[4],
                'first_name' => $row[5],
                'last_name' => $row[6],
                'chinese_name' => $row[7],
                'image_url' => $row[8],
            ];
        }
        User::insert($r);
    }

    private function seedSetting($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'id' => $row[0],
                'data_type' => $row[1],
                'default_value' => $row[2],
            ];
        }
        Setting::insert($r);
    }

    private function seedBranchSetting($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'branch_id' => $row[0],
                'setting_id' => $row[1],
                'value' => $row[2],
                'version' => $row[3],
            ];
        }
        BranchSetting::insert($r);
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

    private function seedResourceBooking($rows) {
        $r = [];
        foreach ($rows as $row) {
            $r[] = [
                'user_id' => $row[0],
                'resource_id' => $row[1],
                'branch_setting_version_id' => $row[2],
                'start_time' => $row[3],
                'end_time' => $row[4],
            ];
        }
        ResourceBooking::insert($r);
    }
}
