<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Order;
use App\OrderService;
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

    public function indexService(Request $request)
    {
        $listOrders = OrderService::orderBy('order_created_at', 'desc')->get();
        if (request()->ajax()) {
            return $this->datatablesService();
        }
    
        if (view()->exists('backend.order.service.index')) {
            return view('backend.order.service.index');
        }
    
        return abort('Error.404');
    }

    public function datatables(){
        $listOrders = Order::orderBy('order_created_at', 'desc')->get();
        return Datatables::of($listOrders)
        ->addIndexColumn()
        ->addColumn('status', function(Order $order) {
            return ($order->order_status < 1 ) ? '<a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>' 
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
        ->editColumn('order_date_shipping', function (Order $order) {
            return $order->order_date_shipping->format('Y-m-d h:m:s');
        })
        ->editColumn('order_created_at', function (Order $order) {
            return $order->order_created_at->format('Y-m-d h:m:s');
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    public function datatablesService(){
        $listOrdersService = OrderService::orderBy('order_created_at', 'desc')->get();
        return Datatables::of($listOrdersService)
        ->addIndexColumn()
        ->addColumn('status', function(OrderService $orderService) {
            return ($orderService->order_service_status < 1 ) ? '<a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>' 
            : '<a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>';
        })
        ->addColumn('action', function (OrderService $orderService) {
            $viewbtn = '<a href="'.route('order.service.view_order', ['id' => $orderService->order_service_id]).'"
            class="active styling-edit edit-item" ui-toggle-class="">
            <i class="fa fa-eye text-success text-active"></i></a>';
            return $viewbtn;
        })
        ->addColumn('customer', function(OrderService $orderService) {
            return $orderService->customer->name;
        })
        ->editColumn('order_service_date_begin', function (OrderService $orderService) {
            return $orderService->order_service_date_begin->format('Y-m-d h:m:s');
        })
        ->editColumn('order_created_at', function (OrderService $orderService) {
            return $orderService->order_created_at->format('Y-m-d h:m:s');
        })
        ->editColumn('order_updated_at', function (OrderService $orderService) {
            return $orderService->order_created_at->format('Y-m-d h:m:s');
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    public function viewOrder($id){
        $order = Order::find($id);
        // return $order;
        return view('backend.order.view-order', ['order' => $order]);
    }

    public function viewOrderService($id){
        $order_service = OrderService::find($id);
        return view('backend.order.service.view-order', ['order_service' => $order_service]);
    }

    //Changing status of  item
    public function changeStatus(Request $request){ 
        try{

            $order = Order::where("order_id", $request->id)->first();
            $status =  $request->value;
            $order->update(['order_status' => $status]);
            $today = Carbon::now();;
            $order->order_updated_at =  $today->format('Y-m-d H:i:s');
            $order->save();

        }catch(Exception $e){
            return response()->json(array(
                'code'  => 500,
                'message' => $e
            ));
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Đã cập nhật trạng thái đơn hàng!'
        ));
    }

    //Changing status of  item
    public function changeStatusService(Request $request){ 
        try{

            $order_service = OrderService::where("order_service_id", $request->id)->first();
            $status =  $request->value;
            $order_service->update(['order_service_status' => $status]);
            $today = Carbon::now();;
            $order_service->order_updated_at =  $today->format('Y-m-d H:i:s');
            $order_service->save();

        }catch(Exception $e){
            return response()->json(array(
                'code'  => 500,
                'message' => $e
            ));
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Đã cập nhật trạng thái lịch hẹn!'
        ));
    }

    //Cancel Order
    public function cancelOrder(Request $request){
        try{

            $order = Order::where("order_id", $request->order_id)->first();
            $order->update(['order_status' => -1]);
            $today = Carbon::now();
            $order->order_updated_at =  $today->format('Y-m-d H:i:s');
            $order->save();

        }catch(Exception $e){
            return response()->json(array(
                'code'  => 500,
                'message' => $e
            ));
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Hủy đơn hàng thành công!'
        ));
    }

    //Cancel Order Service
    public function cancelOrderService(Request $request){
        try{

            $order_service = OrderService::where("order_service_id", $request->order_service_id)->first();
            $order_service->update(['order_service_status' => -1]);
            $today = Carbon::now();
            $order_service->order_updated_at =  $today->format('Y-m-d H:i:s');
            $order_service->save();

        }catch(Exception $e){
            return response()->json(array(
                'code'  => 500,
                'message' => $e
            ));
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Hủy lịch hẹn thành công công!'
        ));
    }
}
