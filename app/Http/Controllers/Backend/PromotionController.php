<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Coupon;
use App\Sale;
use Session;
use Yajra\Datatables\Datatables;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return $this->datatablesSale();
         }
    
         if (view()->exists('backend.promotion.sale.index')) {
            return view('backend.promotion.sale.index');
         }

         return abort('Error.404');
    }

    public function datatablesSale()
   {
        $listSales = Sale::all();
        return Datatables::of($listSales)
        ->addIndexColumn()
        ->addColumn('condition', function(Sale $sale) {
            return ($sale->sale_condition == 0 ) ? 'Giảm theo %' : 'Giảm theo tiền';
        })
        ->addColumn('status', function(Sale $sale) {
            return ($sale->sale_status == 0 ) ? '<a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>' 
            : '<a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>';
        })
        ->addColumn('action', function (Sale $sale) {
            $deletebtn = '<a class="btn btn-secondary btn-sm" onclick="deleteItemAjax('.$sale->sale_id.')"        
            href="javascript:void(0)"><i class="fa fa-trash-o" style="color: red;"></i></a>';
            // $editbtn = "<a href='".route('sale.edit', ['id' => $sale->sale_id])."' class='active styling-edit edit-item'>
            // <i class='fa fa-pencil-square-o text-success text-active'></i></a>";
            return $deletebtn;
        })
        ->editColumn('coupon_created_at', function ($sale) {
            return $sale->sale_created_at->format('Y-m-d h:m:s');
          })
        ->editColumn('sale_updated_at', function ($sale) {
            return $sale->sale_updated_at->format('Y-m-d h:m:s');
          })
        ->removeColumn('sale_condition')
        ->rawColumns(['action', 'status', 'checkbox'])
        ->make(true);
   }


    
//    public function getRowDetails()
//     {
//         return view('backend.promotion.sale.row-details');
//     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promotion.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('sales')->insert([
            'sale_name' => $request->sale_name,
            'sale_start_date' =>  $request->sale_start_date,
            'sale_end_date' => $request->sale_end_date,
            'sale_number' => $request->sale_number,
            'sale_condition' => $request->sale_condition,
            'sale_status' => $request->sale_status
        ]);
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        if (request()->ajax()) {
            return $this->datatablesSale();
        }
    
        if (view()->exists('backend.promotion.sale.index')) {
            return view('backend.promotion.sale.index');
        }
        return abort('Error.404'); 

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
    public function destroy(Request $request)
    {
        $id = $request->id;

        $sale = Sale::find($id);
        $sale->delete();
        
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.promotion.coupon.index')) {
            return view('backend.promotion.coupon.index');
        }

        return abort('Error.404');
    }
  
    public function indexCoupon(Request $request){
        $listCoupons = DB::table('coupons')->orderBy('coupon_created_at', 'desc')->get();
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.promotion.coupon.index')) {
            return view('backend.promotion.coupon.index');
        }

        return abort('Error.404');
    }

    public function datatables(){
        $listCoupons = Coupon::all();
        return Datatables::of($listCoupons)
        ->addIndexColumn()
        ->addColumn('condition', function(Coupon $coupon) {
            return ($coupon->coupon_condition == 0 ) ? 'Giảm theo %' : 'Giảm theo tiền';
        })
        ->addColumn('status', function(Coupon $coupon) {
            return ($coupon->coupon_status == 0 ) ? '<a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>' 
            : '<a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>';
        })
        ->addColumn('action', function (Coupon $coupon) {
            $deletebtn = '<a class="btn btn-secondary btn-sm" onclick="deleteItemAjax('.$coupon->coupon_id.')"        
            href="javascript:void(0)"><i class="fa fa-trash-o" style="color: red;"></i></a>';
            $editbtn = "<a href='".route('coupon.edit', ['id' => $coupon->coupon_id])."' class='active styling-edit edit-item'>
            <i class='fa fa-pencil-square-o text-success text-active'></i></a>";
            return $editbtn.$deletebtn;
        })
        ->editColumn('coupon_created_at', function ($coupon) {
            return $coupon->coupon_created_at->format('Y-m-d h:m:s');
          })
        ->editColumn('coupon_updated_at', function ($coupon) {
            return $coupon->coupon_updated_at->format('Y-m-d h:m:s');
          })
        ->removeColumn('coupon_condition')
        ->rawColumns(['action', 'status', 'checkbox'])
        ->make(true);
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
        
        $randstring = '';
        for ($i = 0; $i < 6; $i++) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring .= $characters[Rand(0, strlen($characters))];
        }

        DB::table('coupons')->insert([
            'coupon_name' => $request->coupon_name,
            'coupon_code' =>  $randstring,
            'coupon_times' => $request->coupon_times,
            'coupon_number' => $request->coupon_number,
            'coupon_condition' => $request->coupon_condition,
            'coupon_status' => $request->coupon_status
        ]);
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        $listCoupons = DB::table('coupons')->orderBy('coupon_created_at', 'desc')->paginate(5);
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.promotion.coupon.index')) {
            return view('backend.promotion.coupon.index');
        }

        return abort('Error.404');  

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
        $coupon->coupon_condition = $request->coupon_condition;
        $coupon->coupon_status = $request->coupon_status;  
        $coupon->save();    
        
        Session::flash('alert-info', 'Chỉnh sửa thành công!!!');
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.promotion.coupon.index')) {
            return view('backend.promotion.coupon.index');
        }

        return abort('Error.404');     
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
        
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.promotion.coupon.index')) {
            return view('backend.promotion.coupon.index');
        }

        return abort('Error.404');    
    }
   
}
