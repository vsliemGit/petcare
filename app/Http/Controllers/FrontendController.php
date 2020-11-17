<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
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

    public function shoppingCart(){
        return view('frontend.pages.shopping-cart');
    }

    public function addToCart(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_quantity;
        $data['options']['image'] = $product->product_image;
        Cart::add($data);
        $itemInCart = Cart::count();
        return response()->json([
            'success' => 'Add Item to Cart successfuly!',
            'itemInCart' => $itemInCart
        ]);
    }

    public function deleteToCart(Request $request){
        if($request->ajax()){
            Cart::update($request->rowId, 0);
            $itemInCart = Cart::count();
            return response()->json([
                'success' => 'Delete Item successfuly!',
                'itemInCart' => $itemInCart
            ]);
        }
        return $this->shoppingCart();
    }

    public function loadProductsByBrand($brand){
        $listBrands;
        return $listBrands;
    }
}
