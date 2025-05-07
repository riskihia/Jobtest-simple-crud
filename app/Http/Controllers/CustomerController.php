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

    public function show_register(){
        return view('register');
    }

    public function register(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        
        $customer = Customer::where('username', $username)->first();
        if($customer){
            return redirect()->back()->withInput()->withErrors(["register-error"=> "Customer already exist"]);
        }

        $customer = new Customer();
        $customer->username = $username;
        $customer->password = bcrypt($password);
        $customer->saldo = 10000; //defaultnya 10k aja
        $customer->save();

        session(['customer_id' => $customer->id]);
        return redirect('/home');
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
        $customer = Customer::find(session('customer_id'));

        return view('profile')->with('customer', $customer);
    }

    public function topup(Request $request){
        $customer = Customer::find($request->input('customer_id'));
        $nominal = $request->input('nominal_topup');

        $customer->saldo += $nominal;
        $customer->save();

        return redirect()->back();
    }

    public function update_contact(Request $request){
        $customer = Customer::find(session('customer_id'));

        $contact_number = $request->input('contact');

        if($contact_number === $customer->kontak){
            return redirect()->back()->withInput()->withErrors(["contact-error" => "Tidak ada perubahan"]);
        }

        $customer->kontak = $contact_number;
        $customer->save();

        return redirect()->back();
    }
}