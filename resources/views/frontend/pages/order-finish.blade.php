{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Order finish | PETCARE
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">
{{-- <h3>Order completed!</h3>
<p>We have sent you an email confirmation of your order. Please check your mailbox.</p>
<p>Thank you for your trust in our products.</p>
<p>If you need assistance, please call our hotline for assistance when needed:
    <br>
    TEL: 0339-522-221
</p> --}}
<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;">
            <img src="http://localhost/petcare/public/vendor/frontend/images/home/logo4.png" style="width: 153px; height: 153px;" />
        </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;" colspan="3">
            <h1 style="color: red;">Shop thú cưng Petcare</h1>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
            Thông tin đơn hàng MDH
        </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Tài khoản
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">tai khoan</td>

        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Thời gian đặt hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">thời gian đặt</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Email
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Email</td>

        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Người nhận:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Người nhận</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Địa chỉ
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">địa chỉ</td>

        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Địa chỉ người nhận:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">địa chỉ đơn hàng</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Số điện thoại
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">023244241244124</td>

        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Lời chúc:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Lời chúc</td>
    </tr>
    <tr>
        <td colspan="4"  style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            <ul>
                @for($i =1; $i< 5; $i++)
                {{-- <li>{{ $item['_name'] }}: {{ $item['_quantity'] }} x {{ $item['_price'] }}</li> --}}
                <li>Tên SP: SL x 10000(VNĐ)</li>
                @endfor
            </ul>
        </td>
    </tr>
</table>
</div>
@endsection