<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AclRoleHasPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        //Lấy id từ bảng ACL Roles
        $arrAclRolesIds = DB::table('acl_roles')->pluck('id');
        //Lấy id từ bảng Acl Permissions
        $arrRolesIds = DB::table('acl_permissions')->pluck('id');

        for ($i = 1; $i <= 5; $i++) {
            $row = [
                'role_id' => $faker->randomElement($arrAclRolesIds),
                'permission_id' => $faker->randomElement($arrAclRolesIds)
            ];
            array_push($list, $row);
        }
        DB::table('acl_role_has_permissions')->insert($list);
    }
}
