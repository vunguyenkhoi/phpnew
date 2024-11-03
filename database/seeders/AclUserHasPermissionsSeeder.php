<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AclUserHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        //Lấy id từ bảng ACL Users
        $arrUserIds = DB::table('acl_users')->pluck('id');
        //Lấy id từ bảng Acl Permissions
        $arrPermissionIds = DB::table('acl_permissions')->pluck('id');

        for ($i = 1; $i <= 5; $i++) {
            $row = [
                'user_id' => $faker->randomElement($arrUserIds),
                'permission_id' => $faker->randomElement($arrPermissionIds)
            ];
            array_push($list, $row);
        }
        DB::table('acl_user_has_permissions')->insert($list);
    }
}
