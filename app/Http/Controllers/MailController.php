<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendMail(){

        // $to_name = "Mail gửi đến khách hàng";
        // $to_email = "cafroostb10298@gmail.com";//send to this email

        // $data = [
        //             "name_shop" => "Shop thú cưng PetCare",
        //             "body" => "Nội dung mail"
        //         ]; 

        // try{
        //     Mail::send("mail.sendCustomer" , $data, function($message) use ($to_name, $to_email){
        //         $message->from($to_email, $to_name);//send from this mail
        //         $message->to($to_email);
        //         $message->subject("TEST mail");//send this mail with subject   
        //     });

        // }catch(Exception $e){
        //     return dd($e);
        // }

        Mail::send( [] , [], function($message) {
            $noiDung = "Noi dung mail";
            $message->from("cafroostb10298@gmail.com", "Petcare Shop");
            $message->to("cafroostb10298@gmail.com");
            $message->subject("TEST mail"); 
            $message->setBody($noiDung, 'text/html');
        });
       

        // return redirect()->view('frontend.home')->with('message', '');    
        
    }
}
