<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AclUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        $row = [
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'last_name' => 'Hệ thống',
            'fist_name' => 'Quản trị',
            'gender' => '0',
            'email' => 'admin@gmail.com',
            'birthday' => date('Y-m-d H:i:s'),
            'avatar' => 'users/avatar/avatar-default.png',
            'code' => 'NV001',
            'job_title' => 'Quản trị',
            'department' => 'Phòng IT',
            'manager_id' => NULL,
            'phone' => '123456789',
            'address1' => 'Biên Hoà,Đồng Nai',
            'address2' => '',
            'city' => 'Biên Hoà',
            'state' => '',
            'postal_code' => '72000',
            'country' => 'Việt Nam',
            'remember_token' => '',
            'active_code' => '',
            'status' => 1, //Đanh hoạt động - 0: ngưng hoạt động
            'created_at' => date('Y-m-d H:i:s')
        ];
        array_push($list, $row);
        for ($i = 1; $i <= 10; $i++) {
            $row = [
                'username' => $faker->word(),
                'password' => bcrypt('123456'),
                'last_name' => $faker->word(),
                'fist_name' => $faker->word(),
                'gender' => $faker->randomElement([0, 1]),
                'email' => $faker->email(),
                'birthday' => $faker->dateTimeBetween('-30 years', '+30 years'),
                'avatar' => 'users/avatar/' . $faker->randomElement(['avatar-default1', 'avatar-default2']),
                'code' => $faker->word(),
                'job_title' => $faker->word(),
                'department' => $faker->word(),
                'manager_id' => NULL,
                'phone' => $faker->phoneNumber(),
                'address1' => $faker->address(),
                'address2' => $faker->address(),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'postal_code' => $faker->postcode(),
                'country' => $faker->country(),
                'remember_token' => '',
                'active_code' => $faker->uuid(),
                'status' => 2, //1:Đang hoạt động - 0: ngưng hoạt động - 2: chưa kích hoạt
                'created_at' => date('Y-m-d H:i:s')
            ];
            array_push($list, $row);
        }
        DB::table('acl_users')->insert($list);
    }
}