<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;
use App\Brand;
use PDF;
use Excel;
use App\Exports\BrandsExport;
use App\Imports\BrandsImport;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listBrands = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
        if ($request->ajax()) {
            return view('backend.brand.table-data')->with('listBrands', $listBrands);
        }
        return view('backend.brand.index')->with('listBrands', $listBrands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
         
        $newBrand = new Brand;
        $newBrand->brand_name = $request->brand_name;
        $newBrand->brand_slug = $request->brand_slug;
        $newBrand->brand_desc = $request->brand_desc;
        $newBrand->brand_status = $request->brand_status;

        $newBrand->save();
        
        if($request->ajax()){
            $listBrands = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
            return view('backend.brand.table-data')->with('listBrands', $listBrands);
        }
        Session::flash('alert-info', 'Thêm mới "'. $newBrand->brand_name .'" thành công!!!');
        return redirect()->route('brand.index');     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where("brand_id", $id)->first();
        return view('backend.brand.edit')->with('brand', $brand);
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
        $brand = Brand::where("brand_id", $request->brand_id)->first();
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = $request->brand_slug;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->brand_updated_at = Carbon::now();
        $brand->save();
        if($request->ajax()){
            $listBrand = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
            return view('backend.brand.table-data')->with('listBrand', $listBrand);
        }
        Session::flash('alert-info', 'Cập nhật "'.$brand->brand_name.'" thành công!!!');
        return redirect()->route('brand.index'); 
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
            Brand::destroy($id);
        }
        else
        {
            $brand = Brand::where("brand_id", $id)->first();
            $brand->delete();
        }
        
        $listBrands = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.brand.table-data')->with('listBrands', $listBrands);
        }
        return view('backend.brand.index')->with('listBrands', $listBrands);
    }

    //Changing status of  item
    public function changeStatus(Request $request){ 
        $productCategory = Brand::where("brand_id", $request->id)->first();
        $status =  $request->value;
        if($status == 0){
            $brand->update(['brand_status' => 1]);
            $today = Carbon::now();;
            $brand->brand_updated_at =  $today->format('Y-m-d H:i:s');
            $brand->save();
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $brand->brand_name .'" thành active!');   
        }else if($status == 1){
            $brand->update(['brand_status' => 0]);  
            $today = Carbon::now();;
            $brand->brand_updated_at =  $today->format('Y-m-d H:i:s');
            $brand->save();
            Session::flash('alert-info', 'Cập nhật trạng thái của "'. $brand->brand_name .'" thành no active!');  
        }
        $listBrands = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.brand.table-data')->with('listBrands', $listBrands);
        }
        return redirect()->route('brand.index'); 
    }

    //Filter status
    public function filterStatus(Request $request){    
        $value = $request->value;
        $listBrands = brand::where('brand_status', '=' , $value )->paginate(5);
        if($request->ajax()){
            if($value == "all"){
                $listBrands = DB::table('brands')->orderBy('brand_created_at', 'desc')->paginate(5);
            }
            return view('backend.brand.table-data')->with('listBrands', $listBrands);
        }
        return view('backend.brand.index')->with('listBrands', $listBrands);
    }


    //Create file PDF
    public function createPDF(){
        $listProductCategories = DB::table('brands')->get();
        $pdf = PDF::loadView('backend.brand.pdf', compact('listProductCategories'));
        return $pdf->download('brands.pdf');
    }

    //Export file Excel
    public function exportExcel(){
        // return Excel::download(new ProductCategoriesExport, 'brands.xlsx');
        return Excel::download(new ProductCategoriesExport, 'brands.xlsx');
    }

    //Import file Excel
    public function importExcel(){
        Excel::import(new ProductCategoriesImport, request()->file('file'));         
        return back();
    }
}
