<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopExportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $listExport = [];

        //Lấy id từ bảng ACL_Users
        $arrUserIds =  DB::table('acl_users')->pluck('id');
        //Lấy id từ bảng Shop_Stores
        $arrStoreIds =  DB::table('shop_stores')->pluck('id');
        //Lấy id từ bảng Shop_Products
        $arrProductIds =  DB::table('shop_products')->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            $rowExport = [
                'store_id' => $faker->randomElement($arrStoreIds),
                'employee_id' => $faker->randomElement($arrUserIds),
                'export_date' => $faker->dateTimeBetween('-3 months', 'now'),
                'created_at' => $faker->dateTimeBetween('-3 months', 'now')
            ];
            //Insert vào database và lấy luôn id của bảng shop_exports
            $idExport = DB::table('shop_exports')->insertGetId($rowExport);


            //Tạo dữ liệu cho phiếu nhập chi tiết shop_export_details
            $tongSoDongCon = $faker->numberBetween(1, 10);
            $listExportDetails = [];
            for ($j = 1; $j < $tongSoDongCon; $j++) {
                $rowExportDetail = [
                    'export_id' => $idExport,
                    'product_id' => $faker->randomElement($arrProductIds),
                    'quantity' => $faker->numberBetween(1, 100),
                    'unit_price' => $faker->numberBetween(1000, 1500000000),
                ];
                array_push($listExportDetails, $rowExportDetail);
            }
            //insert vào database
            DB::table('shop_export_details')->insert($listExportDetails);
        }
    }
}