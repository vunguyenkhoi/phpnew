<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        //Lấy id từ bảng ACL Users
        $arrEmployeeIds = DB::table('acl_users')->pluck('id');
        //Lấy id từ bảng Customer
        $arrCustomerIds = DB::table('shop_customers')->pluck('id');
        //Lấy id từ bảng Payment Type
        $arrPaymentTypeIds = DB::table('shop_payment_types')->pluck('id');
        //Lấy id từ bảng Product
        $arrProductIds = DB::table('shop_products')->pluck('id');

        for ($i = 1; $i <= 100; $i++) {
            $rowOrder = [
                'employee_id' => $faker->randomElement($arrEmployeeIds),
                'customer_id' => $faker->randomElement($arrCustomerIds),
                'order_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'shipped_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'ship_name' => $faker->name(),
                'ship_address1' => $faker->address(),
                'ship_address2' => $faker->address(),
                'ship_city' => $faker->city(),
                'ship_state' => $faker->state(),
                'ship_postal_code' => $faker->postcode(),
                'ship_country' => $faker->country(),
                'shipping_fee' => $faker->numberBetween(15000, 300000),
                'payment_type_id' => $faker->randomElement($arrPaymentTypeIds),
                'paid_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'order_status' => $faker->randomElement([0, 1]),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')
            ];
            $idOrder = DB::table('shop_orders')->insertGetId($rowOrder);

            //Tạo dữ liệu cho Order Details
            $tongSoDongCon = $faker->numberBetween(0, 10);
            $listOrderDetails = [];
            for ($j = 1; $j < $tongSoDongCon; $j++) {
                $is_fixed = $faker->randomElement([0, 1]);
                if ($is_fixed == 0) {
                    $discount_amount = $faker->randomFloat(1, 2, 15);
                } elseif ($is_fixed == 1) {
                    $discount_amount = $faker->numberBetween(20000, 150000);
                }
                $rowOrderDetail = [
                    'order_id' => $idOrder,
                    'product_id' => $faker->randomElement($arrProductIds),
                    'quantity' => $faker->numberBetween(1, 100),
                    'unit_price' => $faker->numberBetween(20000, 15000000),
                    'discount_percentage' => $faker->numberBetween(0, 15),
                    'discount_amount' => $discount_amount,
                    'order_detail_status' => $faker->randomElement([0, 1]),
                    'date_allocated' => $faker->dateTimeBetween('-1 years', 'now'),
                    'created_at' => $faker->dateTimeBetween('-1 years', 'now')
                ];
                array_push($listOrderDetails, $rowOrderDetail);
            }
            DB::table('shop_orders_details')->insert($listOrderDetails);
        }
    }
}
