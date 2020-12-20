<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Brand;
use App\ServiceDetail;
use DB;

class ServiceController extends Controller
{
    public function index(){
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $listServices = DB::table('services')
            ->join('service_details', 'services.service_id', '=', 'service_details.service_id')
            ->select('services.service_name','services.service_desc','service_details.service_detail_id','service_details.service_detail_image')
            ->where('service_detail_status', 1)->paginate(5);
        return view('frontend.pages.services')
            ->with('listProductCategories', $listProductCategories)
            ->with('listBrands', $listBrands)
            ->with('listServices', $listServices);
    }
    

    public function service_single($id){
        $listBrands = Brand::all();      
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        $service_detail = DB::table('service_details')->where('service_id', $id)->first();
        ServiceDetail::find($id)->service()->increment('service_views');;

        return view('frontend.pages.service-detail')
        ->with('listProductCategories', $listProductCategories)
        ->with('service_detail', $service_detail)
        ->with('listBrands', $listBrands);
    }

}
