<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopProductVouchersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        $arrProductIds =  DB::table('shop_products')->pluck('id');
        $arrVoucherIds = DB::table('shop_vouchers')->pluck('id');
        for ($i = 1; $i <= 50; $i++) {
            $row = [
                'product_id' => $faker->randomElement($arrProductIds),
                'voucher_id' => $faker->randomElement($arrVoucherIds),
                'created_at' => $faker->dateTimeBetween('-4 week', 'now')
            ];
            array_push($list, $row);
        }


        DB::table('shop_product_vouchers')->insert($list);
    }
}
