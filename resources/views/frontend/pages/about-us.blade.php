{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
About us | PETCARE
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">
    <div class="row p-b-148">
        <div class="col-md-7 col-lg-8">
            <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                <h3 class=" cl2 p-b-16">
                    PETCATE - Shop thú cưng hàng đầu Việt Nam
                </h3>

                <p class="cl6 p-b-26">
                    Để có thể trờ thành địa chỉ uy tín, một bệnh viện thú y uy tín tại Cần Thơ, kể từ ngày thành lập cho đến nay Phòng khám thú y PET CARE CẦN THƠ vẫn đã và đang cố gắng không ngừng nghỉ cải thiện chất lượng phục vụ cũng như nâng cao khả năng khám chữa bệnh hiệu quả nhất. Điều đó có thể nhận thấy ngay qua sự hiện đại của các trang thiết bị cùng một đội ngũ các y bác sỹ giỏi về chuyên môn, và đây cũng chính là những yếu tố quan trọng đã giúp trung tâm có thể điều trị nhiều ca bệnh khó một cách hiệu quả và chính xác hơn. Ngoài ra, PET CARE còn sử dụng các loại thuốc đặc thù, mới nhất, từ đó cho phép các bác sỹ sử dụng các phác đồ điều trị tiên tiến.
                    Mặt khác, với mục đích giúp khách hàng cảm thấy yên tâm không còn lo lắng về tình trạng chó khoẻ và chó bệnh ngồi chung 1 chỗ mỗi lần đến với phòng phám thì hiện tại PET CARE đã có hẳn các phân khu riêng biệt bao gồm:   
                </p>

                <p class="cl6 p-b-26">
                    Khu truyền nhiễm: dành cho chó mèo bị bệnh truyền nhiễm có nguy cơ lây nhiễm cao. 
                    Khu không truyền nhiễm: dành cho các bé bị bệnh về da lông, kiểm tra sức khoẻ hay vệ sinh vết thương,...
                </p>

                <p class="cl6 p-b-26">
                    Khu tiêm ngừa xổ lãi và test bệnh chó mèo khoẻ để giao về nhà mới. Đảm bảo hoàn toàn cách ly với khu truyền nhiễm, hạn chế nguy cơ lây nhiễm cho các bé còn non, chưa tiêm ngừa.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
            <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                <h3 class="mtext-111 cl2 p-b-16">
                    Thông tin liên hệ
                </h3>

                <p class="cl6 p-b-26">
                HỆ THỐNG CHĂM SÓC THÚ CƯNG <br><br>

                Địa chỉ: Số 228 đường 3/2, Phường Hưng Lợi, Quận Ninh Kiều, TP Cần Thơ <br>
                Hotline: 0339 522 221 - 0339 522 221 <br>
                Hỗ trợ kỹ thuật: 0339-522-221 <br>
                Góp ý: cafroostb19081@gmail.com <br>
                Thời gian làm việc: Thứ 2 – Chủ nhật (8h30 – 21h)   
                </p>


            </div>
        </div>
    </div> 
    
</div><!--/#contact-page-->
@endsection