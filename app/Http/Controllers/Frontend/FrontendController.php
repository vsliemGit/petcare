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

class FrontendController extends Controller
{
    public function index(){
        $topThreeNewProducts = DB::table('products')
            ->orderBy('product_created_at')->take(10)->get();
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProducts = Product::paginate(8);      
        return view('frontend.index')
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories)
            ->with('listProducts', $listProducts);
    }

    public function products(Request $request){
        $listProducts = Product::paginate(8);
        $listBrands = Brand::all();
        $topThreeNewProducts = DB::table('products')
            ->orderBy('product_created_at')->take(10)->get();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        return view('frontend.pages.products')
            ->with('listBrands', $listBrands)
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listProductCategories', $listProductCategories)
            ->with('listProducts', $listProducts);
    }

    public function quickview(Request $request){
        if($request->ajax()){
            $product = Product::find($request->product_id);
            $images = DB::table('images')->where('product_id', $request->product_id)->get();
            $brand = DB::table('brands')->where('brand_id', $product->brand_id)->first();
            $rating = DB::table('rating')->where('product_id', $request->product_id)->avg('rating_star');

            $listImageOfProduct = '<ul id="imageGallery"><li style="height: 300px;" data-thumb="storage/images/'.$product->product_image .'" data-src="storage/images/'.$product->product_image .'"><img width="100%" src="storage/images/'.$product->product_image .'" /></li>';            
            foreach($images as $loop => $image){
                $listImageOfProduct.= '<li style="height: 300px;" data-thumb="storage/images/'.$image->img_name.'" data-src="storage/images/'.$image->img_name.'"><img width="100%" src="storage/images/'.$image->img_name.'" /></li>';
            }
            $listImageOfProduct .= '</ul>';

            $ratinghtml = '';
            for ($i = 1; $i <= 5; $i++){
                $color = ($i > round($rating)) ? "color: #ccc;" : "color: #ffcc00;";  
                $ratinghtml .= '<li title="Sản phẩm được đánh giá 4 sao" class="rating" style="cursor: pointer; '.$color.'"> &#9733 </li> ';
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
            'message' => 'Error when get info product!',
        ]);
    }

    function get_ajax_data(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::paginate(8);
            return view('frontend.widgets.list-products')->with('listProducts', $data);
        }
    }

    public function productDetail($id){
        $product = Product::find($id);
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
                    <p style="color: blue;">@'.$name.'</p>
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
        if(Auth::check()){
            return view('frontend.pages.login-checkout');
        }
        $cart_content = Cart::instance('cart')->content();
        return view('frontend.pages.checkout')->with('cart_content', $cart_content);
    }
}