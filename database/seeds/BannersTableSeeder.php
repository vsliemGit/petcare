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
                'banner_image' => 'sale_12_12.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Sản phẩm đa dạng',
                'banner_image' => 'san_pham_da_dang.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Tận tâm chăm sóc',
                'banner_image' => 'tan_tam_cham_soc.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Thức ăn cho chó mèo',
                'banner_image' => 'thuc_an_cho_cho_meo.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Lồng cầu may mắn',
                'banner_image' => 'long_cau_may_man.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Neko loại mới',
                'banner_image' => 'neko_loai_moi.jpg',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Cát gỗ vệ sinh',
                'banner_image' => 'cat_go_ve_sinh.png',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Snappy 60k',
                'banner_image' => 'Snappy_60k.png',
                'banner_status' => 1
            ],
            [
                'banner_name' => 'Sữa cao cấp cho chó',
                'banner_image' => 'sua_cao_cap_cho_cho.jpg',
                'banner_status' => 1
            ]
        ];

        DB::table('banners')->insert($listBanners);
    }
}
