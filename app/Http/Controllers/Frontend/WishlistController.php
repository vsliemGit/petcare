<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use App\Brand;
use App\Product;

class WishlistController extends Controller
{
    public function wishlist(){
        return view('frontend.pages.wishlist');
    }

    public function addToWishlist(Request $request){
        $product = Product::find($request->product_id);
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['price'] = $product->product_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->product_image;
        Cart::instance('wishlist')->add($data);

        return response()->json([
            'success' => 'Add Item to Wishlist successfuly!',
            'itemInWishlist' =>  Cart::instance('wishlist')->count()
        ]);
    }
    
    public function deleteToWishlist(Request $request){
        if($request->ajax()){
            Cart::instance('wishlist')->remove($request->rowId);
            return response()->json([
                'success' => 'Delete Item successfuly!',
                'itemInWishlist' => Cart::instance('wishlist')->count()
            ]);
        }
        return $this->wishlist();
    }
}
