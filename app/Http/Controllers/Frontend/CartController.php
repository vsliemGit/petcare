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
        $cart_content = Cart::instance('cart')->content();
        return view('frontend.pages.shopping-cart')->with('cart_content', $cart_content);
    }

    public function addToCart(Request $request){
        (!isset($request->quantity)) ? $quantity = 1 : $quantity = $request->quantity;
        $product = Product::find($request->product_id);
        if($product->product_quantity < $quantity){
            return response()->json([
                'code' => 500,
                'message' => 'Quantity of products is not enough',
                'itemInCart' =>  Cart::instance('cart')->count()
            ]);
        }
        foreach(Cart::instance('cart')->content() as $item)
        {
            if($item->id == $product->product_id)
                return response()->json([
                    'code' => 500,
                    'message' => 'Products already in the ',
                    'itemInCart' =>  Cart::instance('cart')->count(),
                ]);
        };
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = $quantity;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_quantity;
        $data['options']['image'] = $product->product_image;
        Cart::instance('cart')->add($data);     
        return response()->json([
            'code' => 200,
            'message' => 'Product added to ',
            'itemInCart' =>  Cart::instance('cart')->count()
        ]);
    }

    public function storeCart(Request $request){
        if($request->ajax()){
            if(Auth::guard('customer')->check()){
                Cart::instance('cart')->store(Auth::guard('customer')->user()->id);
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
            Cart::instance('cart')->remove($request->rowId);
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Delete Item successfuly!',
                'itemInCart' => Cart::instance('cart')->count(),
                'subtotal' => Cart::instance('cart')->subtotal()
            ]);
        }
        return $this->shoppingCart();
    }

    public function updateToCart(Request $request){
        $product = DB::table('products')->where('product_id', Cart::instance('cart')->get('38c4524dbc69e2de78680f70cebae85f')->id)->first();
        if($product->product_quantity < $request->quantity){
            return response()->json([
                'code' => 500,
                'type' => 'error',
                'message' => 'Number of products remaining only '.$product->product_quantity,
                'itemInCart' =>  Cart::instance('cart')->count()
            ]);
        }
        if($request->ajax()){
            Cart::instance('cart')->update($request->rowId, $request->quantity);
            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Update item to cart successfully!',
                'itemInCart' => Cart::instance('cart')->count(),
                'subtotal' => Cart::instance('cart')->subtotal(),
                'pSubtotal' => number_format(Cart::instance('cart')->get($request->rowId)->priceTotal)
            ]);
        }
        return $this->shoppingCart();
    }
}
