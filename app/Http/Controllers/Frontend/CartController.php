<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use App\Brand;
use App\Product;

class CartController extends Controller
{

    public function shoppingCart(){
        if(Auth::guard('customer')->check()){
            Cart::restore(Auth::guard('customer')->user()->id);
        }
        return view('frontend.pages.shopping-cart');
    }

    public function addToCart(Request $request){
        (!isset($request->quantity)) ? $quantity = 1 : $quantity = $request->quantity;
        $product = Product::find($request->product_id);
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = $quantity;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_quantity;
        $data['options']['image'] = $product->product_image;
        Cart::add($data);     
        return response()->json([
            'success' => 'Add Item to Cart successfuly!',
            'itemInCart' =>  Cart::count()
        ]);
    }


    public function storeCart(Request $request){
        if($request->ajax()){
            if(Auth::guard('customer')->check()){
                Cart::store(Auth::guard('customer')->user()->id);
                $message = "Store successfully!";
            }else{
                $message = 'You must login!';
            } 
            return response()->json([
                'message' => $message
            ]);   
        }
        return response()->json([
            'message' => 'error'
        ]);    
    }

    public function deleteToCart(Request $request){
        if($request->ajax()){
            Cart::remove($request->rowId);
            return response()->json([
                'success' => 'Delete Item successfuly!',
                'itemInCart' => Cart::count(),
                'subtotal' => Cart::subtotal()
            ]);
        }
        return $this->shoppingCart();
    }

    public function updateToCart(Request $request){
        
        if($request->ajax()){
            Cart::update($request->rowId, $request->quantity);
            return response()->json([
                'success' => 'Delete Item successfuly!',
                'itemInCart' => Cart::count(),
                'subtotal' => Cart::subtotal(),
                'pSubtotal' => number_format(Cart::get($request->rowId)->priceTotal)
            ]);
        }
        return $this->shoppingCart();
    }

}
