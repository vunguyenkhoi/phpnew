<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopCustomersVouchersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];
        //Lấy id từ bảng Customer
        $arrCustomerIDs = DB::table('shop_customers')->pluck('id');
        //Lấy id từ bảng Voucher
        $arrVoucherIds = DB::table('shop_vouchers')->pluck('id');

        for ($i = 1; $i <= 50; $i++) {
            $row = [
                'customer_id' => $faker->randomElement($arrCustomerIDs),
                'voucher_id' => $faker->randomElement($arrVoucherIds),
                'created_at' => date('Y-m-d H:i:s')
            ];
            array_push($list, $row);
        }
        DB::table('shop_customer_vouchers')->insert($list);
    }
}
