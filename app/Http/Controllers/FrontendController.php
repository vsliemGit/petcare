<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use Date;
use App\Comment;
use App\Customer;
use App\Brand;
use App\Product;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     if(Auth::guard('customer')->check()){
    //         Cart::restore(Auth::guard('customer')->user()->id);
    //     }
    // }

    public function index(){
        $topThreeNewProducts = DB::table('products')
            ->orderBy('product_created_at')->take(10)->get();
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        return view('frontend.index')
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories);
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

    public function productDetail($id){
        $product = Product::find($id);
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listProductsRelatedToThisItem = Product::find($id)->category->products;
        return view('frontend.pages.product-detail')
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories)
            ->with('product', $product)
            ->with('listProductsRelatedToThisItem', $listProductsRelatedToThisItem);
    }

    public function loadComment(Request $request){
        if($request->ajax()){
            // $comments = DB::table('comments')->join('customers', 'customers.id', '=', 'comments.customer_id')
            //     ->select('comments.*', 'customers.name')->where('comments.product_id', $request->product_id)->get();
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
        
        if($request->ajax() && $request->comment != null){
            $data = [];
            $data['product_id'] = $request->product_id;
            $data['cmt_content'] = $request->comment;
            if(Auth::guard('customer')->check()){
                $data['customer_id'] = Auth::guard('customer')->user()->id;
                $data['name_customer'] = $request->name;
                $data['email_customer'] = $request->email;     
            }else{
                $data['customer_id'] = null;
                $data['name_customer'] = $request->name;
                $data['email_customer'] = $request->email;
            }

            DB::table('comments')->insert($data);
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
        $listBrands;
        return $listBrands;
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
        return view('frontend.pages.checkout');
    }
}
