<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Brand;
use DB;

class ServiceController extends Controller
{
    public function index(){
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        return view('frontend.pages.services')
        ->with('listProductCategories', $listProductCategories)
        ->with('listBrands', $listBrands);
    }

    public function service_single(){
        $listBrands = Brand::all();
        $listProductCategories = DB::table('product_categories')
            ->orderBy('pro_category_created_at', 'desc')->get();
        return view('frontend.pages.service-single')
        ->with('listProductCategories', $listProductCategories)
        ->with('listBrands', $listBrands);
    }

}
