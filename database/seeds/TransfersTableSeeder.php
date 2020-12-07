<?php

use Illuminate\Database\Seeder;

class TransfersTableSeeder extends Seeder
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
                'transfer_name'      => "Miễn phí",
                'transfer_desc' => "Nhận hàng trực tiếp tại cửa hàng.",
                'transfer_shipping'   => 0
            ],
            [
                'transfer_name'      => "Miễn phí (trong vòng 24h)",
                'transfer_desc' => "Chỉ áp dụng tại nội ô Tp. Cần Thơ và đơn hàng được nhận trước ngày gửi ít nhất là 2 ngày.",
                'transfer_shipping'  => 0
            ],           
            [
                'transfer_name'      => "Vận chuyển thường",
                'transfer_desc' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.",
                'transfer_shipping'   => 30000  
            ],
            [
                'transfer_name'      => "Vận chuyển nhanh",
                'transfer_desc' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện. Thời gian thỏa thuận.",
                'transfer_shipping' => 100000
            ]
        ];

        DB::table('transfers')->insert($list);
    }
}
