<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        for ($i = 1; $i <= 50; $i++) {
            $row = [
                'username' => $faker->word(),
                'password' => bcrypt('123456'),
                'last_name' => $faker->word(),
                'first_name' => $faker->word(),
                'gender' => $faker->randomElement([0, 1]),
                'email' => $faker->email(),
                'birthday' => $faker->dateTimeBetween('-20 years', '+20 years'),
                'avatar' => 'users/avatar/' . $faker->randomElement(['avatar-default1', 'avatar-default2']),
                'code' => $faker->word(),
                'phone' => $faker->phoneNumber(),
                'company' => $faker->company(),
                'billing_address' => $faker->address(),
                'shipping_address' => $faker->address(),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'postal_code' => $faker->postcode(),
                'country' => $faker->country(),
                'remember_token' => '',
                'activate_code' => $faker->uuid(),
                'status' => $faker->randomElement([0, 1]),
                'created_at' => date('Y-m-d H:i:s')
            ];
            array_push($list, $row);
        }
        DB::table('shop_customers')->insert($list);
    }
}
