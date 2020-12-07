<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(Request $request){
        $listUsers = DB::table('users')->paginate(6);
        if ($request->ajax()) {
            return view('backend.user.table-data')->with('listUsers', $listUsers);
        }
        return view('backend.user.index')->with('listUsers', $listUsers);
    }
}
