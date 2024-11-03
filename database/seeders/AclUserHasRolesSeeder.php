<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AclUserHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        //Lấy id từ bảng ACL Users
        $arrEmployeeIds = DB::table('acl_users')->pluck('id');
        //Lấy id từ bảng Customer
        $arrRolesIds = DB::table('acl_roles')->pluck('id');

        for ($i = 1; $i <= 5; $i++) {
            $row = [
                'user_id' => $faker->randomElement($arrEmployeeIds),
                'role_id' => $faker->randomElement($arrRolesIds)
            ];
            array_push($list, $row);
        }
        DB::table('acl_user_has_roles')->insert($list);
    }
}