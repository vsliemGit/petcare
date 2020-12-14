<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
        //
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

    public function storeCoupon(Request $request){
        DB::table('coupons')->insert([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_times' => $request->coupon_times,
            'coupon_condition' => $request->coupon_condition    
        ]);
        
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        return redirect()->route('coupon.index');     

    }
}
