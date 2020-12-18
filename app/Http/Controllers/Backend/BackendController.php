<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Statistic;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Cache;

class BackendController extends Controller
{
    //Show home page backend
    public function showHome(){
       
        return view('backend.layouts.index');
    }

    //Show register form
    public function login(){
        return view('backend.pages.login');
    }

    //Show login form
    public function register(){
        return view('backend.pages.register');
    }

    //Dashboard
    public function dashboard(Request $request){
        // $users = array();
        // if(Auth::check()){
        //     foreach(Auth::user()->get() as $user){
        //         if($user->isOnline()){
        //             // if (Cache::has('user-is-online-' . $user->id)){
        //             //     $users[] = $user;
        //             // } 
        //             $users[] = $user; 
        //         }
        //     }
        // }
        // return dd($users);
        return view('backend.index');
    }

    //Filter by date
    public function filterByDate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );  
        }
        echo $data = json_encode($chart_data);
    }

    //GET default value to Chart
    public function defaultDataChart(){
        $defaultDays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(45)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$defaultDays, $now])->orderBy('order_date', 'ASC')->get();
        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );  
        }
        echo $data = json_encode($chart_data);
    }

    //Filter data statistic by options
    public function filterByOption(Request $request){

        $now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString();  
        
        if($request->option == -1){
            $yesterday = Carbon::yesterday('Asia/Ho_Chi_Minh')->toDateString();
            $get = Statistic::whereBetween('order_date', [$yesterday, $now])->orderBy('order_date', 'ASC')->get();
        }elseif($request->option == 1){
            $get = Statistic::whereBetween('order_date', [$now, $now])->orderBy('order_date', 'ASC')->get();
        }elseif($request->option == 7){
            $seven = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
            $get = Statistic::whereBetween('order_date', [$seven, $now])->orderBy('order_date', 'ASC')->get();
        }elseif($request->option == -30){
            $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
            $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
            $get = Statistic::whereBetween('order_date', [$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('order_date', 'ASC')->get();
        }elseif($request->option == 30){
            $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
            $get = Statistic::whereBetween('order_date', [$dau_thang_nay, $now])->orderBy('order_date', 'ASC')->get();

        }elseif($request->option == 365){
            $yearAgo = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
            $get = Statistic::whereBetween('order_date', [$yearAgo, $now])->orderBy('order_date', 'ASC')->get();
        }else{
            $get = Statistic::orderBy('order_date', 'ASC')->get();
        }

        $chart_data = [];
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );  
        }
        echo $data = json_encode($chart_data);
    }
    

    public function orderDate(Request $request){
        $order_date = $_GET['date'];
        $order = Order::where('order_created_at', $order_date)->orderBy('order_created_at', 'DESC')->get();
        return view('admin.order-date', ['order', $order]);
    }
}
