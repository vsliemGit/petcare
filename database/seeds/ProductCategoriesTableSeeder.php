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
        $listProductCategorieParents = [
            [
                'pro_category_id' => 1,
                'pro_category_name' => 'Thức ăn',
                'pro_category_slug' => 'thuc_an',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 2,
                'pro_category_name' => 'Quần áo',
                'pro_category_slug' => 'quan_ao',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 3,
                'pro_category_name' => 'Vòng cổ, dây dắt, rọ mõm',
                'pro_category_slug' => 'vong_co_day_dat_ro_mom',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 4,
                'pro_category_name' => 'Vật dụng ăn uống',
                'pro_category_slug' => 'vat_dung_an_uong',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 5,
                'pro_category_name' => 'Y tế và thuốc',
                'pro_category_slug' => 'y_te_va_thuoc',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 6,
                'pro_category_name' => 'Mỹ phẩm & làm đẹp',
                'pro_category_slug' => 'my_pham_lam_dep',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 7,
                'pro_category_name' => 'Dụng cụ vệ sinh',
                'pro_category_slug' => 'dung_cu_ve_sinh',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 8,
                'pro_category_name' => 'Chuồng, vườn, nhà túi',
                'pro_category_slug' => 'chuong_vuon_nha_va_tui',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_id' => 9,
                'pro_category_name' => 'Đồ chơi, phụ kiện huấn luyện',
                'pro_category_slug' => 'do_choi_phu_kien_huan_luyen',
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]
        ];
        DB::table('product_categories')->insert($listProductCategorieParents);
    

        $listProductCategories= [
            [
                'pro_category_name' => 'Pate',
                'pro_category_slug' => 'pate',
                'parent_id' => 1,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Thức ăn khô',
                'pro_category_slug' => 'thuc_an_kho',
                'parent_id' => 1,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Thức ăn ướt',
                'pro_category_slug' => 'thuc_an_uot',
                'parent_id' => 1,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Thức ăn tươi sống',
                'pro_category_slug' => 'thuc_an_tuoi_song',
                'parent_id' => 1,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Snack, xương, bánh,...',
                'pro_category_slug' => 'snack_xuong_banh',
                'parent_id' => 1,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Quần & áo',
                'pro_category_slug' => 'quan_va_ao',
                'parent_id' => 2,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Váy, đầm',
                'pro_category_slug' => 'vay_va_dam',
                'parent_id' => 2,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Vòng cổ',
                'pro_category_slug' => 'vong_co',
                'parent_id' => 3,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Dây dắt',
                'pro_category_slug' => 'day_dat',
                'parent_id' => 3,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Bát, chén',
                'pro_category_slug' => 'bat_chen',
                'parent_id' => 4,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Bình nước',
                'pro_category_slug' => 'binh_nuoc',
                'parent_id' => 4,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Calxi & vitamins',
                'pro_category_slug' => 'calxi_vitamins',
                'parent_id' => 5,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Chăm sóc da lông móng',
                'pro_category_slug' => 'cham_soc_da_long_mong',
                'parent_id' => 5,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Chăm sóc răng miệng',
                'pro_category_slug' => 'cham_soc_rang_mieng',
                'parent_id' => 5,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Sữa tắm, dầu xả, nước hoa',
                'pro_category_slug' => 'sua_tam_dau_xa_nuoc_hoa',
                'parent_id' => 6,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Khử mùi hôi, sạch nhà',
                'pro_category_slug' => 'khu_mui_hoi_sach_nha',
                'parent_id' => 6,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Cắt tỉa/ chăm sóc da lông móng',
                'pro_category_slug' => 'cat_tia_cham_soc_da_long_mong',
                'parent_id' => 7,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Chai vệ sinh',
                'pro_category_slug' => 'chai_ve_sinh',
                'parent_id' => 7,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Nhà, niệm, giường',
                'pro_category_slug' => 'nha_niem_giuong',
                'parent_id' => 8,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Phụ kiện huấn luyện',
                'pro_category_slug' => 'nha_niem_giuong',
                'parent_id' => 8,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'pro_category_name' => 'Đồ chơi',
                'pro_category_slug' => 'do_choi',
                'parent_id' => 9,
                'pro_category_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]
        ];
        DB::table('product_categories')->insert($listProductCategories);
    }
}
