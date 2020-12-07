<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Cart;
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

    public function guard()
    {
        return Auth::guard('customer');
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
            Cart::instance('cart')->restore(strval(Auth::guard('customer')->user()->id));
            Cart::instance('wishlist')->restore(Auth::guard('customer')->user()->username);
            return redirect()->intended(route('frontend.home'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));       
    }

    public function logout()
    {
        if(Auth::guard('customer')->check()){
            if(Cart::instance('cart')->count() > 0){
                Cart::instance('cart')->store(strval(Auth::guard('customer')->user()->id));
            }
            if(Cart::instance('wishlist')->count() > 0){
                Cart::instance('wishlist')->store(Auth::guard('customer')->user()->username); 
            }
        }
        Session::flush();
        Auth::logout();
        return back();
    }

}
