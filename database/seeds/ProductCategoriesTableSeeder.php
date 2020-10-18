<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listProductCategories = [
            [
                'pro_category_name' => 'Hạt khô',
                'pro_category_slug' => 'Hạt khô'
            ],
            [
                'pro_category_name' => 'Thuốc xổ giun - sản phẩm bổ sung',
                'pro_category_slug' => 'Thuốc xổ giun - sản phẩm bổ sung'
            ],
            [
                'pro_category_name' => 'Thịt hầm - pate - snack - sữa',
                'pro_category_slug' => 'Thịt hầm - pate - snack - sữa'
            ],
            [
                'pro_category_name' => 'Sản phẩm trị ve &amp; bọ chét',
                'pro_category_slug' => 'Sản phẩm trị ve &amp; bọ chét'
            ],
            [
                'pro_category_name' => 'Sản phẩm chăm sóc',
                'pro_category_slug' => 'Sản phẩm chăm sóc'
            ],
            [
                'pro_category_name' => 'Dụng cụ tắm &amp; làm đẹp',
                'pro_category_slug' => 'Dụng cụ tắm &amp; làm đẹp'
            ],
            [
                'pro_category_name' => 'Sản phẩm vệ sinh',
                'pro_category_slug' => 'Sản phẩm vệ sinh'
            ],
            [
                'pro_category_name' => 'Dụng cụ ăn uống',
                'pro_category_slug' => 'Dụng cụ ăn uống'
            ],
            [
                'pro_category_name' => 'Ổ nệm',
                'pro_category_slug' => 'Ổ nệm'
            ],
            [
                'pro_category_name' => 'Đồ chơi cho chó',
                'pro_category_slug' => 'Đồ chơi cho chó'
            ],
            [
                'pro_category_name' => 'Đồ chơi cho mèo',
                'pro_category_slug' => 'Đồ chơi cho mèo'
            ],
        ];

        DB::table('product_categories')->insert($listProductCategories);
    }
}
