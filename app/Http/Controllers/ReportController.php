<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(){
        $customerId = session('customer_id');
        
        $customer = Customer::find($customerId);

        $reports = $customer->sales()->get();

        return view('report')->with('reports', $reports);
    }
}
