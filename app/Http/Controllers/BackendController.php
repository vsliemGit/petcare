<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //Show home page backend
    public function showHome(){
        return view('backend.layouts.index');
    }

    //Show register form
    public function login(){
        return view('backend.pages.login');
    }

    //Show login form
    public function register(){
        return view('backend.pages.register');
    }

}
