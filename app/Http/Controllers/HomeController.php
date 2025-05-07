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
        // dd($products->categories[1]->name);

        return view('home', compact('customer', 'products'));
    }
}
