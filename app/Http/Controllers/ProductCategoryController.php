<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;
use App\ProductCategory;
use PDF;
use Excel;
use App\Exports\ProductCategoriesExport;
use App\Imports\ProductCategoriesImport;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $listProductCategories = Product_category::all();
        $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
        if ($request->ajax()) {
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
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
        $validation = $request->validate([
        ]);
         
        $newProdcutCategory = new ProductCategory;
        $newProdcutCategory->pro_category_name = $request->pro_category_name;
        $newProdcutCategory->pro_category_slug = $request->pro_category_slug;
        $newProdcutCategory->pro_category_desc = $request->pro_category_desc;
        $newProdcutCategory->pro_category_status = $request->pro_category_status;

        $newProdcutCategory->save();
        
        if($request->ajax()){
            $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
        Session::flash('alert-info', 'Thêm mới "'. $newProdcutCategory->pro_category_name .'" thành công!!!');
        return redirect()->route('product_category.index');     
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
    public function update(Request $request)
    {
        $validation = $request->validate([]);
        $productCategory = ProductCategory::where("pro_category_id", $request->pro_category_id)->first();
        $productCategory->pro_category_name = $request->pro_category_name;
        $productCategory->pro_category_slug = $request->pro_category_slug;
        $productCategory->pro_category_desc = $request->pro_category_desc;
        $productCategory->pro_category_status = $request->pro_category_status;
        $productCategory->pro_category_updated_at = Carbon::now();
        $productCategory->save();
        if($request->ajax()){
            $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
        Session::flash('alert-info', 'Cập nhật "'.$productCategory->pro_category_name.'" thành công!!!');
        return redirect()->route('product_category.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        if (is_array($id)){
            ProductCategory::destroy($id);
        }
        else
        {
            $productCategory = ProductCategory::where("pro_category_id", $id)->first();
            $productCategory->delete();
        }
        
        $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
        return view('backend.product_category.index')->with('listProductCategories', $listProductCategories);
    }

    //Changing status of  item
    public function changeStatus(Request $request){ 
        $productCategory = ProductCategory::where("pro_category_id", $request->id)->first();
        $status =  $request->value;
        if($status == 0){
            $productCategory->update(['pro_category_status' => 1]);
            $today = Carbon::now();;
            $productCategory->pro_category_updated_at =  $today->format('Y-m-d H:i:s');
            $productCategory->save();
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $productCategory->pro_category_name .'" thành active!');   
        }else if($status == 1){
            $productCategory->update(['pro_category_status' => 0]);  
            $today = Carbon::now();;
            $productCategory->pro_category_updated_at =  $today->format('Y-m-d H:i:s');
            $productCategory->save();
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $productCategory->pro_category_name .'" thành no active!');  
        }
        $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
        return redirect()->route('product_category.index'); 
    }

    //Filter status
    public function filterStatus(Request $request){    
        $value = $request->value;
        $listProductCategories = ProductCategory::where('pro_category_status', '=' , $value )->paginate(5);
        if($request->ajax()){
            if($value == "all"){
                $listProductCategories = DB::table('product_categories')->orderBy('pro_category_created_at', 'desc')->paginate(5);
            }
            return view('backend.product_category.table-data')->with('listProductCategories', $listProductCategories);
        }
        return view('backend.product_category.index')->with('listProductCategories', $listProductCategories);
    }


    //Create file PDF
    public function createPDF(){
        $listProductCategories = DB::table('product_categories')->get();
        $pdf = PDF::loadView('backend.product_category.pdf', compact('listProductCategories'));
        return $pdf->download('product_categories.pdf');
    }

    //Export file Excel
    public function exportExcel(){
        // return Excel::download(new ProductCategoriesExport, 'product_categories.xlsx');
        return Excel::download(new ProductCategoriesExport, 'product_categories.xlsx');
    }

    //Import file Excel
    public function importExcel(){
        Excel::import(new ProductCategoriesImport, request()->file('file'));         
        return back();
    }
}
