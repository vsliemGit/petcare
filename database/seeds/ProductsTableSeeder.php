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
                'product_name' => "JERHIGH Chicken",
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
                'product_name' => "Smartheart - Pate vị gà và gan cho chó lớn 130gr",
                'product_slug' => "smartheart_pate_vi_ga_va_gan_cho_cho_lon_130gr",
                'product_image' => "2206_PateSmartheartvgchochln130gr.png",
                'product_basis_price' => 19000,
                'product_price' => 20000,
                'product_quantity' => $faker->numberBetween(10, 100),
                'product_status' =>  1,
                'product_desc' => "Sản phẩm giàu dinh dưỡng,  giúp thúc đẩy sự phát triển toàn diện cho chó con và bổ sung các dưỡng chất cần thiết cho chó ",
                'pro_category_id' => 10,
                'brand_id' => 2
            ]
        ];
        DB::table('products')->insert($listProducts);
        
    }
}
