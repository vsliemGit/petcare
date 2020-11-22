<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

use App\Customer;
class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login-checkout');
    }

    public function username()
    {
        return 'email';
    }

    public function login(Request $request) //Go web.php then you will find this route
    {
        
        /// Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        // Attempt to log the user in
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('frontend.home'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));       
    }

    public function guard()
    {
        return Auth::guard('customer');
    }

}
