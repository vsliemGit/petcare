<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //Show home page backend
    public function showHome(){
        return view('backend.playouts.index');
    }
}
