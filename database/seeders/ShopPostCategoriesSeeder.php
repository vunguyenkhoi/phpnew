<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopPostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        for ($i = 0; $i <= 10; $i++) {
            $row = [
                'post_category_code' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'post_category_name' => $faker->name(5, true),
                'description' => $faker->sentence(),
                'image' => 'categories/category-default.png',
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')
            ];
            array_push($list, $row);
        }
        DB::table('shop_post_categories')->insert($list);
    }
}
