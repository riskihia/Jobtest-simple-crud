<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homepage()
    {
        if (!session()->has('customer')) {
            return redirect('/login');
        }

        $customer = Customer::find(session('customer'));

        if (!$customer) {
            return redirect('/login'); 
        }

        $products = Product::all();
        // foreach($products as $product){
        //     echo($product->name);
        // }
        // dd("selesai");

        return view('home', compact('customer', 'products'));
    }
}
