<table style="width: 100%; border-spacing: 0px; margin-bottom: 30px;">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;"> <img src="http://localhost/petcare/public/vendor/frontend/images/home/logo4.png" style="width: 153px; height: 153px;" /> </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;">
            <h1 style="color: red;">Shop thú cưng Petcare</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;"> Đây là lời nhắn được gởi từ khách hàng có thông tin như sau: </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Email khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{Auth::guard('customer')->user()->email}}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Lời nhắn khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;"> Cảm ơn quý khách đã tin tưởng dịch tụ của chúng tôi. Quý khách nhớ đến cửa hàng vào ngày <b>{{$date_begin}}</b> </td>
    </tr>
</table>