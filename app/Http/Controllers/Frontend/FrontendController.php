<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use App\Rating;
use App\Comment;
use App\Customer;
use App\Brand;
use App\Product;
use App\Service;
use App\Order;
use Carbon\Carbon;
use App\Statistic;
use App\Visitor;

class FrontendController extends Controller
{   
    public function index(Request $request){
        //Store visitor       
        $visitor = Visitor::where('visitor_ip', $request->ip())->orderBy('visitor_created_at', 'DESC')->first();
        // return dd($visitor);
        if($visitor == null){
            if(!Auth::guard('customer')->check()){
                Visitor::create([
                    'visitor_ip' => $request->ip()
                ]);
            }else{
                Visitor::create([
                    'visitor_ip' => $request->ip(),
                    'customer_id' => Auth::guard('customer')->user()->id
                ]);
            }
        }else{
            $nowTime  = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $last_time_visit = Carbon::parse($visitor->visitor_created_at)->format('Y-m-d');
            $visited_to_day = ($nowTime == $last_time_visit);
            if(!$visited_to_day){
                if(!Auth::guard('customer')->check()){
                    Visitor::create([
                        'visitor_ip' => $request->ip()
                    ]);
                }else{
                    Visitor::create([
                        'visitor_ip' => $request->ip(),
                        'customer_id' => Auth::guard('customer')->user()->id
                    ]);
                }
            }
        }
    

        $topThreeNewProducts = Product::orderBy('product_created_at')->take(10)->get();
        $topNewServices = Service::orderBy('service_created_at')->take(10)->get();
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProducts = Product::paginate(8);
        $allProducts = Product::all();
        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        } 
        return view('frontend.index')
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('topNewServices', $topNewServices)
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories)
            ->with('listProducts', $listProducts)
            ->with('rating', $rating);
    }

    public function products(Request $request){
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->paginate(8);
        $listBrands = Brand::all();
        $allProducts = Product::all();
        $topThreeNewProducts = Product::orderBy('product_created_at')->take(10)->get();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();

        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        }
        return view('frontend.pages.products')
            ->with('listBrands', $listBrands)
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listProductCategories', $listProductCategories)
            ->with('rating', $rating)
            ->with('listProducts', $listProducts);
    }

    public function profile(){
        if(Auth::guard('customer')->check()){
            $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
            return view('frontend.pages.profile-customer', ['orders'=> $orders]);
        }
        return view('frontend.pages.login-checkout');     
    }

    public function viewOrder(Request $request){
        $order = Order::find($request->id);

        $table_detail_order = "<hr><table class='table'><thead>";
        $table_detail_order  .= "<th scope='col'>Mã sản phẩm</th>";
        $table_detail_order  .= "<th scope='col'>Hình ảnh</th>";
        $table_detail_order  .= "<th scope='col'>Tên SP</th>";
        $table_detail_order  .= "<th scope='col'>Giá</th>";
        $table_detail_order  .= "<th scope='col'>Số Lượng</th>";
        $table_detail_order  .= "<th style='width:30px;'></th></tr></thead><tbody>";

        foreach($order->detail as $item){
            $table_detail_order  .= "<tr>";
            $table_detail_order  .= "<td class='td-id'><span class='text-ellipsis'>#".$item->product_id."</span></td>";
            $table_detail_order  .= "<td><img width='70px' height='70px' src='storage/images/".$item->product_image."' class='img-list' /></td>";
            $table_detail_order  .= "<td class='td-name'><span class='text-ellipsis'>".$item->product_name."</span></td>";
            $table_detail_order  .= "<td class='td-price'><span class='text-ellipsis'>".$item->product_price."</span></td>";
            $table_detail_order  .= "<td class='td-quantity'><span class='text-ellipsis'>". $item->pivot->order_detail_quantity."</span></td>";
            $table_detail_order  .= "</tr>";
        }
        $table_detail_order .= "</tbody></table>";
        return $table_detail_order;
    }

    public function getRating($id){
        return (DB::table('rating')->where('product_id', $id)->avg('rating_star'));
    }

    public function quickview(Request $request){
        if($request->ajax()){
            $product = Product::find($request->product_id);
            $brand = DB::table('brands')->where('brand_id', $product->brand_id)->first();
            $rating = DB::table('rating')->where('product_id', $request->product_id)->avg('rating_star');

            $listImageOfProduct = '<ul id="imageGallery"><li style="height: 300px;" data-thumb="storage/images/'.$product->product_image .'" data-src="storage/images/'.$product->product_image .'"><img width="100%" src="storage/images/'.$product->product_image .'" /></li>';            
            foreach($product->images as $loop => $image){
                $listImageOfProduct.= '<li style="height: 300px;" data-thumb="storage/images/'.$image->img_name.'" data-src="storage/images/'.$image->img_name.'"><img width="100%" src="storage/images/'.$image->img_name.'" /></li>';
            }
            $listImageOfProduct .= '</ul>';

            $ratinghtml = '';
            for ($i = 1; $i <= 5; $i++){
                $color = ($i > round($rating)) ? "color: #ccc;" : "color: #ffcc00;";  
                $ratinghtml .= '<li title="Sản phẩm được đánh giá '.round($rating).' sao" class="rating" style="cursor: pointer; '.$color.'"> &#9733 </li> ';
            }
                                    
            return response()->json([
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_desc' => $product->product_desc,
                'listImageOfProduct' => $listImageOfProduct,
                'brand' => $brand->brand_name,
                'rating' => $ratinghtml
            ]);
        }
        return response()->json([
            'message' => 'Error when get info product!'
        ]);
    }

    function get_ajax_data(Request $request){
        if($request->ajax())
        {
            $allProducts = Product::all();
            foreach($allProducts as $key => $product){
                $rating[$product->product_id] = $this->getRating($product->product_id);
            } 
            $data = Product::paginate(8);
            return view('frontend.widgets.list-products')
            ->with('listProducts', $data)
            ->with('rating', $rating);
        }
    }

    public function productDetail($id){
        $product = Product::find($id);
        $product->increment('product_views');
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProductsRelatedToThisItem = Product::find($id)->category->products;
        $rating = Rating::where('product_id', $id)->avg('rating_star');       
        return view('frontend.pages.product-detail')
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories)
            ->with('product', $product)
            ->with('rating', round($rating))
            ->with('listProductsRelatedToThisItem', $listProductsRelatedToThisItem);
    }

    public function loadComment(Request $request){
        if($request->ajax()){
            $comments = DB::table('comments')->where('product_id', $request->product_id)->get();
            $output = "";
            $name = "";
            foreach($comments as $key => $comment){
                $name = ($comment->name_customer === null) ?
                Customer::find($comment->customer_id)->name
                :  $comment->name_customer;   
                $output .= '
                <div class="comment">
                    <img src="/storage/images/icon/admin-comment.png" alt="admin-avatar" class="img img-responsive img-thumbnail">
                    <p style="color: blue;"><i class="fa fa-user"></i> '.$name.'</p>
                    <p>'.$comment->cmt_content.'</p>
                    <span class="time-right">'.$comment->cmt_created_at.'</span>
                </div> ';
            }
            return $output;
        }
    }

    public function addComment(Request $request){

        if($request->rating == 0){
            return response()->json([
                'type' => 'error',
                'message' => 'You must rating'
            ]); 
        }
        
        if($request->ajax() && $request->comment != null){

            $dataComment['product_id'] = $request->product_id;
            $dataComment['cmt_content'] = $request->comment;

            $dataRating['product_id'] = $request->product_id;         
            $dataRating['rating_star'] = $request->rating;

            if(Auth::guard('customer')->check()){
                $dataComment['customer_id'] = Auth::guard('customer')->user()->id;
                $dataComment['name_customer'] = $request->name;
                $dataComment['email_customer'] = $request->email;

                $dataRating['customer_id'] = Auth::guard('customer')->user()->id;
                $dataRating['name_customer'] = $request->name;
                $dataRating['email_customer'] = $request->email;     
            }else{
                $dataComment['customer_id'] = null;
                $dataComment['name_customer'] = $request->name;
                $dataComment['email_customer'] = $request->email;

                $dataComment['customer_id'] = null;
                $dataComment['name_customer'] = $request->name;
                $dataComment['email_customer'] = $request->email;
            }

            DB::table('comments')->insert($dataComment);
            DB::table('rating')->insert($dataRating);

            return response()->json([
                'type' => 'success',
                'message' => 'Add Comment successfuly!'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'message' => 'Invalid comment!'
        ]);      
    }
    
    public function loadProductsByBrand($brand){
        $productsByBrand = DB::table('products')->get();
        return $productsByBrand;
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function loginCheckout(){
        return view('frontend.pages.login-checkout');
    }

    public function checkout(){
        // if(Auth::check()){
        //     return view('frontend.pages.login-checkout');
        // }
        $cart_content = Cart::instance('cart')->content();
        $listPaymentsMethod = DB::table('payments')->get();
        $listTransfersMethod = DB::table('transfers')->get();
        return view('frontend.pages.checkout')
            ->with('listPaymentsMethod', $listPaymentsMethod)
            ->with('listTransfersMethod', $listTransfersMethod)
            ->with('cart_content', $cart_content);
    }

    public function orderFinish(){
        return view('frontend.pages.order-finish');
    }

    public function order(Request $request){       
        try{

            $order_id =  DB::table('orders')->insertGetId([
                'customer_id' => $request->customer_id,
                'transfer_id' => $request->transfer,
                'payment_id' => $request->payment,
                'order_adress' => $request->to_address,
                'order_notes' => $request->message
            ]);

            $order = DB::table('orders')->where('order_id', $order_id)->first();
            $date =  Carbon::parse($order->order_created_at)->format('Y-m-d');
            
            DB::table('customers')
              ->where('id', Auth::guard('customer')->user()->id)
              ->update(['address' => $request->to_address]);        
            
            $cart_content = Cart::instance('cart')->content();
            $statistic = Statistic::where('order_date',  $date)->first();
            if($statistic ==  null){
                $id_statistic = DB::table('statistics')->insertGetId(
                    [   'order_date' =>  $date,
                        'sales' => 0,
                        'profit'=>0
                    ]);
                $statistic = Statistic::where('id_statistical',  $id_statistic)->first();
            }

            foreach($cart_content as $product){
                $orderDetail = DB::table('order_details')->insert([
                    'product_id' => $product->id,
                    'order_id' => $order_id,
                    'order_detail_quantity' => $product->qty
                ]);
                //Calculating sales and profit
                DB::table('statistics')->updateOrInsert(
                    ['order_date' => $date],
                    [   'sales' => $statistic->sales += ($product->qty * $product->price),
                        'profit'=> $statistic->profit += ($product->price - $product->product_basis_price),
                        'quantity' => $statistic->quantity += $product->qty
                    ]);
                // Cart::instance('cart')->remove($product->rowId);         
            }
            Statistic::where('order_date', $date)->increment('total_order');
        
            
        }catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        }      
        return response()->json(array(
            'code'  => 200,
            'message' => 'Tạo đơn hàng thành công!',
            'redirectUrl' => route('orderFinish')
        ));
    }
}
