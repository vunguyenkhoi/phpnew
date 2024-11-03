<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopProductRreviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        $arrProductIds = DB::table('shop_products')->pluck('id');
        $arrCustomerIds = DB::table('shop_customers')->pluck('id');

        for ($i = 1; $i <= 50; $i++) {
            $row = [
                'product_id' => $faker->randomElement($arrProductIds),
                'customer_id' => $faker->randomElement($arrCustomerIds),
                'rating' => $faker->randomDigit(0, 5),
                'comment' => $faker->sentence(),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')
            ];
            array_push($list, $row);
        }
        DB::table('shop_product_reviews')->insert($list);
    }
}
