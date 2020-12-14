<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Product;

class WishlistController extends Controller
{
    public function wishlist(){
        $cart_content = Cart::instance('wishlist')->content();
        return view('frontend.pages.wishlist')->with('cart_content', $cart_content);
    }

    public function addToWishlist(Request $request){
        $product = Product::find($request->product_id);
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->product_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->product_image;
    
        foreach(Cart::instance('wishlist')->content() as $item)
        {
            if($item->id == $product->product_id)
                return response()->json([
                    'code' => 500,
                    'message' => 'Products already in the ',
                    'itemInWishlist' =>  Cart::instance('wishlist')->count(),
                ]);
        };
        
        Cart::instance('wishlist')->add($data);

        return response()->json([
            'code' => 200,
            'message' => 'Product added to ',
            'itemInWishlist' =>  Cart::instance('wishlist')->count(),
        ]);
    }
    
    public function deleteToWishlist(Request $request){
        if($request->ajax() && $request->rowId != null){
            Cart::instance('wishlist')->remove($request->rowId);
            return response()->json([
                'success' => 'Delete Item successfuly!',
                'itemInWishlist' => Cart::instance('wishlist')->count()
            ]);
        }
        return $this->wishlist();
    }
}
