<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        $arrCategoryIds = DB::table('shop_post_categories')->pluck('id');
        $arrUserIds = DB::table('acl_users')->pluck('id');

        for ($i = 0; $i <= 10; $i++) {
            $row = [
                'post_slug' => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'post_title' => $faker->name(3, true),
                'post_content' => $faker->paragraph(),
                'post_excerpt' => $faker->sentence(),
                'post_type' => $faker->dateTimeBetween('-1 years', 'now'),
                'post_status' => $faker->dateTimeBetween('-1 years', 'now'),
                'post_image' => $faker->dateTimeBetween('-1 years', 'now'),
                'user_id' => $faker->randomElement($arrUserIds),
                'post_category_id' => $faker->randomElement($arrCategoryIds),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')
            ];
            array_push($list, $row);
        }
        DB::table('shop_posts')->insert($list);
    }
}
