<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'store_address' => '290 Quốc lộ 91B, Ninh Kiều, Cần Thơ',
                'store_name' => 'Chi nhánh 1',
                'store_latitude' => 10.038530506153663,
                'store_longitude' => 105.74283680325506
            ],
            [
                'store_address' => 'Đường số 36, An Bình, Bình Thủy, Cần Thơ',
                'store_name' => 'Chi nhánh 2',
                'store_latitude' => 10.01917204387506,
                'store_longitude' => 105.7378092508376
            ],
            [
                'store_address' => '101a Nguyên Đệ, An Hòa, Ninh Kiều, Cần Thơ',
                'store_name' => 'Chi nhánh 3',
                'store_latitude' => 10.0482006102626,
                'store_longitude' => 105.76234623697873 
            ],
            [
                'store_address' => '476-942 Quốc lộ 91, An Thới, Bình Thủy Cần Thơ',
                'store_name' => 'Chi nhánh 4',
                'store_latitude' => 10.06772399701022,
                'store_longitude' => 105.75791389019794
            ],
            [
                'store_address' => '36 Mậu Thân,An Hiệp, Ninh Kiều, Cần Thơ',
                'store_name' => 'Chi nhánh 5',
                'store_latitude' => 10.03676842275343,
                'store_longitude' => 105.77206364246037
            ]  

        ];

        DB::table('stores')->insert($list);
    }
}
