<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
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
                'payment_name'      => "Thanh toán khi nhận hàng",
                'payment_desc' => "Quý khách thanh toán trực tiếp khi nhận hàng"  
            ],
            [
                'payment_name'      => "Paypal",
                'payment_desc' => "Thông qua thẻ thanh toán quốc tế Paypal. Được xử lý trong tíc tắc!"      
            ]
        ];

        DB::table('payments')->insert($list);
        
    }
}
