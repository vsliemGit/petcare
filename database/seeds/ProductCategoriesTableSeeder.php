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
                'pro_category_name' => 'Sản phẩm cho Chó',
                'pro_category_slug' => 'san_pham_cho_cho',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Sản phẩm cho Mèo',
                'pro_category_slug' => 'san_pham_cho_meo',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Chó cảnh',
                'pro_category_slug' => 'cho_canh',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Mèo cảnh',
                'pro_category_slug' => 'meo_canh',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Phụ kiện cho Chó',
                'pro_category_slug' => 'phu_kien_cho_cho',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Phụ kiện cho mèo',
                'pro_category_slug' => 'phu_kien_cho_meo',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Thú kiểng',
                'pro_category_slug' => 'thu_kieng',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Dụng cụ ăn uống',
                'pro_category_slug' => 'dung_cu_an_uong',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Ổ nệm',
                'pro_category_slug' => '0_niem',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Đồ chơi cho chó',
                'pro_category_slug' => 'do_choi_cho_cho',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Đồ chơi cho mèo',
                'pro_category_slug' => 'do_choi_cho_meo',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
        ];

        DB::table('product_categories')->insert($listProductCategories);
    }
}
