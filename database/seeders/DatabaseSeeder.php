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
        User::truncate();
        Program::truncate();
        Branch::truncate();
        Role::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        # Permission
        $permissions = [
            'create:programs', 'update:programs', 'delete:programs',
            'create:branches', 'update:branches', 'delete:branches',
            'create:users', 'update:users', 'delete:users',
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

        # User
        $rows = [
            ['000000000', 'admin@vtc.edu.hk', '12345678', null, null, null, 'admin', null],
            ['190189768', '190189768@stu.vtc.edu.hk', '12345678', 'CE114301', 'CW', 'Pui Tat', 'Tse', '謝沛達'],
            ['190271174', '190271174@stu.vtc.edu.hk', '12345678', 'IT114118', 'ST', 'Wing Kit', 'To', '涂穎傑'],
            ['190057409', '190057409@stu.vtc.edu.hk', '12345678', 'IT114105', 'ST', 'Wai Shing Vincent', 'Tai', '戴偉城'],
            ['190184921', '190184921@stu.vtc.edu.hk', '12345678', 'IT114118', 'KT', 'Cho Lok', 'Lam', '林祖樂'],
        ];
        $this->seedUser($rows);

        # User (Set roles and permissions)
        User::where('name', '000000000')->first()->assignRole('root');
        User::where('name', '190189768')->first()->assignRole(['User Admin', 'Custom Create']);
        User::where('name', '190189768')->first()->givePermissionTo('update:programs');
    }

    private function seedProgram($rows) {
        foreach ($rows as $row) {
            $program = new Program;
            $program->id = $row[0];
            $program->title_en = $row[1];
            $program->title_hk = $row[2];
            $program->title_cn = $row[3];
            $program->save();
        }
    }

    private function seedBranch($rows) {
        foreach ($rows as $row) {
            $branch = new Branch;
            $branch->id = $row[0];
            $branch->title_en = $row[1];
            $branch->title_hk = $row[2];
            $branch->title_cn = $row[3];
            $branch->save();
        }
    }

    private function seedUser($rows) {
        foreach ($rows as $row) {
            $user = new User;
            $user->name = $row[0];
            $user->email = $row[1];
            $user->password = Hash::make($row[2]);
            $user->program_id = $row[3];
            $user->branch_id = $row[4];
            $user->first_name = $row[5];
            $user->last_name = $row[6];
            $user->chinese_name = $row[7];
            $user->save();
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
}
