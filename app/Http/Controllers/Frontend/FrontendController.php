<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Auth;
use App\Rating;
use App\Comment;
use App\Customer;
use App\Brand;
use App\Product;
use App\Service;
use App\OrderService;
use App\Order;
use Carbon\Carbon;
use App\Statistic;
use App\Visitor;
use App\Store;
use App\Banner;
use App\Coupon;
use App\ProductCategory;
use App\Sale;
use App\Product_Sale;

class FrontendController extends Controller
{   
    public function index(Request $request){
        //Store visitor       
        $visitor = Visitor::where('visitor_ip', $request->ip())->orderBy('visitor_created_at', 'DESC')->first();
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
        $topNewServices = DB::table('services')
        ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
        ->select('services.*','service_details.service_detail_id','service_details.service_detail_image')
        ->where('service_detail_status', 1)->orderBy('services.service_created_at')->take(10)->get();
        $listBrands = Brand::all();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProducts = Product::paginate(8);
        $allProducts = Product::all();
        $listBanners = Banner::where('banner_status', 1)->get();
        $listId = Product_Sale::select('product_id')->get();
        $listSaleOff = Product::whereIn('product_id', $listId)->get();
        $rating = [];
        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        } 
        return view('frontend.index')
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('topNewServices', $topNewServices)
            ->with('listSaleOff', $listSaleOff)
            ->with('listBrands', $listBrands)
            ->with('listProductCategoriesParent', $listProductCategoriesParent)
            ->with('listProducts', $listProducts)
            ->with('rating', $rating)
            ->with('listBanners', $listBanners);
    }

    public function products(Request $request){
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->paginate(8);
        $listBrands = Brand::all();
        $allProducts = Product::all();
        $topThreeNewProducts = Product::orderBy('product_created_at')->take(10)->get();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listId = Product_Sale::select('product_id')->get();
        $listSaleOff = Product::whereIn('product_id', $listId)->get();
        $rating = [];
        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        }
        return view('frontend.pages.products')
            ->with('listBrands', $listBrands)
            ->with('listSaleOff', $listSaleOff)
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listProductCategoriesParent', $listProductCategoriesParent)
            ->with('rating', $rating)
            ->with('listProducts', $listProducts);
    }

    public function sort(Request $request){
        
        $rating = [];
        $query = Product::where('product_quantity', '>', 0)->where('product_status', 1);

        switch($request->value){
            case "asc" :
            case "desc" : {
                $query = $query->orderBy('product_price', $request->value);
                break;
            }
            case "a_z" : {
                $query = $query->orderBy('product_name', 'asc');
                break;
            }
            case "z_a" : {
                $query = $query->orderBy('product_name', 'desc');
                break;
            }     
        }

        if($request->value_category_id != "" || $request->value_category_id != null){
            $query = $query->where('pro_category_id', $request->value_category_id);
        }

        if($request->value_brand_id != "" || $request->value_brand_id!= null){
            $query = $query->where('brand_id', $request->value_brand_id);
        }
  
  
        $listProducts = $query->paginate(8);

        foreach($listProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        } 

        return  view('frontend.widgets.list-products')
            ->with('listProducts', $listProducts)
            ->with('rating', $rating);
    }

    public function filterPrice(Request $request){
        
    }

    public function showByCategory(Request $request){
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->where('pro_category_id', $request->category_id)->get();
        if($listProducts->count()<1){
            return "<i>Chưa có sản phẩm cho mục này. Chúng tôi sẽ cập nhật trong thời gian sớm nhất. mong quý khách thông cảm!</i>";
        }
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->where('pro_category_id', $request->category_id)->paginate(8);
        $listBrands = Brand::all();
        $allProducts = Product::all();
        $topThreeNewProducts = Product::orderBy('product_created_at')->take(10)->get();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $rating = [];
        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        }
        return view('frontend.pages.product-by-category')
            ->with('listBrands', $listBrands)
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listProductCategoriesParent', $listProductCategoriesParent)
            ->with('rating', $rating)
            ->with('listProducts', $listProducts);
    }

    public function showByBrand(Request $request){
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->where('brand_id', $request->brand_id)->get();
        if($listProducts->count()<1){
            return "<i>Chưa có sản phẩm thuộc loại này. Chúng tôi sẽ cập nhật trong thời gian sớm nhất. mong quý khách thông cảm!</i>";
        }
        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->where('brand_id', $request->brand_id)->paginate(8);
        $listBrands = Brand::all();
        $allProducts = Product::all();
        $topThreeNewProducts = Product::orderBy('product_created_at')->take(10)->get();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $rating = [];
        foreach($allProducts as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        }
        return view('frontend.pages.product-by-category')
            ->with('listBrands', $listBrands)
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listProductCategoriesParent', $listProductCategoriesParent)
            ->with('rating', $rating)
            ->with('listProducts', $listProducts);
    }

    public function filterByPrice($begin, $end){
        
    }

    public function resultSearch(){
        $listBrands = Brand::all();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listId = Product_Sale::select('product_id')->get();
        $listSaleOff = Product::whereIn('product_id', $listId)->get();
        return view('frontend.pages.result-search', ['listBrands' => $listBrands, 'listProductCategoriesParent' => $listProductCategoriesParent, 'listSaleOff' => $listSaleOff]);
    }

    public function search(Request $request){
        $listBrands = Brand::all();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $key_words = $request->keywords_search;
        
        $product_founds = Product::where('product_status', 1)->where('product_name', 'like', '%'.$key_words."%")->get();
        $rating = [];
        foreach($product_founds as $key => $product){
            $rating[$product->product_id] = $this->getRating($product->product_id);
        }
        $service_founds = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->select('services.service_name','services.service_desc','service_details.service_detail_id','service_details.service_detail_image')
            ->where('service_detail_status', 1)->where('service_name', 'like', '%'.$key_words."%")->get();
        
        return view('frontend.pages.result-search', 
            ['listBrands' => $listBrands, 'listProductCategoriesParent' => $listProductCategoriesParent,
             'product_founds' => $product_founds, 'rating' => $rating,
              'service_founds' => $service_founds]);
    }

    public function searchAutoComplete(Request $request){
        $key_words = $request->key_words;
        $product_founds = Product::where('product_status', 1)->where('product_name', 'like', '%'.$key_words."%")->limit(5)->get();
       
        $output = "";
        $ouput =  "<ul class='dropdown-menu' style='display: block; width: 100%; position: absolute; z-index: 99; margin-left: 15px;'>";

        if($product_founds->count()>0){
            $count_product_founds = Product::where('product_status', 1)->where('product_name', 'like', '%'.$key_words."%")->get()->count();
            $count_product_founds_show = Product::where('product_status', 1)->where('product_name', 'like', '%'.$key_words."%")->limit(5)->get()->count();
            $ouput .= "<li class='li_item_search' style='border-bottom: 1px solid #ececf9;'><i>Hiển thị ".$count_product_founds_show."/".$count_product_founds." sản phẩm được tìm thấy.<i/></li>";
            foreach($product_founds as $product){
                $ouput .= "<li class='li_item_search' style='border-bottom: 1px solid #ececf9;'>";
                $ouput .= "<img style='width: 15%; height: 60px; float: left; padding: 5px; border: 1px solid #ececf9; margin-right: 5px;' src='storage/images/". $product->product_image."' alt=''/>";
                $ouput .=  "<b class='product_name' style='max-width: 80%;'>".$product->product_name."</b>";
                $ouput .=  "<p style='display: -webkit-box;  max-width: 80%; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;'> ".$product->product_desc."</p>";
                $ouput .= "</li>";
            }
        }
        $service_founds = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->select('services.service_name','services.service_desc','service_details.service_detail_id','service_details.service_detail_image')
            ->where('service_detail_status', 1)->where('service_name', 'like', '%'.$key_words."%")->get();
        $count_service_founds = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->where('service_detail_status', 1)->where('service_name', 'like', '%'.$key_words."%")->get()->count();
        $count_service_founds_show = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->where('service_detail_status', 1)->where('service_name', 'like', '%'.$key_words."%")->limit(5)->get()->count();

        if($service_founds->count()>0){
            $ouput .= "<li class='li_item_search' style='border-bottom: 1px solid #ececf9;'><i>Hiển thị ".$count_service_founds_show."/". $count_service_founds." dịch vụ được tìm thấy.<i/></li>";
            foreach($service_founds as $service){           
                $ouput .= "<li class='li_item_search' style='border-bottom: 1px solid #ececf9;'>";
                $ouput .= "<img style='width: 15%;  height: 60px; float: left; padding: 5px; border: 1px solid #ececf9; margin-right: 5px;' src='storage/images/services/". $service->service_detail_image."' alt=''/>";
                $ouput .=  "<b class='product_name' style='max-width: 80%;'>".$service->service_name."</b>";
                $ouput .=  "<p style='display: -webkit-box;  max-width: 80%; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;'> ".$service->service_desc."</p>";
                $ouput .= "</li>";
            }     
        }
        if( $product_founds->count()<1 &&  $service_founds->count()<1){
            $ouput .= "<li class='li_item_search' style='border-bottom: 1px solid #ececf9;'><i>Không tìm thấy sản phẩm phù hợp!<i/></li>";
        }
        $ouput .= "<ul/>";

        return  $ouput ;
    }

    public function profile(){
        if(Auth::guard('customer')->check()){
            $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
            $order_services = OrderService::where('customer_id', Auth::guard('customer')->user()->id)->get();
            return view('frontend.pages.profile-customer', ['orders'=> $orders, 'order_services'=> $order_services]);
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

    public function viewOrderService(Request $request){
        $order_service = OrderService::find($request->id);

        $table_detail_order_service = "<hr><table class='table'><thead>";
        $table_detail_order_service  .= "<th scope='col'>Mã DV</th>";
        $table_detail_order_service  .= "<th scope='col'>Hình ảnh</th>";
        $table_detail_order_service  .= "<th scope='col'>Tên DV</th>";
        $table_detail_order_service  .= "<th scope='col'>Mô tả</th>";
        $table_detail_order_service  .= "<th style='width:30px;'></th></tr></thead><tbody>";

        foreach($order_service->detail as $item){
            $table_detail_order_service  .= "<tr>";
            $table_detail_order_service  .= "<td class='td-id'><span class='text-ellipsis'>#".$item->service_id."</span></td>";
            $table_detail_order_service  .= "<td><img width='70px' height='70px' src='storage/images/services/".$item->service_image."' class='img-list' /></td>";
            $table_detail_order_service  .= "<td class='td-name'><span class='text-ellipsis'>".$item->service_name."</span></td>";
            $table_detail_order_service  .= "<td class='td-price'><span class='text-ellipsis' style='display: -webkit-box;  max-width: 400px; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;'>".$item->service_desc."</span></td>";
            $table_detail_order_service  .= "</tr>";
        }
        $table_detail_order_service .= "</tbody></table>";
        return $table_detail_order_service;
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
            $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->paginate(8);
            $rating = [];
            $sort_type = $request->sort_type;
            if($sort_type){
                switch($sort_type){
                    case "desc" : {
                        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->orderBy('product_price', "desc")->paginate(8);
                        break;
                    }
                    case "asc" : {
                        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->orderBy('product_price', "asc")->paginate(8);
                        break;
                    }
                    case "a_z" : {
                        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->orderBy('product_name', "asc")->paginate(8);
                        break;
                    }
                    case "z_a" : {
                        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->orderBy('product_name', "desc")->paginate(8);
                        break;
                    }
                    default:{
                        $listProducts = Product::where('product_status', 1)->where('product_quantity', '>', 0)->paginate(8);
                    }    
                }
            }

            foreach($listProducts as  $product){
                $rating[$product->product_id] = $this->getRating($product->product_id);
            } 
            return view('frontend.widgets.list-products')
                ->with('listProducts', $listProducts)
                ->with('rating', $rating);
        }
    }

    public function productDetail($id){
        $product = Product::find($id);
        $product->increment('product_views');
        $listBrands = Brand::all();
        $listProductCategoriesParent = ProductCategory::where('parent_id', null)
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProductsRelatedToThisItem = Product::find($id)->category->products;
        $rating = Rating::where('product_id', $id)->avg('rating_star');       
        return view('frontend.pages.product-detail')
            ->with('listBrands', $listBrands)
            ->with('listProductCategoriesParent', $listProductCategoriesParent)
            ->with('product', $product)
            ->with('rating', round($rating))
            ->with('listProductsRelatedToThisItem', $listProductsRelatedToThisItem);
    }

    public function loadComment(Request $request){
        if($request->ajax()){
            $comments = DB::table('comments')->where('product_id', $request->product_id)->get();      
            $output = "";
            $name = "";
            $image = "customer.png";                
            foreach($comments as $key => $comment){          
                $name = ($comment->name_customer === null) ? Customer::find($comment->customer_id)->name :  $comment->name_customer; 
                $image = ($comment->name_customer === null) ? Customer::find($comment->customer_id)->avatar :  "customer.png";    
                $output .= '
                <div class="comment">
                    <img src="storage/images/avatars/'.$image.'" alt="admin-avatar" class="img img-responsive img-thumbnail">
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
        $locations = Store::all();
        return view('frontend.pages.contact', compact('locations'));
    }

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function loginCheckout(){
        return view('frontend.pages.login-checkout');
    }

    public function checkout(){
        $cart_content = Cart::instance('cart')->content();
        $listPaymentsMethod = DB::table('payments')->get();
        $listTransfersMethod = DB::table('transfers')->get();
        return view('frontend.pages.checkout')
            ->with('listPaymentsMethod', $listPaymentsMethod)
            ->with('listTransfersMethod', $listTransfersMethod)
            ->with('cart_content', $cart_content);
    }

    public function orderFinish(Request $request){
        return view('frontend.pages.order-finish');
    }

    public function order(Request $request){  
        try{
            $coupon_session = Session::get('coupon');
            $coupon_fee = 0;
            if($coupon_session==true){
                foreach($coupon_session as $key => $cou){
                    $coupon_code = $cou['coupon_code'];
                }
                $coupon = Coupon::where('coupon_code', $coupon_code)->first();

                $subTotal = (double)filter_var(Cart::instance('cart')->subtotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

                if($cou['coupon_condition'] == 0){
                    $total_coupon = ($subTotal * $coupon->coupon_number)/100;
                    $coupon_fee = $subTotal - $total_coupon;
                }else{
                    $total_coupon = $subTotal - $coupon->coupon_number;
                    $coupon_fee = ($total_coupon > 0) ? $total_coupon : 0;
                }

                $order_id =  DB::table('orders')->insertGetId([
                    'customer_id' => $request->customer_id,
                    'transfer_id' => $request->transfer,
                    'payment_id' => $request->payment,
                    'order_adress' => $request->to_address,
                    'to_name' =>  $request->to_name,
                    'to_email' =>  $request->to_email,
                    'to_phone'=>  $request->to_phone,
                    'order_notes' => $request->message,
                    'coupon_id' => $coupon->coupon_id
                ]);
                Session::forget('coupon');
                $coupon = Coupon::where('coupon_code', $coupon_code)->decrement('coupon_times');
                      
            }else
            {
                $order_id =  DB::table('orders')->insertGetId([
                    'customer_id' => $request->customer_id,
                    'transfer_id' => $request->transfer,
                    'payment_id' => $request->payment,
                    'to_name' =>  $request->to_name,
                    'to_email' =>  $request->to_email,
                    'to_phone'=>  $request->to_phone,
                    'order_adress' => $request->to_address,
                    'order_notes' => $request->message
                ]);
             }

            $order = DB::table('orders')->where('order_id', $order_id)->first();
            $date =  Carbon::parse($order->order_created_at)->format('Y-m-d');
            
            DB::table('customers')
              ->where('id', Auth::guard('customer')->user()->id)
              ->update(['address' => $request->to_address]);        
            $customer = DB::table('customers')->where('id', Auth::guard('customer')->user()->id)->first();
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

            $fee_profit = 0;
            $quantity_product = 0;
            $orderDetail = null;
            foreach($cart_content as $product){
                $orderDetail = DB::table('order_details')->insert([
                    'product_id' => $product->id,
                    'order_id' => $order_id,
                    'order_detail_quantity' => $product->qty
                ]);
                $product_basic_price = DB::table('products')->where('product_id', $product->id)->select('product_basis_price')->first()->product_basis_price;
                $fee_profit += ($product->price - $product_basic_price );
                $quantity_product += $product->qty;

                Cart::instance('cart')->remove($product->rowId);         
            }
            DB::table('statistics')->updateOrInsert(
                ['order_date' => $date],
                [   'sales' =>  $coupon_fee,
                    'profit'=> $fee_profit,
                    'quantity' => $statistic->quantity += $quantity_product
                ]);

            Statistic::where('order_date', $date)->increment('total_order');
            
        }catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        }      
        $params = [
            'cart_content' => $cart_content,
            'order' => $order,
            'customer' => $customer,
            'message' => "Thêm đơn hàng thành công!"
        ];
        Session::put('params', $params);
        return redirect()->route('orderFinish');
    }

    public function showOrderService(){
        $listServices = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->select('services.*','service_details.*')
            ->where('service_detail_status', 1)->get();
        return view('frontend.pages.order-service', ['listServices' => $listServices]);
    }

    public function orderService(Request $request){
        try{
            $order_id = DB::table('order_services')->insertGetId([
                'order_service_time' => $request->time,
                'customer_id' => $request->customer_id,
                'order_service_date_begin' => $request->date
            ]);
            
           foreach($request->service as $service_id){
                $order_service_detail = DB::table('order_service_details')->insert([
                    'service_id' => $service_id,
                    'order_service_id' => $order_id
                ]);
            }      
        }catch(Exception $e) {
            Session::flash('alert-warning', $e);
            return redirect()->route("frontend.show-order-service");
        } 
        Session::flash('alert-info', 'Order service successfully!');
        return view('frontend.pages.order-service-finish');
    }

    
}
