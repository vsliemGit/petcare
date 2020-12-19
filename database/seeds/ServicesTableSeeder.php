<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
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

        $listServices = [
            [
                'service_name' => 'Bảo Hiểm Sức Khỏe Thú Cưng',
                'service_slug' => 'bao_hiem_suc_khoe_thu_cung',
                'service_image' => 'bao_hiem_suc_khoe_thu_cung.jpg',
                'service_desc' => 'Ngày nay ai cũng thừa nhận thú cưng là thành viên trong gia đình, mong muốn chúng được hưởng các quyền lợi về chăm sóc sức khỏe như con người là xu hướng trong cách chơi thú cảnh của nhiều người yêu động vật. Để  đáp ứng quyền của thú cưng Pet-Pro cho ra đời dịch vụ mới: Bảo hiểm sức khỏe thú cưng. Với dịch vụ này, Pet-Pro sẽ giúp quý thân chủ có thể kéo dài niềm vui sống cùng chúng và mang lại sức khỏe an toàn cho cả 2.'  
            ],
            [
                'service_name' => 'TRÔNG GIỮ CHÓ MÈO NGÀY TẾT',
                'service_slug' => 'trong_giu_cho_meo_ngay_tet',
                'service_image' => 'trong_giu_cho_meo_ngay_tet.jpg',
                'service_desc' => 'Nếu bạn đang có nhu cầu tìm một nơi trông giữ chó mèo, thú cưng dịp Tết Nguyên Đán 2021 tại TPHCM thì hãy liên hệ với nhà trẻ Rainy Cat. Chúng tôi nhận chăm sóc thú cưng của bạn trong thời gian bạn vắng nhà với chất lượng và chi phí hợp lý.'  
            ],
            [
                'service_name' => 'Triệt Sản Cho Thú Cưng',
                'service_slug' => 'triet_san_cho_thu_cung',
                'service_image' => 'triet_san_cho_thu_cung.jpg',
                'service_desc' => 'Nếu bạn đang có nhu cầu tìm một nơi trông giữ chó mèo, thú cưng dịp Tết Nguyên Đán 2021 tại TPHCM thì hãy liên hệ với nhà trẻ Rainy Cat. Chúng tôi nhận chăm sóc thú cưng của bạn trong thời gian bạn vắng nhà với chất lượng và chi phí hợp lý.'  
            ],
            [
                'service_name' => 'Chích Ngừa Thú Cưng',
                'service_slug' => 'chich_ngua_thu_cung',
                'service_image' => 'chich_ngua_thu_cung.jpg',
                'service_desc' => 'Chích ngừa cho thú cưng là một giải pháp giúp bạn bảo vệ sức khỏe cho vật nuôi của mình tránh khỏi các bệnh nguy hiểm đồng thời cũng có thể giúp bảo vệ sức khỏe của gia đình bạn.'  
            ],
            [
                'service_name' => 'Trị Chứng Hôi Miệng Trên Chó',
                'service_slug' => 'tri_chung_hoi_mieng_tren_cho',
                'service_image' => 'tri_chung_hoi_mieng_tren_cho.jpg',
                'service_desc' => 'Chứng hôi miệng trên chó không chỉ làm ảnh hưởng tới cuộc sống của thú cưng. Nó còn gây ra nhiều tác động tiêu cực đối với sức khỏe của chúng.'  
            ],
            [
                'service_name' => 'Spa Grooming – Dịch Vụ Làm Đẹp Cho Thú Cưng',
                'service_slug' => 'spa_grooming_dich_vu_lam_dep_cho_thu_cung',
                'service_image' => 'spa_grooming_dich_vu_lam_dep_cho_thu_cung.jpg',
                'service_desc' => 'Spa Grooming là dịch vụ chăm sóc sắc đẹp thú cưng cực kỳ nổi tiếng. Nó làm cho thú của bạn trở nên đẹp hơn, thoải mái và khỏe mạnh hơn.'  
            ],
            [
                'service_name' => 'Khách Sạn Cho Thú Cưng',
                'service_slug' => 'khach_san_cho_thu_cung',
                'service_image' => 'khach_san_cho_thu_cung.jpg',
                'service_desc' => 'Khách sạn cho thú cưng là dịch vụ cung cấp nơi lưu trú cho thú cưng mỗi khi gia chủ có dịp đi xa mà không có ai chăm sóc thú cưng của mình. Ngoài ra dịch vụ khách sạn cho thú cưng còn nhận giữ giúp những “em thú nuôi” đáng yêu của bạn trong những dịp lễ, tết giúp cho gia đình an tâm vui chơi.'  
            ],
            [
                'service_name' => 'Vận chuyển – Khám chữa bệnh tại nhà',
                'service_slug' => 'van_chuyen_kham_chua_benh_tai_nha',
                'service_image' => 'van_chuyen_kham_chua_benh_tai_nha.jpg',
                'service_desc' => 'Nhằm tạo mọi điều kiện thuận lợi cho quý khách hàng, Bệnh Viện Thú Y PetCare hỗ trợ bác sĩ thú y tận nhà để thăm khám và thực hiện các dịch vụ đơn giản mà không cần kết quả xét nghiệm và chẩn đoán hình ảnh.'  
            ],
            [
                'service_name' => 'Cấp cứu 24/7',
                'service_slug' => 'cap_cuu_247',
                'service_image' => 'cap_cuu_247.jpg',
                'service_desc' => 'PetCare cung cấp dịch vụ cấp cứu 24/7, kể cả ngày lễ.  Hãy gọi cho chi nhánh PetCare  gần nhất và mang thú cưng tới bệnh viện khi bạn thấy các biểu hiện : Thần kinh (sốc, co giật, hôn mê), Khó thở, Gãy xương, Tiêu chảy, Nôn mửa nặng, Bụng phình to, Tắc đường tiểu, Nuốt phải dị vật hoặc chất độc, Đẻ khó, Bị thương nặng.'
            ]

        ];
        DB::table('services')->insert($listServices);
    }
}
