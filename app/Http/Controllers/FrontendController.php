<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Product;

class FrontendController extends Controller
{
    public function index(){
        $topThreeNewProducts = DB::table('products')
            ->orderBy('product_created_at')->take(3)->get();
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        return view('frontend.index')
            ->with('topThreeNewProducts', $topThreeNewProducts)
            ->with('listBrands', $listBrands)
            ->with('listProductCategories', $listProductCategories);
    }

    public function products(){
        $listProducts = Product::paginate(6);
        $listBrands = Brand::all();
        $topThreeNewProducts = DB::table('products')
            ->orderBy('product_created_at')->take(3)->get();
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
}