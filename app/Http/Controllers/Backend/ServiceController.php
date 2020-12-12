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
        Session::flash('alert-info', 'Thêm mới thành công!!!');
        return redirect()->route('service.index');    
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
        $service = Service::find($id);
        return view('backend.service_page.edit', ['service' => $service]);
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
