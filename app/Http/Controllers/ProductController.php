<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function filter(Request $request)
    {
        $customerId = session('customer');
        if (!$customerId) {
            return redirect('/login')->withErrors(['login-error' => 'Silakan login terlebih dahulu.']);
        }
        $customer = Customer::find($customerId);

        $selectedCategories = $request->input('categories', []);
        
        if (in_array('all', $selectedCategories) || empty($selectedCategories)) {
            $products = Product::with('categories')->get();
        } else {
            $products = Product::whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('name', $selectedCategories);
            })->with('categories')->get();
        }

        return view('home', compact('products','customer'));
    }
}
