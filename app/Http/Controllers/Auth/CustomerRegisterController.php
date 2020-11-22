<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Customer;
use Auth;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerRegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function guard()
    {
        return Auth::guard('customer');
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'username' => ['required', 'string', 'max:255', 'unique:users'],
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed']
    //     ]);
    // }

    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email-signup' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        //     'password-signup' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // $request['password'] = Hash::make($request->password_signup);
        $customer = Customer::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email_signup,
            'password' => Hash::make($request->password_signup)
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->intended(route('frontend.home'));
    }

    // protected function create(Request $request)
    // { 
    //     // return Customer::create([
    //     //     'customer_username' => $data['username'],
    //     //     'customer_name' => $data['name'],
    //     //     'customer_email' => $data['email'],
    //     //     'customer_password' => Hash::make($data['password']),
    //     // ]);
    //     $this->validator($request->all())->validate();
    //     $customer = Customer::create([
    //         'username' => $request->username,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     return redirect()->intended('frontend.home');
    // }

    // public function create(Request $request)
    // {  
    //     // return dd($request);
    //     // request()->validate([
    //     //     'customer_username' => ['required', 'string', 'max:255', 'unique:users'],
    //     //     'customer_name' => ['required', 'string', 'max:255'],
    //     //     'customer_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     //     'customer_password' => ['required', 'string', 'min:8', 'confirmed']
    //     // ]);
         
    //     $data = $request->all();
 
    //     $check = Customer::create($data);
       
    //     return Redirect::to("home")->withSuccess('Great! You have Successfully loggedin');
    // }
}
