<?php

use Illuminate\Database\Seeder;

class ServiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_details = [];
        $faker    = Faker\Factory::create('vi_VN');

        $service_details = [
            [
                'service_id' => 1,
                'service_detail_status' => 1,
                'service_detail_image' => 'bao_hiem_suc_khoe_thu_cung.jpg',
                'service_detail_content' => '<h1>Bảo Hiểm Sức Khỏe Th&uacute; Cưng</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/trannam" rel="author" title="Các bài đăng của ChauAnh">ChauAnh</a>&nbsp;|&nbsp;Th6 14, 2018&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a></p>
                
                <p><img alt="" src="http://petcare.test/images/bao_hiem_suc_khoe_thu_cung_1608418416.jpg" style="height:522px; width:842px" /></p>
                
                <p>Ng&agrave;y nay ai cũng thừa nhận th&uacute; cưng l&agrave; th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh, mong muốn ch&uacute;ng được hưởng c&aacute;c quyền lợi về chăm s&oacute;c sức khỏe như con<br />
                người l&agrave; xu hướng trong c&aacute;ch chơi th&uacute; cảnh của nhiều người y&ecirc;u động vật.</p>
                
                <p>Để&nbsp; đ&aacute;p ứng quyền của th&uacute; cưng Pet-Pro cho ra đời dịch vụ mới:&nbsp;<strong>Bảo hiểm sức khỏe th&uacute; cưng</strong>. Với dịch vụ n&agrave;y, Pet-Pro sẽ gi&uacute;p qu&yacute; th&acirc;n chủ</p>
                
                <p>c&oacute; thể k&eacute;o d&agrave;i niềm vui sống c&ugrave;ng ch&uacute;ng v&agrave; mang lại sức khỏe an to&agrave;n cho cả 2.</p>
                
                <p>Theo Hiệp Hội Bảo Vệ Động Vật Thế Giới &ldquo;<strong>The World Society for the Protection of Animals</strong>&rdquo; (WSPA) th&uacute; cưng trong 12 th&aacute;ng đầu đời, muốn</p>
                
                <p>được khỏe mạnh phải tu&acirc;n thủ đầy đủ liệu tr&igrave;nh sau đ&acirc;y:</p>
                
                <ul>
                    <li>3 lần ti&ecirc;m ngừa</li>
                    <li>6 lần tẩy giun</li>
                    <li>3 lần ph&ograve;ng ngoại k&iacute; sinh (ve, bọ ch&eacute;t)</li>
                    <li>Đồng thời t&aacute;i chủng định kỳ h&agrave;ng năm</li>
                </ul>
                
                <p>Được như thế th&igrave; sức khỏe th&uacute; cưng sẽ được bảo vệ 99% khỏi bệnh truyền nhiễm do virus.</p>
                
                <p><strong>Dịch vụ bảo hiểm sức khỏe th&uacute; cưng gồm những g&igrave;?</strong></p>
                
                <p>Nhằm bảo về sức khỏe to&agrave;n diện cho th&uacute; cưng, Th&uacute; Y Pet-Pro đưa ra c&aacute;c g&oacute;i dịch vụ bảo hiểm như sau</p>
                
                <p><strong>G&oacute;i A1: Combo Basic</strong></p>
                
                <p>Mức ph&iacute;: 2.000.000 VNĐ</p>
                
                <p>Thời gian: 1 năm</p>
                
                <p>Quyền lợi</p>
                
                <ul>
                    <li>Được thực hiện 3 lần chủng ngừa, 6 lần tẩy giun, 3 lần ph&ograve;ng ngo&agrave;i k&yacute; sinh.</li>
                    <li>Miễn ph&iacute; x&eacute;t nghiệm sinh l&yacute; m&aacute;u trước khi ch&iacute;ch ngừa v&agrave; khi bị bệnh phải nhập viện.</li>
                    <li>Được giảm 50% viện ph&iacute; khi bị bệnh do virus g&acirc;y ra.</li>
                    <li>Được cấp thẻ VIP, bảo vệ th&uacute; cưng trong 12 th&aacute;ng đối với bệnh do virus.</li>
                    <li>Cam kết phục vụ bạn 24/7 bất cứ khi n&agrave;o bạn cần kể cả chủ nhật, lễ, tết.</li>
                </ul>
                
                <p><strong>G&oacute;i A2: Combo Basic</strong></p>
                
                <p>Mức ph&iacute;: 5.000.000 VNĐ</p>
                
                <p>Thời gian: 5 năm</p>
                
                <p>Quyền lợi:</p>
                
                <ul>
                    <li>Được thực hiện 7 lần chủng ngừa, 16 lần tẩy giun, 15 lần ph&ograve;ng ngo&agrave;i k&yacute; sinh.</li>
                    <li>Miễn ph&iacute; x&eacute;t nghiệm sinh l&yacute; m&aacute;u trước khi ch&iacute;ch ngừa h&agrave;ng năm v&agrave; khi bị bệnh phải nhập viện.</li>
                    <li>Được giảm 75 % viện ph&iacute; khi bị bệnh do virus g&acirc;y ra.</li>
                    <li>Được cấp thẻ VIP, bảo vệ th&uacute; cưng trong 5 năm , đối với bệnh do virus.</li>
                    <li>Cam kết phục vụ bạn 24/7 bất cứ khi n&agrave;o bạn cần kể cả chủ nhật, lễ, tết.</li>
                </ul>
                
                <p><strong>G&oacute;i B1: Combo Luxury</strong></p>
                
                <p>Mức ph&iacute;: 5.500.000 VNĐ</p>
                
                <p>Thời gian: 1 năm</p>
                
                <p>Quyền lợi</p>
                
                <ul>
                    <li>Được thực hiện 3&nbsp; lần chủng ngừa, 6 lần tẩy giun, 3 lần ph&ograve;ng ngo&agrave;i k&yacute; sinh. Với thuốc cao cấp của c&aacute;c thương hiệu nổi tiếng Ch&acirc;u &Acirc;u.</li>
                    <li>Miễn ph&iacute; x&eacute;t nghiệm sinh l&yacute; m&aacute;u, x&eacute;t nghiệm carre, parvo, khi ch&iacute;ch ngừa v&agrave; khi bị bệnh phải nhập viện.</li>
                    <li>Được giảm 100 % viện ph&iacute; khi bị bệnh do virus.</li>
                    <li>Được cấp thẻ VIP, bảo vệ th&uacute; cưng trong 1 năm, đối với bệnh do virus.</li>
                    <li>Cam kết phục vụ bạn 24/7 bất cứ khi n&agrave;o bạn cần kể cả chủ nhật, lễ, tết.</li>
                </ul>
                
                <p><strong>G&oacute;i B2: Combo Luxury</strong></p>
                
                <p>Mức ph&iacute;: 12.000.000 VNĐ</p>
                
                <p>Thời gian: 5 năm</p>
                
                <p>Quyền lợi</p>
                
                <ul>
                    <li>Được thực hiện 7 lần chủng ngừa, 16 lần tẩy giun, 15 lần ph&ograve;ng ngo&agrave;i k&yacute; sinh. Với thuốc cao cấp</li>
                    <li>của c&aacute;c thương hiệu nổi tiếng Ch&acirc;u &Acirc;u.</li>
                    <li>Miễn ph&iacute; x&eacute;t nghiệm sinh l&yacute; m&aacute;u, x&eacute;t nghiệm carre, parvo, trước khi ch&iacute;ch ngừa v&agrave; đo lại kh&aacute;ng thể carre, parvo trước khi ch&iacute;ch ngừa h&agrave;ng năm.</li>
                    <li>Được giảm 100 % viện ph&iacute; khi bị bệnh do virus.</li>
                    <li>Được cấp thẻ VIP, bảo vệ th&uacute; cưng trong 5 năm đối với bệnh do virus.</li>
                    <li>Cam kết phục vụ bạn 24/7 bất cứ khi n&agrave;o bạn cần kể cả chủ nhật, lễ, tết.</li>
                </ul>
                
                <p>Với hơn 20 năm kinh nghiệm trong nghề v&agrave; t&igrave;nh y&ecirc;u d&agrave;nh cho th&uacute; cưng, Th&uacute; Y Pet-Pro mong muốn c&oacute; thể bảo<br />
                vệ tối đa cho th&uacute; cưng nh&agrave; bạn.</p>
                
                <p>H&atilde;y tham gia những g&oacute;i dịch vụ của ch&uacute;ng t&ocirc;i để n&acirc;ng cao sức khỏe th&uacute; cưng, sức khỏe cộng đồng nh&eacute;!</p>
                
                <p>H&atilde;y gọi qua hotline: 0919.919.041 để t&igrave;m hiểu về c&aacute;ch mới bảo vệ cho th&uacute; cưng khỏi b&ecirc;nh truyền nhiễm.</p>'  
            ],
            [
                'service_id' => 2,
                'service_detail_status' => 1,
                'service_detail_image' => 'trong_giu_cho_meo_ngay_tet.jpg',
                'service_detail_content' => '<h1>TR&Ocirc;NG GIỮ CH&Oacute; M&Egrave;O NG&Agrave;Y TẾT TẠI TH&Uacute; Y PETPRO</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/truonglv" rel="author" title="Các bài đăng của truonglv">truonglv</a>&nbsp;|&nbsp;Th1 2, 2018&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a></p>
                
                <p><img alt="" src="http://petcare.test/images/trong_giu_cho_meo_ngay_tet_1608418861.jpg" style="height:350px; width:700px" /></p>
                
                <p><strong>Dịch vụ tr&ocirc;ng giữ ch&oacute; m&egrave;o ng&agrave;y tết tại Th&uacute; Y PetPro</strong>&nbsp;hay lưu tr&uacute; th&uacute; cưng ng&agrave;y tết gi&uacute;p cho gia chủ c&oacute; thể tham gia những chuyến du lịch d&agrave;i ng&agrave;y trong dịp tết sắp tới m&agrave; kh&ocirc;ng phải lo lắng về th&uacute; nu&ocirc;i của m&igrave;nh.</p>
                
                <h2>V&igrave; sao n&ecirc;n gởi ch&oacute; m&egrave;o ng&agrave;y tết tại Th&uacute; Y PetPro</h2>
                
                <p>Trong những ng&agrave;y tết, gia chủ nhiều khi muốn c&oacute; những chuyến du lịch xa d&agrave;i ng&agrave;y m&agrave; kh&ocirc;ng biết những vật nu&ocirc;i m&igrave;nh n&ecirc;n gởi ở đ&acirc;u? Tại Th&uacute; Y PetPro ch&uacute;ng t&ocirc;i c&oacute; hệ thống chuồng trại đủ ti&ecirc;u chuẩn quốc tế để phục vụ nhu cầu của qu&iacute; kh&aacute;ch.</p>
                
                <p style="margin-left:120px"><img alt="" src="http://petcare.test/images/trong_giu_cho_meo_ngay_tet_3_1608419032.jpg" style="height:146px; width:300px" /></p>
                
                <p>Khi th&uacute; cưng được đưa đến Th&uacute; Y PetPro, ch&uacute;ng t&ocirc;i chăm s&oacute;c ho&agrave;n to&agrave;n theo ti&ecirc;u chuẩn quốc tế, c&oacute; b&aacute;c sỹ trực cấp cứu để đề ph&ograve;ng những rủi ro đến với c&aacute;c &ldquo;b&eacute; y&ecirc;u&rdquo; của m&igrave;nh. Đồng thời tại Th&uacute; Y PetPro, ch&uacute;ng t&ocirc;i cũng lu&ocirc;n chăm s&oacute;c, tắm rửa cho những vật nu&ocirc;i sạch sẽ.</p>
                
                <p>Qu&iacute; kh&aacute;ch ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m với hệ thống kh&aacute;ch sạn cho th&uacute; cưng ng&agrave;y tết tại th&uacute; y petpro của ch&uacute;ng t&ocirc;i.</p>
                
                <h2>Thế n&agrave;o l&agrave; một hệ thống kh&aacute;ch sạn lưu tr&uacute; th&uacute; cưng đủ ti&ecirc;u chuẩn?</h2>
                
                <p>Theo tổ qui định của Tổ chức sức khỏe động vật thế giới, một khu lưu tr&uacute; cho th&uacute; cưng phải đạt chuẩn sau:</p>
                
                <ul>
                    <li>C&oacute; hầm chứa ph&acirc;n, chất thải, hầm lắng, hầm ph&acirc;n hủy</li>
                    <li>Hệ thống xử l&yacute; kh&ocirc;ng kh&iacute;</li>
                    <li>Hệ thống xử l&yacute; nước thải theo chu tr&igrave;nh tự động h&oacute;a khử tr&ugrave;ng 30 ph&uacute;t/lần.</li>
                    <li>Kh&iacute; thải trong chuồng được ph&acirc;n ly th&agrave;nh kh&iacute; kh&ocirc;ng độc Nito v&agrave; Oxy, sau đ&oacute; kh&iacute; n&agrave;y được quạt h&uacute;t tự động đưa v&agrave;o đường ống xử l&yacute; trước khi thải ra ngo&agrave;i, trả lại nguồn oxy dồi d&agrave;o trong khu lưu giữ.</li>
                    <li>Nhiệt độ phải được duy tr&igrave; ở mức khoảng 25 độ C nhằm mang lại th&acirc;n nhiệt tốt nhất cho th&uacute; nu&ocirc;i.</li>
                    <li>Độ ẩm phải c&acirc;n bằng</li>
                </ul>
                
                <h2>Bảng gi&aacute; dịch vụ tr&ocirc;ng giữ ch&oacute; m&egrave;o ng&agrave;y tết tại Th&uacute; Y PetPro</h2>
                
                <table border="1" style="width:100%">
                    <tbody>
                        <tr>
                            <td><strong>C&acirc;n nặng</strong></td>
                            <td><strong>Gi&aacute; tiền(VND/Ng&agrave;y)</strong></td>
                            <td><strong>Phụ thu 30%</strong></td>
                        </tr>
                        <tr>
                            <td>&lt; 5kg</td>
                            <td>120.000</td>
                            <td>156.000</td>
                        </tr>
                        <tr>
                            <td>5 &ndash; 9kg</td>
                            <td>170.000</td>
                            <td>221.000</td>
                        </tr>
                        <tr>
                            <td>10 &ndash; 20kg</td>
                            <td>220.000</td>
                            <td>286.000</td>
                        </tr>
                        <tr>
                            <td>&gt; 20kg</td>
                            <td>300.000</td>
                            <td>390.000</td>
                        </tr>
                    </tbody>
                </table>
                
                <p>Nếu qu&iacute; kh&aacute;ch c&oacute; nhu cầu, xin&nbsp;<a href="https://thuypetpro.com.vn/">li&ecirc;n hệ với ch&uacute;ng t&ocirc;i</a>&nbsp;để được phục vụ tốt hơn.</p>'  
            ],
            [
                'service_id' => 3,
                'service_detail_status' => 1,
                'service_detail_image' => 'triet_san_cho_thu_cung.jpg',
                'service_detail_content' => '<h1>Triệt sản cho th&uacute; cưng</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/truonglv" rel="author" title="Các bài đăng của truonglv">truonglv</a>&nbsp;|&nbsp;Th9 12, 2017&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a></p>
                
                <p><img alt="" src="http://petcare.test/images/triet_san_cho_thu_cung_1608419207.jpg" style="height:433px; width:650px" /></p>
                
                <p><strong>Triệt sản cho th&uacute; cưng l&agrave; bảo vệ sức khỏe cho ch&iacute;nh th&uacute; nu&ocirc;i của bạn v&agrave; c&ograve;n g&oacute;p phần l&agrave;m tăng tuổi thọ cho ch&uacute;ng đồng thời l&agrave;m giảm lượng ch&oacute; m&egrave;o v&ocirc; gia cư h&agrave;ng năm.</strong></p>
                
                <p>Rất nhiều người nu&ocirc;i th&uacute; cưng c&ograve;n kh&aacute; e ngại trong việc&nbsp;<strong>triệt sản cho th&uacute; cưng</strong>&nbsp;của m&igrave;nh do sợ ảnh hưởng tới bản năng v&agrave; t&iacute;nh c&aacute;ch của ch&uacute;ng, b&ecirc;n cạnh đ&oacute; c&ograve;n c&oacute; thể nguy hiểm đến<br />
                t&iacute;nh mạng&nbsp; của ch&uacute;ng nếu triệt sản tại nơi kh&ocirc;ng c&oacute; uy t&iacute;n hoặc gặp phải b&aacute;c sỹ th&uacute; y kh&ocirc;ng c&oacute; tay nghề. Ch&iacute;nh v&igrave; vậy, bạn n&ecirc;n t&igrave;m hiểu th&ocirc;ng tin cũng như chuẩn bị cho th&uacute; cưng của m&igrave;nh<br />
                trước khi đưa ch&uacute;ng đi triệt sản một c&aacute;ch cẩn thận.</p>
                
                <h2><strong>Tại sao n&ecirc;n triệt sản cho th&uacute; cưng?</strong></h2>
                
                <p>C&oacute; rất nhiều l&yacute; do để bạn c&oacute; thể đưa th&uacute; cưng của m&igrave;nh đi triệt sản:</p>
                
                <ul>
                    <li><em>Để kh&ocirc;ng thấy những h&agrave;nh vi xấu</em>: th&ocirc;ng thường khi chưa triệt sản, th&uacute; cưng thường c&oacute; những h&agrave;nh vi kh&ocirc;ng tốt như: đ&aacute;nh đấu l&atilde;nh thổ bằng việc đi tiểu lung tung, th&ograve; bộ phận sinh<br />
                    dục ra ngo&agrave;i (đối với giống đực)&hellip;Ri&ecirc;ng đối với m&egrave;o đực trong m&ugrave;a giao phối hay k&ecirc;u gọi tụ tập nhiều con m&egrave;o kh&aacute;c đến để rượt đuổi, cắn nhau g&acirc;y ồn &agrave;o l&agrave;m bạn mất ngủ.</li>
                    <li><em>Kh&ocirc;ng l&agrave;m mất vệ sinh</em>: ch&oacute; c&aacute;i kh&ocirc;ng triệt sản sẽ h&agrave;nh kinh k&eacute;o d&agrave;i 21 ng&agrave;y, khi ch&uacute;ng di chuyển sẽ g&acirc;y mất vệ sinh do d&iacute;nh m&aacute;u khắp nh&agrave;, thảm nệm hoặc ghế sopha&hellip;</li>
                    <li><em>Hạn chế sự suy tho&aacute;i giống n&ograve;i</em>: M&egrave;o c&aacute;i thường sinh sản rất nhanh, cứ 2 th&aacute;ng lại l&ecirc;n giống. Trung b&igrave;nh 1 năm sẽ đẻ 6 lần, mỗi lần khoảng 3 &ndash; 4 con. Số m&egrave;o con về sau sẽ c&ograve;i cọc,<br />
                    suy dinh dưỡng do m&egrave;o mẹ chưa kịp phục hồi sức khỏe sau những lần sinh trước hoặc m&egrave;o con bị dị tật do tạp giao (giao phối cận huyết). Ch&iacute;nh điều n&agrave;y tạo ra thế hệ m&egrave;o con kh&ocirc;ng<br />
                    khỏe mạnh n&ecirc;n thường bị người chủ bỏ rơi.</li>
                    <li><em>Kh&ocirc;ng bị c&aacute;c bệnh hiểm ngh&egrave;o</em>: Ngo&agrave;i những rắc rối được kể tr&ecirc;n th&igrave; việc kh&ocirc;ng triệt sản cho th&uacute; cưng c&ograve;n g&acirc;y ra một số bệnh như: rối loạn nội tiết, vi&ecirc;m da, vi&ecirc;m tử cung, tiểu đường,<br />
                    triễn dưỡng tiền liệt tuyết, suy dinh dưỡng co giật sốt sữa do mang thai nhiều lần.</li>
                    <li><em>Kh&ocirc;ng ảnh hưởng đến sức khỏe gia đ&igrave;nh bạn</em>: Nếu kh&ocirc;ng triệt sản, th&uacute; cưng sẽ c&oacute; c&aacute;c h&agrave;nh vi xấu, l&agrave;m mất vệ sinh l&agrave;m tăng khả năng l&acirc;y lan c&aacute;c bệnh truyền nhiễm g&acirc;y ảnh hưởng<br />
                    đến sức khỏe của c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh.</li>
                    <li>Ngo&agrave;i ra việc&nbsp;<em>triệt sản cho th&uacute; cưng</em>&nbsp;c&ograve;n đ&oacute;ng g&oacute;p lớn trong việc hạn chế số lượng ch&oacute; m&egrave;o v&ocirc; gia cư mỗi năm do bị người chủ bỏ rơi.</li>
                </ul>
                
                <p style="margin-left:200px"><img alt="" src="http://petcare.test/images/triet_san_cho_thu_cung_2_1608419256.jpg" style="height:200px; width:300px" /></p>
                
                <p>Ngo&agrave;i ra khi triệt sản cho th&uacute; cưng, bạn sẽ nhận lại được nhiều lợi &iacute;ch kh&ocirc;ng những cho ch&iacute;nh th&uacute; cưng của bạn m&agrave; cho cả gia đ&igrave;nh của bạn.</p>
                
                <h2><strong>Một số lợi &iacute;ch khi th&uacute; cưng được triệt sản.</strong></h2>
                
                <ul>
                    <li>Th&uacute; cưng kh&ocirc;ng c&ograve;n c&oacute; c&aacute;c h&agrave;nh vi xấu như trước.</li>
                    <li>Kh&ocirc;ng mắc c&aacute;c bệnh hiểm ngh&egrave;o, khỏe mạnh hơn c&aacute;c th&uacute; cưng kh&aacute;c chưa được triệt sản.</li>
                    <li>Tuối thọ c&oacute; thể k&eacute;o d&agrave;i th&ecirc;m khoảng 3 &ndash; 7 năm.</li>
                    <li>Kh&ocirc;ng tạo ra thế hệ con k&eacute;m chất lượng do cận huyết, suy dinh dưỡng.</li>
                    <li>Kh&ocirc;ng mắc c&aacute;c bệnh truyền nhiễm l&acirc;y qua đường sinh dục.</li>
                </ul>
                
                <h2><strong>Vậy th&uacute; cưng n&ecirc;n triệt sản ở độ tuổi n&agrave;o?</strong></h2>
                
                <p>T&ugrave;y v&agrave;o giới t&iacute;nh m&agrave; độ tuổi triệt sản của th&uacute; cưng cũng kh&aacute;c nhau.</p>
                
                <p>Đối với ch&oacute; v&agrave; m&egrave;o c&aacute;i th&igrave; thường 6 th&aacute;ng tuổi trở l&ecirc;n th&igrave; bạn n&ecirc;n cho đi triệt sản v&igrave; l&uacute;c n&agrave;y buồng trứng của ch&uacute;ng mới xuất hiện v&agrave; ph&aacute;t triển.</p>
                
                <p>Đối với m&egrave;o đực v&agrave; một số loại ch&oacute; th&igrave; 2 th&aacute;ng tuổi l&agrave; độ tuổi an to&agrave;n m&agrave; bạn c&oacute; thể triệt sản cho ch&uacute;ng rồi.</p>
                
                <p>Ngo&agrave;i ra, bạn c&oacute; thể&nbsp;<em>triệt sản cho th&uacute; cưng</em>&nbsp;sau khi l&ecirc;n giống lần đầu kết th&uacute;c 7 ng&agrave;y. Tuy nhi&ecirc;n, bạn n&ecirc;n triệt sản cho th&uacute; cưng trước khi sinh lần đầu ti&ecirc;n sẽ gi&uacute;p ch&uacute;ng khỏe mạnh hơn.</p>
                
                <p>Để đảm bảo an to&agrave;n cho th&uacute; cưng, bạn c&oacute; thể tham khảo &yacute; kiến của b&aacute;c sĩ th&uacute; y để chọn được thời điểm triệt sản tốt nhất cho th&uacute; cưng của m&igrave;nh.</p>
                
                <p>Khi đ&atilde; x&aacute;c định triệt sản cho th&uacute; cưng, bạn n&ecirc;n chuẩn bị cho ch&uacute;ng kĩ c&agrave;ng để c&oacute; thể đảm bảo sức khỏe trong qu&aacute; tr&igrave;nh triệt sản.</p>
                
                <h2><strong>Vậy cần l&agrave;m g&igrave; trước khi triệt sản cho th&uacute; cưng?</strong></h2>
                
                <ul>
                    <li>Cần tắm rửa sạch sẽ bằng x&agrave; b&ocirc;ng diệt khuẩn chuy&ecirc;n d&ugrave;ng cho th&uacute; cưng.</li>
                    <li>Cần nhịn ăn 6 tiếng trước khi b&aacute;c sĩ ch&iacute;ch thuốc m&ecirc;.</li>
                    <li>Cần phải được ch&iacute;ch ngừa, tẩy giun, x&eacute;t nghiệm m&aacute;u để chắc chắn th&uacute; cưng kh&ocirc;ng bị vi&ecirc;m da hay mắc c&aacute;c bệnh truyền nhiễm.</li>
                    <li>Đối với trường hợp triệt sản th&uacute; cưng giống c&aacute;i: chỉ n&ecirc;n mang th&uacute; cưng đến c&aacute;c bệnh viện th&uacute; y lớn c&oacute; đầy đủ trang thiết bị, c&oacute; ph&ograve;ng mổ v&ocirc; tr&ugrave;ng, c&oacute; b&aacute;c sĩ chuy&ecirc;n phẫu thuật phần<br />
                    mềm thực hiện&hellip;sẽ hạn chế được c&aacute;c trường hợp nhiễm tr&ugrave;ng, bung chỉ l&ograve;i ruột, vết thương k&iacute;ch ứng vi&ecirc;m nhiễm, nặng hơn do nhiễm tr&ugrave;ng ph&uacute;c mạc sau phẫu thuật.</li>
                    <li>Nếu th&uacute; cưng đang trong giai đoạn h&agrave;nh kinh th&igrave; n&ecirc;n để hết giai đoạn n&agrave;y sau 7 ng&agrave;y mới mang đi triệt sản sẽ hạn chế sự chảy m&aacute;u do buồng trứng, tử cung đang sung huyết, giảm<br />
                    lượng thuốc m&ecirc; đưa v&agrave;o do thần kinh đang trong giai đoạn l&ecirc;n giống rất hưng phấn n&ecirc;n kh&oacute; an thần, ngủ s&acirc;u. Những trường hợp n&agrave;y b&aacute;c sĩ thường d&ugrave;ng liều thuốc m&ecirc; gấp đ&ocirc;i sẽ g&acirc;y<br />
                    những ảnh hưởng kh&ocirc;ng tốt về sau đối với th&uacute; cưng.</li>
                </ul>
                
                <p>B&ecirc;n cạnh việc chuẩn bị cho th&uacute; cưng trước khi triệt sản th&igrave; việc chăm s&oacute;c th&uacute; cưng sau khi triệt sản cũng rất quan trọng.</p>
                
                <h2><strong>Những điều cần l&agrave;m sau phẫu thuật triệt sản cho th&uacute; cưng.</strong></h2>
                
                <ul>
                    <li>Kh&ocirc;ng cho th&uacute; cưng ăn ngay sau khi phẫu thuật. &Iacute;t nhất sau 6 giờ để chờ cho dạ d&agrave;y hoạt động lại v&agrave; cơ thể b&agrave;i thải hết thuốc m&ecirc; th&igrave; mới cho ăn v&agrave; chỉ được uống nước đường hay<br />
                    truyền dịch th&ocirc;i nh&eacute;.</li>
                    <li>Kh&ocirc;ng cho ăn qu&aacute; no v&agrave; hạn chế c&aacute;c thức ăn g&acirc;y k&iacute;ch ứng như c&aacute; biển, thịt g&agrave;, thịt b&ograve;&hellip;</li>
                    <li>N&ecirc;n đeo v&ograve;ng chống liếm Elizabeth cho ch&oacute; sau phẫu thuật cho đến ng&agrave;y cắt chỉ.</li>
                    <li>Cần phải đi t&aacute;i kh&aacute;m để vệ sinh vết thương, ch&iacute;ch thuốc trong 4 &ndash; 7 ng&agrave;y cho đến khi l&agrave;nh hẳn.</li>
                    <li>Nếu c&oacute; dấu hiệu bất thường n&agrave;o sau khi phẫu thuật th&igrave; n&ecirc;n đưa ngay đến bệnh viện th&uacute; y để được xử l&yacute; kịp thời, tr&aacute;nh g&acirc;y ảnh hưởng đến t&iacute;nh mạng của th&uacute; cưng.</li>
                </ul>
                
                <p>Việc&nbsp;<strong>triệt sản cho th&uacute; cưng</strong>&nbsp;l&agrave; một việc cần thiết bạn n&ecirc;n l&agrave;m để c&oacute; thể tạo m&ocirc;i trường thuận lợi nhất cho ch&uacute;ng đồng thời c&ograve;n gi&uacute;p bảo vệ sức khỏe, k&eacute;o d&agrave;i tuổi thọ của ch&uacute;ng.&nbsp; Ch&uacute;c c&aacute;c bạn<br />
                th&agrave;nh c&ocirc;ng trong việc chăm s&oacute;c v&agrave; nu&ocirc;i dạy th&uacute; cưng của m&igrave;nh. Nếu c&aacute;c bạn c&oacute; thắc mắc cần được tư vấn th&igrave; h&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i nh&eacute;!</p>
                
                <p>Nếu bạn cần triệt sản cho th&uacute; cưng của m&igrave;nh, h&atilde;y li&ecirc;n hệ ngay chi nh&aacute;nh của Th&uacute; Y PetPro gần nhất.</p>'  
            ],
            [
                'service_id' => 4,
                'service_detail_status' => 1,
                'service_detail_image' => 'chich_ngua_thu_cung.jpg',
                'service_detail_content' => '<p><strong>Ch&iacute;ch ngừa cho th&uacute; cưng l&agrave; một giải ph&aacute;p gi&uacute;p bạn bảo vệ sức khỏe cho vật nu&ocirc;i của m&igrave;nh tr&aacute;nh khỏi c&aacute;c bệnh nguy hiểm đồng thời cũng c&oacute; thể gi&uacute;p bảo vệ sức khỏe của gia đ&igrave;nh bạn.</strong></p>

                <p><strong><img alt="" src="http://petcare.test/images/chich_ngua_thu_cung_1608419644.jpg" style="height:530px; width:730px" /></strong></p>
                
                <p>Trong những năm gần đ&acirc;y tại c&aacute;c th&agrave;nh phố lớn cũng như ở c&aacute;c v&ugrave;ng n&ocirc;ng th&ocirc;n tại Việt Nam, việc nu&ocirc;i th&uacute; cưng trở n&ecirc;n kh&aacute; phổ biến. Tuy nhi&ecirc;n việc chăm s&oacute;c cũng<br />
                kh&ocirc;ng hề dễ d&agrave;ng bởi v&igrave; ch&uacute;ng &nbsp;rất nhạy cảm với thời tiết v&agrave; m&ocirc;i trường xung quanh, chỉ cần một v&agrave;i thay đổi cũng khiến ch&uacute;ng bị bệnh. V&igrave; vậy, việc&nbsp;<strong>ch&iacute;ch ngừa th&uacute;<br />
                cưng</strong>&nbsp;l&agrave; việc cần thiết. Bạn n&ecirc;n ch&iacute;ch ngừa th&uacute; cưng&nbsp;trong qu&aacute; tr&igrave;nh nu&ocirc;i để c&oacute; thể tăng cường sức đề kh&aacute;n cho ch&uacute;ng. Đồng thời n&acirc;ng cao khả năng chống chọi bệnh<br />
                tật cho th&uacute; cưng đồng thời c&ograve;n gi&aacute;n tiếp bảo vệ được sức khỏe gia đ&igrave;nh bạn.</p>
                
                <h2><strong>Vậy tại sao phải ch&iacute;ch ngừa th&uacute; cưng?</strong></h2>
                
                <p>Cũng giống như trẻ nhỏ, th&uacute; cưng cần phải cho tiếp x&uacute;c với c&aacute;c mầm bệnh để cơ thể c&oacute; thể tạo ra sức đề kh&aacute;ng&nbsp; v&agrave; hệ thống miễn dịch với c&aacute;c loại bệnh truyền nhiễm,<br />
                bệnh nguy hiểm.</p>
                
                <p>Nhờ vậy, khi gặp phải những bệnh nguy hiểm trong cuộc đời th&igrave; cơ thể ch&uacute;ng c&oacute; thể vượt qua được dễ d&agrave;ng hơn, tr&aacute;nh g&acirc;y nguy hiểm đến t&iacute;nh mạng.</p>
                
                <p><img alt="" src="http://petcare.test/images/chich_ngua_thu_cungchich_ngua_thu_cung_1608419549.jpg" style="height:399px; width:600px" /></p>
                
                <h2><strong>Th&uacute; cưng ở độ tuổi n&agrave;o th&igrave; ch&iacute;ch ngừa tốt nhất?</strong></h2>
                
                <p>Để ch&iacute;ch ngừa vaccin đạt hiệu quả cao nhất th&igrave; bạn n&ecirc;n ch&iacute;ch cho ch&oacute; con lần đầu ti&ecirc;n v&agrave;o l&uacute;c ch&uacute;ng được 6 tuần tuổi, lần thứ 2 v&agrave;o l&uacute;c 10 tuần tuổi v&agrave; lần thứ 3 v&agrave;o<br />
                l&uacute;c 14 tuần tuổi. V&igrave; đ&acirc;y l&agrave; thời điểm m&agrave; sức đề kh&aacute;ng của ch&uacute;ng yếu nhất n&ecirc;n bạn phải cho th&uacute; cưng đi ch&iacute;ch ngừa thừa xuy&ecirc;n để n&acirc;ng cao khả năng chống chọi bệnh tật.</p>
                
                <p>Sau giai đoạn đ&oacute;, bạn n&ecirc;n cho&nbsp;<em>ch&iacute;ch ngừa cho th&uacute; cưng</em>&nbsp;mỗi năm một lần (nhắc lại định kỳ h&agrave;ng năm) để c&oacute; thể duy tr&igrave; sức khỏe của ch&uacute;ng ở mức tốt nhất.</p>
                
                <p>T&ugrave;y v&agrave;o mỗi độ tuổi của th&uacute; cưng m&agrave; lựa chọn loại vaccin ph&ugrave; hợp với ch&uacute;ng.</p>
                
                <h2><strong>Loại vaccin n&agrave;o l&agrave; tốt cho th&uacute; cưng?</strong></h2>
                
                <p>Vaccin cho th&uacute; cưng tại Việt Nam đa phần l&agrave; h&agrave;ng ngoại nhập n&ecirc;n chất lượng được đảm bảo. Tr&ecirc;n thị trường c&oacute; rất nhiều loại vaccin d&agrave;nh cho th&uacute; cưng như: vaccin 5 bệnh,<br />
                vaccin 6 bệnh, vaccin 7 bệnh v&agrave; vaccin dại..</p>
                
                <p>Điều quan trọng l&agrave; chủ nu&ocirc;i phải căn cứ v&agrave;o độ tuổi của ch&oacute;/m&egrave;o để lựa chọn loại vaccin cho ph&ugrave; hợp.</p>
                
                <p>V&iacute; dụ:</p>
                
                <ul>
                    <li>Nếu ch&iacute;ch lần đầu th&igrave; n&ecirc;n chọn vaccin đơn giản ph&ograve;ng được 1 &ndash; 2 bệnh.</li>
                    <li>Ch&iacute;ch lần 2 th&igrave; n&ecirc;n chọn loại ph&ograve;ng được nhiều bệnh hơn: 5 &ndash; 6 bệnh.</li>
                    <li>Ch&iacute;ch lần 3 chọn vaccin ph&ograve;ng được 7 &ndash; 8 bệnh v&agrave; chủng ngừa dại.</li>
                </ul>
                
                <p>Lưu &yacute;: ch&iacute;ch chủng ngừa dại v&agrave;o l&uacute;c t&aacute;i chủng lần 3 sẽ an to&agrave;n nhất.</p>
                
                <p>Bạn phải c&oacute; sự chuẩn bị kỹ c&agrave;ng cho th&uacute; cưng của m&igrave;nh trước khi ch&iacute;ch ngừa cho ch&uacute;ng.</p>
                
                <h2><strong>Những điều cần lưu &yacute; trước khi ch&iacute;ch ngừa th&uacute; cưng</strong>.</h2>
                
                <ul>
                    <li>Bạn n&ecirc;n tẩy giun s&aacute;n cho th&uacute; cưng trước khi ch&uacute;ng được ch&iacute;ch ngừa.</li>
                    <li>Cần x&eacute;t nghiệm m&aacute;u trước khi ch&iacute;ch để đ&aacute;nh gi&aacute; được t&igrave;nh trạng sức khỏe, đảm bảo th&uacute; cưng vượt qua được &ldquo;thử th&aacute;ch đầu đời&rdquo;, b&ecirc;n cạnh đ&oacute; c&ograve;n hạn chế t&igrave;nh trạng<br />
                    shock phản vệ sau chủng ngừa.</li>
                    <li>Trước khi chủng ngừa n&ecirc;n tắm sạch cho th&uacute; cưng bởi v&igrave; sau khi ch&iacute;ch vaccin th&igrave; th&uacute; cưng c&oacute; biểu hiện sốt, &oacute;i v&agrave; bỏ ăn n&ecirc;n b&aacute;c sĩ kh&ocirc;ng cho tắm trong thời gian n&agrave;y.</li>
                    <li>N&ecirc;n lựa chọn c&aacute;c bệnh viện th&uacute; y uy t&iacute;n, c&oacute; hồ sơ kh&aacute;m chữa bệnh cho th&uacute; cưng lưu suốt đời để chăm s&oacute;c theo d&otilde;i sức khỏe của th&uacute; cưng ngay từ buổi đầu.</li>
                    <li>N&ecirc;n đi ch&iacute;ch ngừa v&agrave;o buổi s&aacute;ng v&agrave; lu&ocirc;n y&ecirc;u cầu cấp sổ sức khỏe cho th&uacute; cưng để theo d&otilde;i v&agrave; cần li&ecirc;n lạc khi c&oacute; dấu hiệu bất thường xảy ra với th&uacute; cưng sau khi ch&iacute;ch.</li>
                </ul>
                
                <p>Ngo&agrave;i ra, việc theo d&otilde;i v&agrave; chăm s&oacute;c sức khỏe cho th&uacute; cưng sau khi ch&iacute;ch cũng rất quan trọng.</p>
                
                <h2><strong>Những điều cần l&agrave;m cho th&uacute; cưng sau khi ch&iacute;ch ngừa.</strong></h2>
                
                <ul>
                    <li>Cần cho th&uacute; cưng c&aacute;ch ly nghỉ ngơi, ăn thức ăn nhẹ v&agrave; đặc biệt kh&ocirc;ng được tắm trong thời gian n&agrave;y.</li>
                    <li>Trong v&ograve;ng 14 ng&agrave;y sau khi ch&iacute;ch th&igrave; kh&ocirc;ng n&ecirc;n d&ugrave;ng c&aacute;c loại thuốc kh&aacute;ng sinh, kh&aacute;ng vi&ecirc;m cho ch&uacute;ng.</li>
                    <li>Kh&ocirc;ng cho tiếp x&uacute;c với th&uacute; bệnh v&igrave; vẫn c&oacute; khả năng l&acirc;y lan do kh&aacute;ng thể chưa tạo ra đủ để bảo vệ ch&uacute;ng trong 2 tuần sau khi ch&iacute;ch.</li>
                    <li>Nếu thấy th&uacute; cưng c&oacute; dấu hiệu bất thường, n&ecirc;n li&ecirc;n lạc với bệnh viện th&uacute; y để được xử l&yacute; kịp thời, tr&aacute;nh ảnh hưởng tới t&iacute;nh mạng của ch&uacute;ng.</li>
                </ul>
                
                <p>C&aacute;c bạn thấy đấy, việc&nbsp;<strong>ch&iacute;ch ngừa th&uacute; cưng</strong>&nbsp;l&agrave; một việc rất cần thiết v&agrave; việc chăm s&oacute;c ch&uacute;ng trước, trong v&agrave; sau thời gian ti&ecirc;m chủng cũng rất quan trọng, kh&ocirc;ng những đảm bảo<br />
                được sức khỏe của th&uacute; cưng m&agrave; c&ograve;n bảo vệ được gia đ&igrave;nh bạn tr&aacute;nh khỏi c&aacute;c t&aacute;c nh&acirc;n g&acirc;y bệnh nguy hiểm. H&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i nếu bạn cần tư vấn th&ecirc;m về vấn đề n&agrave;y nh&eacute;.</p>
                
                <p style="margin-left:40px"><img alt="" src="http://petcare.test/images/chich_ngua_thu_cungchich_ngua_thu_cung_2_1608419579.jpg" style="height:183px; width:275px" /><img alt="" src="http://petcare.test/images/chich_ngua_thu_cungchich_ngua_thu_cung_3_1608419615.jpg" style="height:152px; width:300px" /></p>
                
                <p>Tại Th&uacute; Y PetPro ch&uacute;ng t&ocirc;i thực hiện tất cả những dịch vụ ch&iacute;ch ngừa th&uacute; cưng để qu&iacute; kh&aacute;ch c&oacute; thể y&ecirc;n t&acirc;m.</p>'  
            ],
            [
                'service_id' => 5,
                'service_detail_status' => 1,
                'service_detail_image' => 'tri_chung_hoi_mieng_tren_cho.jpg',
                'service_detail_content' => 'Chứng hôi miệng trên chó không chỉ làm ảnh hưởng tới cuộc sống của thú cưng. Nó còn gây ra nhiều tác động tiêu cực đối với sức khỏe của chúng.'  
            ],
            [
                'service_id' => 6,
                'service_detail_status' => 1,
                'service_detail_image' => 'spa_grooming_dich_vu_lam_dep_cho_thu_cung.jpg',
                'service_detail_content' => '<h1>Chứng h&ocirc;i miệng tr&ecirc;n ch&oacute;</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/dungnguyen" rel="author" title="Các bài đăng của dungnguyen">dungnguyen</a>&nbsp;|&nbsp;Th9 15, 2017&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a></p>
                
                <p><img alt="" src="http://petcare.test/images/chung-hoi-mieng-tren-cho-2_1608419943.png" style="height:400px; width:600px" /></p>
                
                <p><strong>Chứng h&ocirc;i miệng tr&ecirc;n ch&oacute; kh&ocirc;ng chỉ l&agrave;m ảnh hưởng tới cuộc sống của th&uacute; cưng. N&oacute; c&ograve;n g&acirc;y ra nhiều t&aacute;c động ti&ecirc;u cực đối với sức khỏe của ch&uacute;ng.</strong></p>
                
                <p>Một trong những bệnh l&yacute; m&agrave; chủ nu&ocirc;i thường gặp tr&ecirc;n ch&oacute; l&agrave; chứng h&ocirc;i miệng. C&oacute; nhiều nguy&ecirc;n nh&acirc;n g&acirc;y ra bệnh n&agrave;y, trong đ&oacute; vi&ecirc;m nướu do vi khuẩn l&agrave; nguy&ecirc;n nh&acirc;n chủ yếu. Đa số c&aacute;c giống<br />
                ch&oacute; c&oacute; k&iacute;ch cỡ nhỏ v&agrave; đầu ngắn (ch&oacute; Pug, ch&oacute; Bắc Kinh&hellip;) dễ bị mắc chứng h&ocirc;i miệng hơn hẳn c&aacute;c giống ch&oacute; lớn.&nbsp;<strong>Chứng h&ocirc;i miệng tr&ecirc;n ch&oacute;</strong>&nbsp;l&agrave;m ảnh hưởng xấu đến sức khỏe của ch&uacute;ng đồng<br />
                thời cũng g&acirc;y kh&oacute; khăn cho qu&aacute; tr&igrave;nh giao tiếp giữa chủ nu&ocirc;i v&agrave; ch&oacute;.</p>
                
                <p><img alt="" src="http://petcare.test/images/chung-hoi-mieng-tren-cho-3_1608419979.png" style="height:500px; width:600px" /></p>
                
                <h2><strong>Nguy&ecirc;n nh&acirc;n g&acirc;y ra chứng h&ocirc;i miệng tr&ecirc;n ch&oacute;.</strong></h2>
                
                <p>Một con ch&oacute; khỏe mạnh thường c&oacute; h&agrave;m răng trắng v&agrave; hơi thở thơm tho.</p>
                
                <p>Nếu ch&oacute; c&oacute; h&agrave;m răng bị v&agrave;ng hoặc hơi thở c&oacute; m&ugrave;i kh&oacute; chịu th&igrave; bạn n&ecirc;n để &yacute; quan s&aacute;t bởi v&igrave; l&uacute;c n&agrave;y ch&oacute; của bạn c&oacute; thể gặp phải một trong c&aacute;c vấn đề sau:</p>
                
                <ul>
                    <li>Răng vĩnh viễn bị răng sữa ch&egrave;n &eacute;p l&agrave;m 2 răng bị ảnh hưởng dẫn đến hoại tử gốc răng do mạch m&aacute;u bị ch&egrave;n &eacute;p kh&ocirc;ng đến nu&ocirc;i răng được ( hay gặp tr&ecirc;n ch&oacute; non khi răng sữa chưa g&atilde;y<br />
                    m&agrave; răng vĩnh viễn đ&atilde; mọc) .</li>
                    <li>Răng bị sai khớp: Tức răng của 2 h&agrave;m tr&ecirc;n v&agrave; dưới c&agrave;i kh&iacute;t v&agrave;o nhau l&agrave;m răng bị c&agrave;i chặt mỗi khi đ&oacute;ng khớp g&acirc;y đau đớn hay răng h&agrave;m dưới cắm s&acirc;u v&agrave;o nướu của h&agrave;m tr&ecirc;n tạo 1 lỗ d&ograve;<br />
                    g&acirc;y vi&ecirc;m xương m&aacute;.</li>
                    <li>Răng bị nha chu b&aacute;m d&agrave;y g&acirc;y vi&ecirc;m nướu dần dần dẫn đến vi&ecirc;m ch&acirc;n răng, tụt gốc răng.</li>
                    <li>Ch&oacute; bị c&aacute;c bệnh nội khoa: vi&ecirc;m gan, thận, tuỵ, dạ d&agrave;y cũng l&agrave;m cho hơi thở h&ocirc;i v&agrave; răng bị chuyển m&agrave;u v&agrave;ng.</li>
                </ul>
                
                <p><img alt="chung hoi mieng tren cho" src="http://petcare.test/images/chung-hoi-mieng-tren-cho-1_1608419997.png" style="height:250px; width:280px" /></p>
                
                <h3><strong>L&agrave;m g&igrave; khi ch&oacute; bị h&ocirc;i miệng?</strong></h3>
                
                <p>Khi ph&aacute;t hiện ch&oacute; bị h&ocirc;i miệng, bạn n&ecirc;n mang ch&oacute; đi kh&aacute;m tại c&aacute;c bệnh viện th&uacute; y lớn c&oacute; ph&ograve;ng răng cho ch&oacute; để chữa trị.</p>
                
                <p>C&aacute;c b&aacute;c sĩ sẽ thăm kh&aacute;m v&agrave; t&ugrave;y v&agrave;o t&igrave;nh trạng bệnh, họ sẽ đưa ra c&aacute;c biện ph&aacute;p chữa trị ph&ugrave; hợp cho ch&uacute; ch&oacute; của bạn, c&oacute; thể l&agrave;:</p>
                
                <ul>
                    <li>Nhổ răng sữa đối với trường hợp mọc ch&egrave;n răng.</li>
                    <li>Cắt, nhổ răng sai khớp.</li>
                    <li>Cạo nha chu, nhổ răng đ&atilde; tụt nướu.</li>
                    <li>L&agrave;m x&eacute;t nghiệm tầm so&aacute;t bệnh nội khoa.</li>
                </ul>
                
                <h2><strong>Những điều n&ecirc;n l&agrave;m để hạn chế được chứng h&ocirc;i miệng tr&ecirc;n ch&oacute;.</strong></h2>
                
                <p>Để c&oacute; thể ph&ograve;ng bệnh cũng như hạn chế việc xuất hiện chứng h&ocirc;i miệng tr&ecirc;n ch&oacute; th&igrave; bạn n&ecirc;n chủ động thực hiện những việc sau đ&acirc;y:</p>
                
                <ul>
                    <li>N&ecirc;n cho ch&oacute; đi kh&aacute;m b&aacute;c sĩ v&agrave;o th&aacute;ng thứ 4 khi răng vĩnh viễn của ch&uacute;ng đ&atilde; mọc đầy đủ để c&oacute; thể ph&aacute;t hiện sớm hiện tượng răng sữa ch&egrave;n &eacute;p răng vĩnh viễn. N&ecirc;n nhổ bỏ răng<br />
                    sữa trong trường hợp n&agrave;y c&agrave;ng sớm c&agrave;ng tốt.</li>
                    <li>N&ecirc;n đưa ch&oacute; đi kiểm tra khớp h&agrave;m nếu thấy ch&uacute;ng c&oacute; dấu hiệu đau khi nhai, cắn v&igrave; c&oacute; thể h&agrave;m răng của ch&uacute;ng bị sai khớp. Đối với trường hợp n&agrave;y th&igrave; n&ecirc;n nhổ hoặc cắt bớt răng.</li>
                    <li>N&ecirc;n đi thử m&aacute;u khi thấy răng ch&oacute; chuyển sang m&agrave;u v&agrave;ng để tầm so&aacute;t bệnh nội khoa tiềm ẩn.</li>
                    <li>N&ecirc;n cho ch&oacute; gi&agrave; (tr&ecirc;n 6 tuổi) đi cạo nha chu 6 th&aacute;ng một lần.</li>
                    <li>N&ecirc;n sử dụng b&agrave;n chải chuy&ecirc;n dụng v&agrave; kem đ&aacute;nh răng kh&ocirc;ng chứa flour c&oacute; thể nuốt được d&agrave;nh ri&ecirc;ng cho ch&oacute;/m&egrave;o để đ&aacute;nh răng thường xuy&ecirc;n cho ch&uacute;ng.</li>
                    <li>N&ecirc;n thường xuy&ecirc;n cho ch&oacute; nhai xương giả: vừa gi&uacute;p răng trắng đồng thời ngăn mảng b&aacute;m, giảm stress v&agrave; hiện tượng cắn ph&aacute; đồ đạc, gi&agrave;y d&eacute;p.</li>
                    <li>N&ecirc;n cho ch&oacute; ăn thức ăn ph&ugrave; hợp (c&oacute; thể tham khảo &yacute; kiến của b&aacute;c sĩ th&uacute; y).</li>
                    <li>N&ecirc;n đưa ch&oacute; đi kh&aacute;m răng định k&igrave; thường xuy&ecirc;n khoảng 6 &ndash; 12 th&aacute;ng.</li>
                </ul>
                
                <p><img alt="chung hoi mieng tren cho" src="http://petcare.test/images/chung-hoi-mieng-tren-cho-4_1608420013.png" style="height:500px; width:600px" /></p>
                
                <p><strong>Chứng h&ocirc;i miệng tr&ecirc;n ch&oacute;</strong>&nbsp;g&acirc;y ảnh hưởng rất nhiều đến bạn v&agrave; cuộc sống của ch&uacute;ng v&igrave; vậy việc bảo vệ răng miệng cho ch&oacute; l&agrave; một việc rất cần thiết m&agrave; bạn cần l&agrave;m cho ch&uacute;ng. H&atilde;y<br />
                lu&ocirc;n quan t&acirc;m tới ch&uacute; ch&oacute; của bạn để c&oacute; thể chăm s&oacute;c v&agrave; bảo vệ ch&uacute;ng tốt nhất nh&eacute;.</p>
                
                <p>Bạn h&atilde;y đến những cơ sở Th&uacute; y Petpro gần nhất nếu muốn tư vấn hoặc thăm kh&aacute;m về chứng h&ocirc;i miệng tr&ecirc;n ch&oacute; của bạn nh&eacute;!</p>'  
            ],
            [
                'service_id' => 7,
                'service_detail_status' => 1,
                'service_detail_image' => 'khach_san_cho_thu_cung.jpg',
                'service_detail_content' => '<h1>Spa Grooming &ndash; Dịch Vụ L&agrave;m Đẹp Cho Th&uacute; Cưng</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/hiep" rel="author" title="Các bài đăng của hiep">hiep</a>&nbsp;|&nbsp;Th2 24, 2017&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a>,&nbsp;<a href="https://thuypetpro.com.vn/lam-dep" rel="category tag">L&agrave;m Đẹp</a>&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/lam-dep/spa-grooming-dich-vu-lam-dep-cho-thu-cung.html#respond">0 Lời b&igrave;nh</a></p>
                
                <p><img alt="Spa Grooming – Dịch Vụ Làm Đẹp Cho Thú Cưng" src="http://petcare.test/images/A-BAO-ĐỔI-MÀU-ÁO-903x675_1608420209.jpg" style="height:675px; width:903px" /></p>
                
                <p><strong>Spa Grooming</strong>&nbsp;l&agrave; dịch vụ chăm s&oacute;c sắc đẹp th&uacute; cưng cực kỳ nổi tiếng. N&oacute; l&agrave;m cho th&uacute; của bạn trở n&ecirc;n đẹp hơn, thoải m&aacute;i v&agrave; khỏe mạnh hơn.</p>
                
                <p><img alt="Spa Grooming" src="http://petcare.test/images/spa-grooming-cho-vat-nuoi_1608420223.png" style="height:517px; width:523px" /></p>
                
                <p>Hai th&aacute;ng một lần bạn n&ecirc;n cho th&uacute; cưng sử dụng dịch vụ Spa Grooming</p>
                
                <h2>Spa Grooming l&agrave; g&igrave;</h2>
                
                <p>Đ&acirc;y l&agrave; 1 cụm từ tương đối mới với cộng đồng nu&ocirc;i th&uacute; cưng ở Th&agrave;nh phố Hồ ch&iacute; minh. Nhưng n&oacute; l&agrave; 1 dịch vụ rất phổ biến v&agrave; kh&ocirc;ng thể thiếu ở nước ngo&agrave;i. Kh&ocirc;ng đ&acirc;u xa<br />
                chỉ qua Th&aacute;i Lan th&ocirc;i c&aacute;c bạn sẽ thấy tr&ecirc;n 1 con phố chừng 1 km đ&atilde; c&oacute; 2-3 tiệm&nbsp;<strong>Spa Grooming</strong>&nbsp;cho ch&oacute; rồi. N&oacute; nhiều tương đương với c&aacute;c tiệm hớt t&oacute;c gội đầu ở Việt Nam<br />
                vậy. C&ograve;n trong bệnh viện th&uacute; y th&igrave; bệnh viện n&agrave;o cũng sẽ c&oacute; 1 ph&ograve;ng&nbsp;<strong>Spa Grooming</strong>&nbsp;để tắm chải l&agrave;m đẹp trước khi nhập v&agrave; xuất viện.</p>
                
                <p>Theo khuyến c&aacute;o cứ 2 th&aacute;ng 1 lần chủ nu&ocirc;i n&ecirc;n cho ch&oacute; đi tắm chải cắt l&ocirc;ng. Ch&oacute; m&egrave;o thường được mang đến v&agrave;o buổi s&aacute;ng đến trưa hoặc chiều mới lấy về. &nbsp;Thời gian để<br />
                ho&agrave;n thiện 1 qui tr&igrave;nh cắt tỉa mất từ 60- 180 ph&uacute;t. Việc tắm rửa v&agrave; chăm s&oacute;c th&uacute; cưng to&agrave;n diện l&agrave; một lộ tr&igrave;nh đ&ograve;i hỏi người thực hiện c&oacute; kỹ thuật v&agrave; kinh nghiệm. Tắm chải<br />
                đ&uacute;ng c&aacute;ch sẽ gi&uacute;p loại đi những phần l&ocirc;ng, tế b&agrave;o chết. Nếu kh&ocirc;ng được tắm rửa đ&uacute;ng c&aacute;ch những l&ocirc;ng chết n&agrave;y sẽ g&acirc;y bệnh cho da như: nấm da, vi&ecirc;n dị ứng da&hellip;</p>
                
                <p><img alt="Spa Grooming" src="http://petcare.test/images/tam-say-thu-cung_1608420235.jpg" style="height:380px; width:500px" /></p>
                
                <p>Tắm rửa v&agrave; chải l&ocirc;ng thường xuy&ecirc;n cho th&uacute; nu&ocirc;i gi&uacute;p hạn chế c&aacute;c bệnh về da</p>
                
                <h2>Liệu tr&igrave;nh của Grooming Spa tại Pet Pro</h2>
                
                <ul>
                    <li>Th&uacute; cưng sẽ được tắm rửa bằng dầu tắm chuy&ecirc;n dụng để l&agrave;m sạch. C&aacute;c sợi l&ocirc;ng rối sẽ được gỡ, l&agrave;m mượt lại. Sau khi l&agrave;m sạch xong th&uacute; cưng sẽ được sấy kh&ocirc; bằng<br />
                    m&aacute;y đặc dụng. Gi&uacute;p l&ocirc;ng tơi đều v&agrave; th&uacute; cưng cũng kh&ocirc;ng bị lạnh.</li>
                </ul>
                
                <ul>
                    <li>Vệ sinh tất cả c&aacute;c ch&acirc;n cho th&uacute; cưng, c&aacute;c m&oacute;ng ch&acirc;n d&agrave;i sẽ được cắt tỉa gọn g&agrave;ng.</li>
                </ul>
                
                <ul>
                    <li>Vệ sinh v&agrave; lau ch&ugrave;i sạch sẽ c&aacute;c vết bẩn trong tai, l&agrave;m sạch v&ugrave;ng đi vệ sinh</li>
                </ul>
                
                <ul>
                    <li>Nhỏ thuốc mắt đặc trị lấy đi c&aacute;c vết bẩn, rỉ v&agrave; nh&egrave;m b&aacute;m trong mắt</li>
                </ul>
                
                <ul>
                    <li>Cuối c&ugrave;ng c&ocirc;ng đoạn l&acirc;u nhất trong&nbsp;<strong>Spa Grooming</strong>&nbsp;l&agrave; cắt tỉa l&ocirc;ng theo style của từng giống th&uacute; nu&ocirc;i v&agrave; y&ecirc;u cầu kh&aacute;ch h&agrave;ng. C&ocirc;ng đoạn n&agrave;y đ&ograve;i hỏi người cắt phải c&oacute;<br />
                    &oacute;c thẩm mỹ. C&oacute; nhiều kinh nghiệm v&agrave; được đ&agrave;o tạo nghi&ecirc;m t&uacute;c th&igrave; mới cho ra 1 sản phẩm c&oacute; t&iacute;nh nghệ thuật cao. Mang lại sự h&agrave;i l&ograve;ng cho th&acirc;n chủ v&agrave; thoải m&aacute;i cho th&uacute; cưng.</li>
                </ul>
                
                <p><img alt="Spa Grooming" src="http://petcare.test/images/grooming-spa-thu-y-pet-pro_1608420294.jpg" style="height:267px; width:331px" /></p>
                
                <p>Spa Grooming to&agrave;n diện cần những kỹ thuật vi&ecirc;n c&oacute; tay nghề cao</p>'  
            ],
            [
                'service_id' => 8,
                'service_detail_status' => 1,
                'service_detail_image' => 'van_chuyen_kham_chua_benh_tai_nha.jpg',
                'service_detail_content' => '<h1>Kh&aacute;ch Sạn Cho Th&uacute; Cưng</h1>

                <p>bởi&nbsp;<a href="https://thuypetpro.com.vn/author/hiep" rel="author" title="Các bài đăng của hiep">hiep</a>&nbsp;|&nbsp;Th2 24, 2017&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu" rel="category tag">Dịch Vụ</a>&nbsp;|&nbsp;<a href="https://thuypetpro.com.vn/dich-vu/khach-san-cho-thu-cung.html#respond">0 Lời b&igrave;nh</a></p>
                
                <p><img alt="Khách Sạn Cho Thú Cưng" src="http://petcare.test/images/khach-san-cho-thu-cung-tai-thu-y-pet-pro_1608420460.jpg" style="height:480px; width:640px" /></p>
                
                <p><strong>Kh&aacute;ch sạn cho th&uacute; cưng</strong>&nbsp;của PetPro, nơi xoa dịu nỗi buồn cho th&uacute; cưng của bạn khi phải xa chủ. Nơi chăm s&oacute;c th&uacute; cưng của bạn tốt như bạn.</p>
                
                <h2>Kh&aacute;ch sạn cho th&uacute; cưng l&agrave; g&igrave;?</h2>
                
                <p><strong>Kh&aacute;ch sạn cho th&uacute; cưng</strong>&nbsp;l&agrave; dịch vụ cung cấp nơi lưu tr&uacute; cho th&uacute; cưng mỗi khi gia chủ c&oacute; dịp đi xa m&agrave; kh&ocirc;ng c&oacute; ai chăm s&oacute;c th&uacute; cưng của m&igrave;nh.<br />
                Ngo&agrave;i ra dịch vụ kh&aacute;ch sạn cho th&uacute; cưng c&ograve;n nhận giữ gi&uacute;p những &ldquo;em th&uacute; nu&ocirc;i&rdquo; đ&aacute;ng y&ecirc;u của bạn trong những dịp lễ, tết gi&uacute;p cho gia đ&igrave;nh an t&acirc;m vui chơi.</p>
                
                <p><img alt="" src="http://petcare.test/images/khach_san_cho_thu_cung_1608420483.jpg" style="height:470px; width:836px" /></p>
                
                <p>Kh&aacute;ch sạn cho th&uacute; cưng l&agrave; dịch vụ cung cấp nơi lưu tr&uacute; cho th&uacute; cưng</p>
                
                <h2>Ti&ecirc;u chuẩn của&nbsp;<strong>kh&aacute;ch sạn cho th&uacute; cưng</strong></h2>
                
                <p>Kh&aacute;ch sạn th&uacute; cưng của PetPro theo chuẩn quy định của tổ chức sức khỏe động vật thế giới</p>
                
                <p>Theo tổ qui định của Tổ chức sức khỏe động vật thế giới, một khu lưu tr&uacute; cho th&uacute; cưng phải đạt chuẩn sau:</p>
                
                <ul>
                    <li>C&oacute; hầm chứa ph&acirc;n, chất thải, hầm lắng, hầm ph&acirc;n hủy</li>
                    <li>Hệ thống xử l&yacute; kh&ocirc;ng kh&iacute;</li>
                    <li>Hệ thống xử l&yacute; nước thải theo chu tr&igrave;nh tự động h&oacute;a khử tr&ugrave;ng 30 ph&uacute;t/lần.</li>
                    <li>Kh&iacute; thải trong chuồng được ph&acirc;n ly th&agrave;nh kh&iacute; kh&ocirc;ng độc Nito v&agrave; Oxy, sau đ&oacute; kh&iacute; n&agrave;y được quạt h&uacute;t tự động đưa v&agrave;o đường ống xử l&yacute; trước<br />
                    khi thải ra ngo&agrave;i, trả lại nguồn oxy dồi d&agrave;o trong khu lưu giữ.</li>
                    <li>Nhiệt độ phải được duy tr&igrave; ở mức khoảng 25 độ C nhằm mang lại th&acirc;n nhiệt tốt nhất cho th&uacute; nu&ocirc;i.</li>
                    <li>Độ ẩm phải c&acirc;n bằng</li>
                </ul>
                
                <h2><strong>Kh&aacute;ch sạn cho th&uacute; cưng tại Th&uacute; Y PetPro</strong></h2>
                
                <p>Kh&ocirc;ng gian ấm c&uacute;ng d&agrave;nh cho th&uacute; cưng</p>
                
                <p>B&ecirc;n cạnh những qui định bắt buộc tr&ecirc;n,&nbsp;<a href="https://thuypetpro.com.vn/">kh&aacute;ch sạn cho th&uacute; cưng</a>&nbsp;của bệnh viện Th&uacute; Y PetPro c&ograve;n ch&uacute; &yacute; đến việc tao ra một kh&ocirc;ng gian ấm c&uacute;ng với<br />
                tiếng nhạc du dương nhằm giảm căng thẳng cho th&uacute; cưng. Với việc trang bị hệ thống &acirc;m nhạc n&agrave;y, th&uacute; cưng rất dễ d&agrave;ng ch&igrave;m v&agrave; giấc ngủ.</p>
                
                <p>Với dịch vụ kh&aacute;ch sạn&nbsp;từ bệnh vi&ecirc;n Th&uacute; Y PetPro, ch&uacute;ng t&ocirc;i cũng ch&uacute; &yacute; đến việc trấn an tinh thần cho th&uacute; nhạy cảm, l&agrave;m cho &ldquo;c&aacute;c em&rdquo; kh&ocirc;ng c&ograve;n cảm<br />
                gi&aacute;c nhờ nh&agrave;, lạ chổ. Hệ thống lưu tr&uacute; n&agrave;y đảm bảo cho th&uacute; cung một cảm gi&aacute;c an to&agrave;n như đang sống trong v&ograve;ng tay mẹ, gần gũi nhưng đang ở trong ch&iacute;nh ổ của n&oacute;.</p>
                
                <p>Ch&uacute;ng t&ocirc;i tự h&agrave;o l&agrave; sơ sở được cấp ph&eacute;p đầu ti&ecirc;n đủ điều kiện an to&agrave;n vệ sinh cho dịch vụ&nbsp;<strong>kh&aacute;ch sạn cho th&uacute; cưng.</strong></p>
                
                <p><strong><em>* Dịch vụ lưu trú khách sạn</em></strong></p>
                
                <p><em>&ndash; Từ 3-5kg: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..120.000đ/ngày<br />
                &ndash;&nbsp;Từ 5-10kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..170.000đ/ngày<br />
                &ndash;&nbsp;Từ 10 -20kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..220.000đ/ngày<br />
                &ndash;&nbsp;Tr&ecirc;n 20kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;300.000đ/ngày</em></p>
                
                <p><strong><em>* Dịch vụ kh&aacute;ch sạn c&oacute; huấn luyện v&agrave; tập thể dục ( được đảm nhận bởi chuy&ecirc;n gia huấn luyện ch&oacute; cảnh )</em></strong></p>
                
                <p><em>&ndash; Từ 3-5kg: &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..150.000đ/ngày</em><br />
                <em>&ndash;&nbsp;Từ 5-10kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..250.000đ/ngày<br />
                &ndash;&nbsp;Từ 10 -20kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..350.000đ/ngày<br />
                &ndash;&nbsp;Tr&ecirc;n 20kg:&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;400.000đ/ngày</em></p>
                
                <p><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></strong><strong><em>&nbsp;&nbsp; &nbsp;Note: Trong c&aacute;c ng&agrave;y lễ ch&iacute;nh v&agrave; 5 &nbsp;ng&agrave;y tết Nguy&ecirc;n đ&aacute;ng gi&aacute; sẽ phụ thu th&ecirc;m 30 %</em></strong></p>'  
            ],
            [
                'service_id' => 9,
                'service_detail_status' => 1,
                'service_detail_image' => 'cap_cuu_247.jpg',
                'service_detail_content' => '<p><strong>PetCare cung cấp dịch vụ cấp cứu 24/7, kể cả ng&agrave;y lễ</strong>. &nbsp;</p>

                <p>H&atilde;y gọi cho chi nh&aacute;nh PetCare &nbsp;gần nhất v&agrave; mang th&uacute; cưng tới bệnh viện khi bạn thấy c&aacute;c biểu hiện :</p>
                
                <p>&bull; &nbsp; Thần kinh (sốc, co giật, h&ocirc;n m&ecirc;).<br />
                &bull; &nbsp; Kh&oacute; thở.<br />
                &bull; &nbsp; G&atilde;y xương.<br />
                &bull; &nbsp; Ti&ecirc;u chảy.<br />
                &bull; &nbsp; N&ocirc;n mửa nặng.<br />
                &bull; &nbsp; Bụng ph&igrave;nh to.<br />
                &bull; &nbsp; Tắc đường tiểu.<br />
                &bull; &nbsp; Nuốt phải dị vật hoặc chất độc.<br />
                &bull; &nbsp; Đẻ kh&oacute; .<br />
                &bull; &nbsp; Bị thương nặng.<br />
                <br />
                <strong>Trường hợp cấp cứu sau 19h xin vui l&ograve;ng li&ecirc;n hệ:</strong></p>
                
                <p><strong>PetCare 1:</strong>&nbsp; 124A Xu&acirc;n Thủy, Thảo Điền, Quận 2, TP.HCM</p>
                
                <p><strong>Tel:</strong>&nbsp;&nbsp;<a href="tel:+842835234244">(028) 3523 4244</a>&nbsp;&ndash; &nbsp;<a href="tel:+84918271246">0918 271 246</a></p>
                
                <p><img alt="petcare_05" src="http://petcare.test/images/chobobot_1608420665.jpg" style="height:581px; width:700px" /></p>
                
                <p><img alt="petcare_06" src="http://petcare.test/images/petcare_01-15-copy_1608420677.jpg" style="height:394px; width:700px" /></p>
                
                <p><img alt="chobobot" src="http://petcare.test/images/chich_ngua_thu_cungchich_ngua_thu_cung_1608420689.jpg" style="height:399px; width:600px" /></p>'
            ]

        ];
        DB::table('service_details')->insert($service_details);
        
    }
}
