<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listServices = [];
        $faker    = Faker\Factory::create('vi_VN');

        for($i=1; $i<=30; $i++){
            array_push($listServices, [
                'service_name' => "Dich vu $i",
                'service_slug' => "dich_vu_$i",
                'service_image' => $faker->numberBetween(1, 12) . ".jpg",
                'service_price' => $faker->numberBetween(10000, 99000),
                'service_desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ]);
        }
        DB::table('services')->insert($listServices);
    }
}
