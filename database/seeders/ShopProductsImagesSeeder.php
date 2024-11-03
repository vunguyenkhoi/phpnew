<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopProductsImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        //Lấy dữ liệu từ bảng (ví dụ lấy cột id từ bảng product)
        $arrProductIds =  DB::table('shop_products')->pluck('id');


        for ($i = 1; $i <= 100; $i++) {
            $row = [
                'product_id'          => $faker->randomElement($arrProductIds),
                'image'               => 'products/product-' . $faker->numberBetween(1, 3) . '.jpg',
                'created_at'          => $faker->dateTimeBetween('-4 week', '+4 week'),
            ];

            //push dữ liệu vào biến danh sách
            array_push($list, $row);
        }
        //Insert vào database
        DB::table('shop_product_images')->insert($list);
    }
}