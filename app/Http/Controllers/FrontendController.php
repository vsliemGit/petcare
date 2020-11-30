<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
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
    
    public function loadProductsByBrand($brand){
        $listBrands;
        return $listBrands;
    }

    public function contact(){
        return view('frontend.pages.contact');
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
