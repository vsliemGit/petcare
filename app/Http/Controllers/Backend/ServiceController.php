<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Session;
use DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listServices = Service::paginate(5);
        if ($request->ajax()) {
            return view('backend.service_page.table-data')->with('listServices', $listServices);
        }
        return view('backend.service_page.index')->with('listServices', $listServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service_page.create');
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
            'service_image' => 'required|file|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        $newService = new Service();
        $newService->service_name = $request->service_name;
        $newService->service_slug = $request->service_slug;
        $newService->service_desc = $request->service_desc;
        $newService->service_price = $request->service_price;
        $newService->service_status = $request->service_status;   
        if($request->hasFile('service_image'))
        {
            $file = $request->service_image;

            // Lưu tên hình vào column service_image
            $newService->service_image = $file->getClientOriginalName();
            
            // Chép file vào thư mục "images"
            $fileSaved = $file->storeAs('public/images/services', $newService->service_image);
        }
        $newService->save();

        DB::table('service_details')->insert([
            'service_detail_content' => 'detail service '.$newService->service_name,
            'service_id' => $newService->service_id
        ]);

        Session::flash('alert-info', 'Thêm mới thành công!!!');
        return redirect()->route('service.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $service = DB::table('services')->where('service_id', $id)->first();
        $service_detail = DB::table('service_details')->where('service_id', $id)->first();
        return view('backend.service_page.service-detail', ['service' => $service, 'data' => $service_detail]);

    }

    public function updateDetail(Request $request, $id)
    {
        $detail = DB::table('service_details')->where('service_detail_id', $id);
        $detail->update([
            'service_detail_content' => $request->service_content,
            'service_detail_status' => $request->service_detail_status
        ]);

        if($request->hasFile('service_detail_image'))
        {
            $file = $request->service_detail_image;

            // Lưu tên hình vào column product_image
            DB::table('service_details')->where('service_detail_id', $id)
            ->update([
                'service_detail_image' => $file->getClientOriginalName(),
            ]);
            
            // Chép file vào thư mục "images"
            $fileSaved = $file->storeAs('public/images/services/service_details', $file->getClientOriginalName());
        }
        
        Session::flash('alert-info', 'Cập nhật thành công!!!');
        return redirect()->route('service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('backend.service_page.edit', ['service' => $service]);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
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
        $service = Service::find($id);
        $service->service_name = $request->service_name;
        $service->service_slug = $request->service_slug;
        $service->service_desc = $request->service_desc;
        $service->service_price = $request->service_price;
        $service->service_status = $request->service_status;
        if($request->hasFile('service_image'))
        {
            $file = $request->service_image;

            // Lưu tên hình vào column service_image
            $service->service_image = $file->getClientOriginalName();
            
            // Chép file vào thư mục "images"
            $fileSaved = $file->storeAs('public/images/services', $service->service_image);
        }
        $service->save();
        Session::flash('alert-info', 'Cập nhật thành công!!!');
        return redirect()->route('service.index');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(is_array($request->id)){
            Service::destroy($request->id);
        }
        else{           
            $service = Service::where('service_id', $request->id)->first();
            $service->delete();
        }
        $listServices = DB::table('services')->orderBy('service_created_at', 'desc')->paginate(5);
        if($request->ajax()){
            return view('backend.service_page.table-data')->with('listServices', $listServices);
        }
        // return view('backend.service_page.index')->with('listServices', $listServices);
    }
}
