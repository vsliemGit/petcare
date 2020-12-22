<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Banner;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function index(){
        $listBanners = DB::table('banners')->paginate(9);
        return view('backend.banner.index', ['listBanners' => $listBanners]);
    }

    public function changeStatus(Request $request){
        try{
            $banner = Banner::where("banner_id", $request->id)->first();
            $status =  $request->value;
            if($status == 0){
                $banner->update(['banner_status' => 1]);
                $today = Carbon::now();;
                $banner->banner_updated_at =  $today->format('Y-m-d H:i:s');
                $banner->save();
                
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'banner_p' => '<a data-id="'.$banner->banner_id.'" data-status="1" href="javascript:void(0)" class="change-item" ><span class="fa fa-check-square-o text-success text-active"> Show</span></a>'
                ]);
            }else if($status == 1){
                $banner->update(['banner_status' => 0]);  
                $today = Carbon::now();;
                $banner->banner_updated_at =  $today->format('Y-m-d H:i:s');
                $banner->save();
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'banner_p' => '<a data-id="'.$banner->banner_id.'" data-status="0" href="javascript:void(0)" class="change-item" ><span class="fa fa-square-o text"> Hide</span></a>'
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'code' => 500,
                'type' => 'error',
                'message' => $e
            ]);
        }  
    }

    public function destroy(Request $request)
    {
        $id = $request->banner_id;
        $banner = Banner::where("banner_id", $id)->first();
        $banner->delete();
                
        $listBanners = Banner::paginate(9);
        return redirect()->route('banner.index');
    }

}
