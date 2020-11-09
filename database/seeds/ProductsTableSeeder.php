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
                'product_desc' => "Miêu tả sản phẩm $i",
                'pro_category_id' => $faker->numberBetween(1, 10)
            ]);
        }
        DB::table('products')->insert($listProducts);
        
    }
}
