<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $listProducts = [];
        $faker    = Faker\Factory::create('vi_VN');

        $listProducts= [ 
            [
                'product_name' => "JERHIGH Chicken", //1
                'product_slug' => "jerhigh_chicken",
                'product_image' => "nuoc-sot-cho-cho-vi-thit-ga-va-rau-cu-jerhigh-chicken-and-vegetable-in-gravy-400x400.jpg",
                'product_basis_price' => 30000,
                'product_price' => 22000,
                'product_quantity' => $faker->numberBetween(1, 100),
                'product_status' =>  1,
                'product_desc' => "Nước sốt cho chó vị thịt gà và rau củ JERHIGH  Chicken and Vegetable in Gravy dành cho tất cả các giống chó.",
                'pro_category_id' =>10,
                'brand_id' => 1
            ],
            [
                'product_name' => "Smartheart - Pate vị gà",//2
                'product_slug' => "smartheart_pate_vi_ga",
                'product_image' => "2206_PateSmartheartvgchochln130gr.png",
                'product_basis_price' => 19000,
                'product_price' => 20000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Sản phẩm giàu dinh dưỡng,  giúp thúc đẩy sự phát triển toàn diện cho chó con và bổ sung các dưỡng chất cần thiết cho chó ",
                'pro_category_id' => 10,
                'brand_id' => 2
            ],
            [
                'product_name' => "PRO PAC Ultimates Large Breed",//3
                'product_slug' => "pro_pac_ultimates_large_breed",
                'product_image' => "250_4327_propac.jpg",
                'product_basis_price' => 170000,
                'product_price' => 155000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "PRO PAC Ultimates Large Breed Adult Chicken & Brown Rice Formula là một cách tiếp cận mới đến dinh dưỡng chất lượng cao cấp Được chế biến từ các thành phần đơn giản, bổ dưỡng từ thịt gà (> 20%), gạo nguyên hạt (18%), & rau quả (> 12%)",
                'pro_category_id' => 11,
                'brand_id' => 2
            ],
            [
                'product_name' => "Earthborn Holistic",//4
                'product_slug' => "Earthborn Holistic",
                'product_image' => "250_4314_ava.png",
                'product_basis_price' => 333000,
                'product_price' => 378000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Thức ăn cho chó Earthborn Holistic Primitive Natural được đóng gói đầy đủ năng lượng để cung cấp hương vị yêu thích và tất cả các chất dinh dưỡng cần. Công thức không có ngũ cốc hoặc gluten, công thức đặc biệt này là lý tưởng như một chế độ ăn kiêng cao, không có ngũ cốc.",
                'pro_category_id' => 11,
                'brand_id' => 2
            ],
            [
                'product_name' => "Farmina N&D",//5
                'product_slug' => "farmina_nd",
                'product_image' => "250_4285_parmini.png",
                'product_basis_price' => 456000,
                'product_price' => 595000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Farmina - N&D PUMPKIN DOG boar, apple medium & maxi adult (dành cho chó nhỡ và chó lớn trưởng thành). Vị heo, bí ngô & táo",
                'pro_category_id' => 12,
                'brand_id' => 3
            ],
            [
                'product_name' => "Creamy DOCTOR OMEGA-STICK",//6
                'product_slug' => "creamy_doctor_omega_stick",
                'product_image' => "250_3519_1702200001_m1.jpg",    
                'product_basis_price' => 88000,
                'product_price' => 90000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Creamy DOCTOR OMEGA-STICK 50gr (cho chó). Thương hiệu: Prunus ( Hàn Quốc)",
                'pro_category_id' => 13,
                'brand_id' => 4
            ],
            [
                'product_name' => "Thức ăn ướt Me-o Delite",//7
                'product_slug' => "thuc_an_uot_me-o_delite",
                'product_image' => "250_4379_delite_tuna_chicken.jpg",    
                'product_basis_price' => 30000,
                'product_price' => 34000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Nguyên Liệu Chính: Cá ngừ tươi, thịt gà xé, chất tạo đông, chất điều vị, taurin, các vitamin và khoáng chất. Thành phần dinh dưỡng: Chất đạm : 8%, Chất béo : 0.3% , Chất xơ : 1%, Độ ẩm : 90%",
                'pro_category_id' => 12,
                'brand_id' => 5
            ],
            [
                'product_name' => "AFP Krazy",//8
                'product_slug' => "afp_krazy",
                'product_image' => "250_2955_banh_thuong_afp_petcity.jpg",    
                'product_basis_price' => 33000,
                'product_price' => 36000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Được thành lập từ năm 1997, với 20 năm kinh nghiệm, mục tiêu của AFP và Pawise là cung cấp các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.",
                'pro_category_id' => 12,
                'brand_id' => 5
            ],
            [
                'product_name' => "Nhà hình quả dâu ABC",//9
                'product_slug' => "nha_hinh_qua_dau_abc",
                'product_image' => "250_1121_nha_hinh_qua_dau_abc_xanh_38x45x38cm.jpg",    
                'product_basis_price' => 299000,
                'product_price' => 320000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "- Ngôi nhà được làm từ chất liệu cotton thông thoáng, dễ vệ sinh và phù hợp với khí hậu nóng ẩm ở Việt Nam.
                - Bề mặt nằm có lớp lót cotton êm cùng thiết kế hình quả dâu với 3 mặt bao quanh nhằm tạo cho thú cưng của bạn cảm giác được che chở an toàn và ấm áp.
                - Nhà cho thú cưng sử dụng gam màu nổi bật kết hợp với những chấm nhỏ mô phỏng quả dâu, đây chắc chắn sẽ là nơi thư giãn lý tưởng, làm hài lòng những chú cún con xinh xắn.",
                'pro_category_id' => 28,
                'brand_id' => 2
            ],
            [
                'product_name' => "Yumme Yumme vị cừu",//10
                'product_slug' => "yumme_yumme_vi_cuuc",
                'product_image' => "250_4348_ava.jpg",    
                'product_basis_price' => 46000,
                'product_price' => 50000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Bánh thưởng cho mèo Yumme Yumme vị cừu 60gr. Thương hiệu: Catsrang (Hàn Quốc)",
                'pro_category_id' => 14,
                'brand_id' => 2
            ]
        ];
        DB::table('products')->insert($listProducts);
        
    }
}
