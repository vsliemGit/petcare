<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Store;

class ContactController extends Controller
{
    function getStore(){
        $stores = Store::all();

        $map_markes = array ();

        foreach($stores as $key => $location){
            $map_markes[] = (object)array(
                'longitude' =>  $location->store_longitude,
                'latitude' => $location->store_latitude,
            );
        }
        return response()->json($map_markes);
    }

    public function sendMailContactForm(Request $request){
        try {
            // Tạo mới gop ý:

            DB::table('gopys')->insert([
                'gy_email' => $request->email,
                'gy_noidung' => $request->message,
                'gy_name' => $request->name,
                'gy_subject' => $request->subject
            ]
            );
          
        } catch (ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.contact')
            ));
        } catch (Exception $e) {
            throw $e;
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Bạn đã gửi phản hồi thành công! Hãy tiếp tục mua sắm nhá!!!',
            'redirectUrl' => route('frontend.home')
        ));
    }

}
