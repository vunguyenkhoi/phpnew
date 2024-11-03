<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopImportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $listImport = [];

        //Lấy dữ liệu từ bảng (ví dụ lấy cột id từ bảng ACL Users)
        $arrUserIds =  DB::table('acl_users')->pluck('id');
        $arrStoreIds =  DB::table('shop_stores')->pluck('id');
        $arrProductIds =  DB::table('shop_products')->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            $rowImport = [
                'store_id' => $faker->randomElement($arrStoreIds),
                'employee_id' => $faker->randomElement($arrUserIds),
                'import_date' => $faker->dateTimeBetween('-3 months', 'now'),
                'created_at' => $faker->dateTimeBetween('-3 months', 'now')
            ];
            //Insert vào database
            $idImport = DB::table('shop_imports')->insertGetId($rowImport);


            //Tạo dữ liệu cho phiếu nhập chi tiết shop_import_details
            $tongSoDongCon = $faker->numberBetween(1, 10);
            $listImportDetails = [];
            for ($j = 1; $j < $tongSoDongCon; $j++) {
                $rowImportDetail = [
                    'import_id' => $idImport,
                    'product_id' => $faker->randomElement($arrProductIds),
                    'quantity' => $faker->numberBetween(1, 100),
                    'unit_price' => $faker->numberBetween(1000, 1500000000),
                ];
                array_push($listImportDetails, $rowImportDetail);
            }
            //insert vào database
            DB::table('shop_import_details')->insert($listImportDetails);
        }
    }
}
