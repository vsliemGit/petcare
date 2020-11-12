<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBrands = [
            [
                'brand_name' => 'Petmate',
                'brand_slug' => 'petmate',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Nestle Purina',
                'brand_slug' => 'nestle_purina',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Mars Pet',
                'brand_slug' => 'mars_pet',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Mammoth Pet',
                'brand_slug' => 'mammoth_pet',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Kong',
                'brand_slug' => 'kong',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Hill’s Pet Nutrition',
                'brand_slug' => 'hill’s_pet_nutrition',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Rosewood Pet',
                'brand_slug' => 'rosewood_pet',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Zoetis',
                'brand_slug' => 'zoetis',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Merial',
                'brand_slug' => 'merial',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Green Pets Organic',
                'brand_slug' => 'green_pets_organic',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
            [
                'brand_name' => 'Elanco',
                'brand_slug' => 'elanco',
                'brand_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ],
        ];

        DB::table('brands')->insert($listBrands);
    }
}
