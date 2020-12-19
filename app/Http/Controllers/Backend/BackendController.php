<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Statistic;
use App\Product;
use App\Service;
use Carbon\Carbon;
use Auth;
use DB;

use Illuminate\Support\Facades\Cache;

class BackendController extends Controller
{
    //Show home page backend
    public function showHome(){
        $count_orders = DB::table('orders')->get()->count();
        $count_customers = DB::table('customers')->get()->count();
        $count_visitors = DB::table('visitors')->get()->count();
        $now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 
        $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $sales_this_month = Statistic::whereBetween('order_date', [$dau_thang_nay,  $now])->sum('sales');
        $san_pham_xem_nhieu = Product::orderBy('product_views', 'desc')->limit(6)->get();
        $dich_vu_xem_nhieu = Service::orderBy('service_views', 'desc')->limit(6)->get();
        $tong_sl_sp = DB::table('products')->sum('product_quantity');
        $sl_sp = [];

        return view('backend.index', 
            ['count_orders'=> $count_orders, 'count_customers' => $count_customers,
             'sales_this_month' => $sales_this_month, 'count_visitors' => $count_visitors,
             'san_pham_xem_nhieu'=> $san_pham_xem_nhieu, 'dich_vu_xem_nhieu' => $dich_vu_xem_nhieu]);
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
        $count_orders = DB::table('orders')->get()->count();
        $count_customers = DB::table('customers')->get()->count();
        $now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 
        $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $sales_this_month = Statistic::whereBetween('order_date', [$dau_thang_nay,  $now])->sum('sales');
        $san_pham_xem_nhieu = DB::table('products')->oderBy('product_views', 'DESC')->get(6);
        return $san_pham_xem_nhieu;
        return view('backend.index', ['count_order'=> $count_orders, 'count_customers' => $count_customers, 'sales_this_month' => $sales_this_month]);
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
}
