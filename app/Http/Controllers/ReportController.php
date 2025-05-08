<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
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
    public function delete_report(Request $request){

        $sale_id = $request->input('report_id');

        $sale = Sale::find($sale_id);

        $sale->delete();

        return redirect()->back()->with('success', 'Report berhasil dihapus.');
    }
}
