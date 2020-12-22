<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Coupon;
use Session;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  
    public function indexCoupon(Request $request){
        $listCoupons = DB::table('coupons')->orderBy('coupon_created_at', 'desc')->paginate(5);
        if ($request->ajax()) {
            return view('backend.promotion.coupon.table-data')->with('listCoupons', $listCoupons);
        }
        return view('backend.promotion.coupon.index')->with('listCoupons', $listCoupons);
    }

    public function createCoupon(Request $request){
        return view('backend.promotion.coupon.create');
    }

    function randomString()
    {   
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 6; $i++) {
            $randstring = $characters[Rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public function storeCoupon(Request $request){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 6; $i++) {
            $randstring .= $characters[Rand(0, strlen($characters))];
        }

        DB::table('coupons')->insert([
            'coupon_name' => $request->coupon_name,
            'coupon_code' =>  $randstring,
            'coupon_times' => $request->coupon_times,
            'coupon_number' => $request->coupon_number,
            'coupon_condition' => $request->coupon_condition    
        ]);
        
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        return redirect()->route('coupon.index');     

    }

    public function editCoupon($id){
        $coupon = Coupon::find($id);
        return view('backend.promotion.coupon.edit', ['coupon' => $coupon]);
    }
    
    public function updateCoupon(Request $request, $id){
        $coupon = Coupon::where("coupon_id", $id)->first();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_times = $request->coupon_times;
        $coupon->coupon_number = $request->coupon_number;
        $coupon->coupon_condition = $request->coupon_condition ;  
        $coupon->save();    
        
        Session::flash('alert-info', 'Chỉnh sửa thành công!!!');
        return redirect()->route('coupon.index');     
    }

    public function destroyCoupon(Request $request){
        $id = $request->id;
        if (is_array($id)){
            Coupon::destroy($id);
        }
        else
        {
            $coupon = Coupon::where("coupon_id", $id)->first();
            $coupon->delete();
        }
        
        $listCoupons = DB::table('coupons')->orderBy('coupon_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.promotion.coupon.table-data')->with('listCoupons', $listCoupons);
        }
        return view('backend.promotion.coupon.index')->with('listCoupons', $listCoupons);   

    }
   
}
