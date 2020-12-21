<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBanners = [
            [
                'banner_name' => 'Sale 12/12',
                'banner_image' => 'sale_12_12.jpg'
            ],
            [
                'brand_name' => 'Sản phẩm đa dạng',
                'brand_slug' => 'san_pham_da_dang.jpg'
            ],
            [
                'brand_name' => 'Tận tâm chăm sóc',
                'brand_slug' => 'tan_tam_cham_soc.jpg'
            ],
            [
                'brand_name' => 'Thức ăn cho chó mèo',
                'brand_slug' => 'thuc_an_cho_cho_meo.jpg'
            ],
            [
                'brand_name' => 'Lồng cầu may mắn',
                'brand_slug' => 'long_cau_may_man.jpg'
            ],
            [
                'brand_name' => 'Neko loại mới',
                'brand_slug' => 'neko_loai_moi.jpg'
            ],
            [
                'brand_name' => 'Cát gỗ vệ sinh',
                'brand_slug' => 'cat_go_ve_sinh.png'
            ],
            [
                'brand_name' => 'Snappy 60k',
                'brand_slug' => 'Snappy_60k.png'
            ],
            [
                'brand_name' => 'Sữa cao cấp cho chó',
                'brand_slug' => 'sua_cao_cap_cho_cho.jpg'
            ]
        ];

        DB::table('banners')->insert($listBanners);
    }
}
