<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DateTime;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listProductCategories = Product_category::all();
        $listProductCategories = ProductCategory::paginate(5);
        return view('backend.product_category.index')->with('listProductCategories', $listProductCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([]);

        $newProdcutCategory = new ProductCategory;
        $newProdcutCategory->pro_category_name = $request->name;
        $newProdcutCategory->pro_category_slug = $request->slug;
        $newProdcutCategory->pro_category_desc = $request->desc;
        $newProdcutCategory->pro_category_status = $request->status;

        $newProdcutCategory->save();
        Session::flash('alert-info', 'Thêm mới "'. $newProdcutCategory->pro_category_name .'" thành công!!!');
        return redirect()->route('product_category.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::where("pro_category_id", $id)->first();
        return view('backend.product_category.edit')->with('productCategory', $productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([]);
        $productCategory = ProductCategory::where("pro_category_id", $id)->first();
        $productCategory->pro_category_name = $request->name;
        $productCategory->pro_category_slug = $request->slug;
        $productCategory->pro_category_desc = $request->desc;
        $productCategory->pro_category_status = $request->status;
        $today = new DateTime();
        $productCategory->pro_category_updated_at =  $today->format('Y-m-d H:i:s');
        $productCategory->save();
        Session::flash('alert-info', 'Cập nhật "'.$productCategory->pro_category_name.'" thành công!!!');
        return redirect()->route('product_category.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::where("pro_category_id", $id)->first();
        $productCategory->delete();
        Session::flash('alert-info', 'Xóa thành công!');
        return redirect()->route('product_category.index'); 
    }

    public function changeStatusProductCategory($id){ 
        $productCategory = ProductCategory::where("pro_category_id", $id)->first();
        $status = $productCategory->pro_category_status;
        if($status == 0){
            $productCategory->update(['pro_category_status' => 1]);
            $today = new DateTime();
            $productCategory->pro_category_updated_at =  $today->format('Y-m-d H:i:s');
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $productCategory->pro_category_name .'" thành active!');
        }else if($status == 1){
            $productCategory->update(['pro_category_status' => 0]);
            $today = new DateTime();
            $productCategory->pro_category_updated_at =  $today->format('Y-m-d H:i:s');
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $productCategory->pro_category_name .'" thành unactive!');
        }
        return redirect()->route('product_category.index'); 
    }
}
