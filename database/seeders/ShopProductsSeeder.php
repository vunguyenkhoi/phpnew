<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $list = [];

        //Lấy dữ liệu từ bảng (ví dụ lấy cột id từ bảng suppliers)
        $arrSuppliersIds =  DB::table('shop_suppliers')->pluck('id');
        //Lấy dữ liệu từ bảng (ví dụ lấy cột id từ bảng categories)
        $arrCategoriesIds =  DB::table('shop_categories')->pluck('id');

        $row1 = [
            'product_code'          => '83U9349',
            'product_name'          => 'Laptop HP Pavilion 15 eg3098TU',
            'image'                 => 'products/hp-13.jpg',
            'short_description'     => 'Hư gì đổi nấy 12 tháng tại 2966 siêu thị toàn quốc (miễn phí tháng đầu)',
            'description'           => 'cĐược ra đời nhắm đến giới doanh nhân - những người luôn cần những chiếc laptop có sự trang nhã và lịch lãm và di động cao. Laptop HP EliteBook 830 G5 không chỉ sở hữu ngoại hình gọn nhẹ chỉ 13,3 inch, bền bỉ sang trọng mà còn có cấu hình mạnh mẽ và cũng như đề cao tính năng bảo mật. ',
            'standard_code'         => '6600000',
            'list_price'            => '7000000',
            'quantity_per_unit'     => '15',
            'discontinued'          => '0',
            'is_featured'           => '1',
            'is_new'                => '1',
            'category_id'           => '1',
            'supplier_id'           => '1',
            'created_at'        => date('Y-m-d H:i:s')
        ];
        array_push($list, $row1);
        //Vòng lặp
        for ($i = 1; $i <= 10; $i++) {
            $row = [
                'product_code'          => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'product_name'          => $faker->word(3, true),
                'image'                 => 'products/product-' . $faker->numberBetween(1, 3) . '.jpg',
                'short_description'     => $faker->sentence(),
                'description'           => $faker->paragraphs(2, true),
                'standard_code'         => $faker->numberBetween(20000, 15000000),
                'list_price'            => $faker->numberBetween(20000, 15000000),
                'quantity_per_unit'     => $faker->numberBetween(1, 50),
                'discontinued'          => $faker->randomElement([0, 1]),
                'is_featured'           => $faker->randomElement([0, 1]),
                'is_new'                => $faker->randomElement([0, 1]),
                'category_id'           => $faker->randomElement($arrCategoriesIds),
                'supplier_id'           => $faker->randomElement($arrSuppliersIds),
                'created_at'        => date('Y-m-d H:i:s')
            ];
            array_push($list, $row);
        }
        //Insert vào database
        DB::table('shop_products')->insert($list);
    }
}