<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopSuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'id'                => '1',
            'supplier_code'     => 'NCC1',
            'supplier_name'     => 'Nhà cung cấp Apple',
            'description'       => 'Nhà cung cấp uy tín các dòng điện thoại,máy tính bảng',
            'image'             => 'suppliers/logo/logo-iphone.jpg',
            'created_at'        => date('Y-m-d H:i:s')
        ];
        array_push($list, $row1);

        $row2 = [
            'id'                => '2',
            'supplier_code'     => 'NCC2',
            'supplier_name'     => 'Nhà cung cấp Microsoft',
            'description'       => 'Nhà cung cấp uy tín các sản phẩm phần mềm',
            'image'             => 'suppliers/logo/logo-microsoft.jpg',
            'created_at'        => date('Y-m-d H:i:s')
        ];
        array_push($list, $row2);

        DB::table('shop_suppliers')->insert($list);
    }
}
