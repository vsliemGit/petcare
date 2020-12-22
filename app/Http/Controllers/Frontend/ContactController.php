<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Store;

class ContactController extends Controller
{
    function getStore(){
        $stores = Store::all();

        $map_markes = array ();

        foreach($stores as $key => $location){
            $map_markes[] = (object)array(
                'longitude' =>  $location->store_longitude,
                'latitude' => $location->store_latitude,
            );
        }
        return response()->json($map_markes);
    }
}
