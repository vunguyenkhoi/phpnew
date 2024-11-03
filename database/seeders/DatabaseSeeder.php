<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Dữ liệu mẫu Users
        $this->call([
            AclUsersSeeder::class,
            AclPermissionsSeeder::class,
            AclRolesSeeder::class,
            AclUserHasRolesSeeder::class,
            AclRoleHasPermissions::class,
            AclUserHasPermissionsSeeder::class
        ]);
        
        //Dữ liệu mẫu Quản lý đặt hàng
        $this->call([
            ShopCustomersSeeder::class,
            ShopPaymentTypesSeeder::class,
        ]);

        //Dữ liệu mẫu về Products
        $this->call([
            ShopSuppliersSeeder::class,
            ShopCategoriesSeeder::class,
            ShopProductsSeeder::class,
            ShopProductsImagesSeeder::class,
            ShopProductDiscountsSeeder::class,
            ShopOrdersSeeder::class,
            ShopProductRreviewsSeeder::class,
        ]);

        //Dữ liệu mẫu Stores
        $this->call([
            ShopStoresSeeder::class,
            ShopImportsSeeder::class,
            ShopExportsSeeder::class,
        ]);

        //Dữ liệu mẫu Vouchers
        $this->call([
            ShopVouchersSeeder::class,
            ShopProductVouchersSeeder::class,
            ShopCustomersVouchersSeeder::class
        ]);

        //Dữ liệu mẫu về Post
        $this->call([
            ShopPostCategoriesSeeder::class,
            ShopPostsSeeder::class
        ]);

        //Dữ liệu mẫu Shop setting
        $this->call([ShopSettings::class]);
    }
}
//Trong file DatabaseSeeder em không gọi tới ShopExportsSeeder