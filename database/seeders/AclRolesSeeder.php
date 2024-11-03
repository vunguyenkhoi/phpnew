<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AclRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        for ($i = 1; $i <= 5; $i++) {
            $row = [
                'name' => $faker->name(),
                'display_name' => $faker->name(),
                'guard_name' => $faker->name(),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')
            ];
            array_push($list, $row);
        }
        DB::table('acl_roles')->insert($list);
    }
}