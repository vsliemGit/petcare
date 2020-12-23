<?php

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $listProductDetails = [
            [

                'product_detail_content' => '<h1>M&ocirc; tả</h1>

                <p>Nước sốt cho ch&oacute; vị thịt g&agrave; v&agrave; rau củ&nbsp;<a href="https://www.petmart.vn/thuong-hieu/jerhigh" title="JERHIGH">JERHIGH&nbsp;</a>&nbsp;Chicken and Vegetable in Gravy d&agrave;nh cho tất cả c&aacute;c giống ch&oacute;.</p>
                
                <h2>Lợi &iacute;ch ch&iacute;nh</h2>
                
                <p>JERHIGH Chicken and Vegetable in Gravy vị g&agrave; v&agrave; rau củ tẩm nước sốt gi&uacute;p xương v&agrave; răng chắc khỏe. Inulin v&agrave; chất xơ thực phẩm gi&uacute;p điều h&ograve;a hệ ti&ecirc;u h&oacute;a v&agrave; hệ b&agrave;i tiết. Thịt g&agrave; cung cấp lượng Protein cần thiết, c&acirc;n bằng sự ph&aacute;t triển của cơ thể. K&iacute;ch th&iacute;ch sự vận động, tăng cường c&aacute;c phản xạ với m&ocirc;i trường. C&uacute;n cưng nhanh nhẹn v&agrave; th&ocirc;ng minh hơn.</p>
                
                <p>Rau củ quả mang lại nguồn năng lượng, bổ sung Vitamin gi&uacute;p vật nu&ocirc;i ăn uống ngon miệng hơn. Thật dễ d&agrave;ng để sử dụng. Bạn c&oacute; thể cho c&uacute;n ăn trực tiếp hoặc trộn đều với thức ăn kh&ocirc; theo tỷ lệ t&ugrave;y chỉnh. Sản phẩm nước sốt cho ch&oacute; JERHIGH Chicken and Vegetable in Gravy được đ&oacute;ng t&uacute;i c&oacute; trọng lượng 120g. Thuận tiện cho việc sử dụng, mang theo v&agrave; bảo quản. H&atilde;y lu&ocirc;n chuẩn bị nước uống cho th&uacute; cưng của bạn sau mỗi bữa ăn để đảm bảo sức khỏe tốt nhất.</p>
                
                <h2>Th&agrave;nh phần dinh dưỡng</h2>
                
                <p>Nước sốt cho ch&oacute; vị thịt g&agrave; v&agrave; rau củ JERHIGH Chicken and Vegetable in Gravy l&agrave; loại thức ăn cao cấp. Th&iacute;ch hợp cho tất cả c&aacute;c giống ch&oacute; v&agrave; chứa đầy đủ gi&aacute; trị dinh dưỡng. Sử dụng nguồn nguy&ecirc;n liệu 100% nguy&ecirc;n chất được kiểm định chặt ch&eacute;. Th&agrave;nh phần bao gồm: thịt g&agrave;, bột biến t&iacute;nh, nước, c&agrave; rốt, khoai lang. Chất tạo đ&ocirc;ng Carrageenan, đường, vị gan. Bột m&igrave; tinh, Gluten l&uacute;a m&igrave;, chất xơ thực phẩm, Inulin. Muối v&agrave; chất tạo đ&ocirc;ng Gum. Sẽ thật tuyệt vời khi ch&uacute; ch&oacute; của bạn được thưởng thức thơm ngon của m&oacute;n nước sốt đặc biệt n&agrave;y. Sản phẩm đạt ti&ecirc;u chuẩn chất lượng quốc tế.</p>',
                'product_id' => 1,
            ]
      ];
      DB::table('product_details')->insert($listProductDetails);
      
    }
}
