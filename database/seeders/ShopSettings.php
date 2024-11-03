<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        $row = [
            'group' => $faker->word(3, true),
            'key' => $faker->word(2),
            'value' => $faker->sentence(),
            'description' => $faker->sentence(),
            'created_at' => date('Y-m-d H:i:s')
        ];
        array_push($list, $row);

        DB::table('shop_settings')->insert($list);
    }
}
