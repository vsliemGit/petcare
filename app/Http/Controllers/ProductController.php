<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Storage;
use App\Product;
use App\ProductCategory;
use App\Brand;
use App\Image;

class ProductController extends Controller
{
    //Show index page
    public function index(Request $request){

        $listProducts = Product::paginate(5);
        if ($request->ajax()) {
            return view('backend.product.table-data')->with('listProducts', $listProducts);
        }
        return view('backend.product.index')->with('listProducts', $listProducts);
    }

    //Show page add new Product
    public function create()
    {
        $listBrands = Brand::all();
        $listProductCategories = ProductCategory::all();
        return view('backend.product.create', ['listProductCategories' => $listProductCategories, 'listBrands' => $listBrands]);
    }

    //Store new Pruduct
    public function store(Request $request){       
        $validation = $request->validate([
            'product_image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            'product_images.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $newProduct = new Product();
        $newProduct->product_name = $request->product_name;
        $newProduct->product_slug = $request->product_slug;
        $newProduct->product_desc = $request->product_desc;
        $newProduct->product_quantity = $request->product_quantity;
        $newProduct->product_basis_price = $request->product_basis_price;
        $newProduct->product_price = $request->product_price;
        $newProduct->product_status = $request->product_status;
        $newProduct->pro_category_id = $request->pro_category_id;
        $newProduct->brand_id = $request->brand_id;      
        if($request->hasFile('product_image'))
        {
            $file = $request->product_image;

            // Lưu tên hình vào column product_image
            $newProduct->product_image = $file->getClientOriginalName();
            
            // Chép file vào thư mục "images"
            $fileSaved = $file->storeAs('public/images', $newProduct->product_image);
        }
        $newProduct->save();       
        // Lưu hình ảnh liên quan
        if($request->hasFile('product_images')) {
            $files = $request->product_images;
            // Duyệt từng ảnh và thực hiện lưu
            foreach ($files as $index => $file) {
                $file->storeAs('public/photos', $file->getClientOriginalName());
                // Tạo đối tưọng Image
                Image::insert([
                    'product_id' => $newProduct->product_id,
                    'img_name' => $file->getClientOriginalName()
                ]);
            }
        }
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        return redirect()->route('product.index');
    }

    //Delete item
    public function destroy(Request $request){
        if(is_array($request->id)){
            Product::destroy($request->id);
        }
        else{           
            $product = Product::where('product_id', $request->id)->first();
            $images = $product->images()->get();
            //Delete images of product
            if(empty($images) == false){
                foreach ($images as $image) {
                    Storage::delete('public/photos/'.$image->getName());
                    $image->delete();
                }
            }
            $product->delete();
            //Delete product_image of product
            Storage::delete('public/images/'.$product->product_image);
        }
        $listProducts = DB::table('products')->orderBy('product_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.product.table-data')->with('listProducts', $listProducts);
        }
        return view('backend.product.index')->with('listProducts', $listProducts);
    }
}
