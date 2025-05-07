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

        $customer = Customer::find(session('customer_id'));

        if (!$customer) {
            return redirect('/login'); 
        }

        $products = Product::all();

        return view('home', compact('customer', 'products'));
    }
}
