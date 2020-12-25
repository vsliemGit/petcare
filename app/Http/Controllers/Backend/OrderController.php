<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Customer;
use App\Payment;
use App\Transfer;
use Yajra\Datatables\Datatables;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listOrders = Order::orderBy('order_created_at', 'desc')->get();
        if (request()->ajax()) {
            return $this->datatables();
        }
    
        if (view()->exists('backend.order.index')) {
            return view('backend.order.index');
        }
    
        return abort('Error.404');
    }

    public function datatables(){
        $listOrders = Order::orderBy('order_created_at', 'desc')->get();
        return Datatables::of($listOrders)
        ->addIndexColumn()
        ->addColumn('status', function(Order $order) {
            return ($order->order_status == 0 ) ? '<a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>' 
            : '<a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>';
        })
        ->addColumn('action', function (Order $order) {
            $viewbtn = '<a href="'.route('order.view_order', ['id' => $order->order_id]).'"
            class="active styling-edit edit-item" ui-toggle-class="">
            <i class="fa fa-eye text-success text-active"></i></a>';
            return $viewbtn;
        })
        ->addColumn('customer', function(Order $order) {
            return $order->customer->name;
        })
        ->addColumn('payment_name', function(Order $order) {
            return $order->payment->payment_name;
        })
        ->addColumn('transfer_name', function(Order $order) {
            return $order->transfer->transfer_name;
        })
        ->editColumn('order_created_at', function (Order $order) {
            return $order->order_created_at->format('Y-m-d h:m:s');
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    public function viewOrder($id){
        $order = Order::find($id);
        // return $order;
        return view('backend.order.view-order', ['order' => $order]);
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
}
