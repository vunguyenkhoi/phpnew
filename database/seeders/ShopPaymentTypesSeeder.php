<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopPaymentTypesSeeder extends Seeder
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
                'payment_code' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'payment_name' => $faker->word(),
                'description' => $faker->sentence(),
                'image' => 'payment_type/payment' . $faker->numberBetween(1, 3) . '.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ];
            array_push($list, $row);
        }
        DB::table('shop_payment_types')->insert($list);
    }
}
