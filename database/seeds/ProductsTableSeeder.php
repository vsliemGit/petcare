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

        for($i=1; $i<31; $i++){
            array_push($listProducts, [
                'product_name' => "San pham $i",
                'product_slug' => "san_pham_$i",
                'product_image' => $faker->numberBetween(1, 10) . ".jpg",
                'product_basis_price' => $faker->numberBetween(10000, 99000),
                'product_price' => $faker->numberBetween(10000, 99000),
                'product_quantity' => $faker->numberBetween(1000, 10000),
                'product_status' =>  1,
                'product_desc' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                'pro_category_id' => $faker->numberBetween(1, 10),
                'brand_id' => $faker->numberBetween(1, 10)
            ]);
        }
        DB::table('products')->insert($listProducts);
        
    }
}
