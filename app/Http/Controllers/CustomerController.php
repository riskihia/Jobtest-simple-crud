<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function index(){
        return redirect("/login");
    }
    public function show(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $username = $request->input('username');
        $password = $request->input('password');
    
        $customer = Customer::where('username', $username)->first();
    
        if (!$customer) {
            return redirect()->back()->withInput()->withErrors(['login-error' => 'Data tidak valid.']);
        }
    
        if (Hash::check($password, $customer->password)) {
            session(['customer_id' => $customer->id]);
            return redirect('/home');
        } else {
            return redirect()->back()->withInput()->withErrors(['login-error' => 'Data tidak valid.']);
        }
    }

    public function logout(){
        session()->forget('customer_id');
        
        return redirect('/login')->with('success', 'Anda telah logout.');
    }

    // PROFILE ##########
    public function profile_page(){
        return view('profile');
    }
}