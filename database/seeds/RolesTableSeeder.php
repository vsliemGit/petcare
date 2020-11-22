<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'role_name'      => "Default",
                'role_desc' => "Mặc định khi user mới tạo. Không có quyền gì cả"  
            ],
            [
                'role_name'      => "Admin",
                'role_desc' => "Quyền của người quản trị, có tất cả quyền trên hệ thống"      
            ],
            [
                'role_name'      => "Quản lý kho",
                'role_desc' => "Quản lý sản phẩm, đối tác, nhập kho, ..."      
            ],
            [
                'role_name'      => "Kế toán",
                'role_desc' => "Xuất phiếu thu, ký tên hóa đơn, ..."      
            ],
            [
                'role_name'      => "Nhân viên kinh doanh",
                'role_desc' => "Lập phiếu giao hàng, giao sản phẩm, ..."      
            ]
        ];

        DB::table('roles')->insert($list);
    }
}
