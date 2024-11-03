<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopVouchersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        for ($i = 1; $i <= 10; $i++) {

            $is_fixed = $faker->randomElement([0, 1]);
            if ($is_fixed == 0) {
                $discount_amount = $faker->randomFloat(1, 2, 15);
            } elseif ($is_fixed == 1) {
                $discount_amount = $faker->numberBetween(20000, 150000);
            }

            $row = [
                'voucher_code'          => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'voucher_name'         => $faker->word(3, true),
                'description'           => 'vouchers/voucher-' . $faker->numberBetween(1, 3) . '.jpg',
                'uses'                  => $faker->randomElement([1, 2, 3]),
                'max_uses'              => 2,
                'max_uses_user'         => 2,
                'type'                  => $faker->randomDigit(0, 5),
                'discount_amount'       => $discount_amount,
                'is_fixed'              => $faker->randomElement([0, 1]),
                'start_date'            => $faker->dateTimeBetween('-4 week', 'now'),
                'end_date'              => $faker->dateTimeBetween('now', '+4 week'),
                'delete_at'             => date('Y-m-d H:i:s'),
                'created_at'            => $faker->dateTimeBetween('-4 week', '+4 week')
            ];
            array_push($list, $row);
        }
        //Insert vào database
        DB::table('shop_vouchers')->insert($list);
    }
}
