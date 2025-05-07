<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    public function konfirm(Request $request){
        $product = Product::find($request->input('product_id'));

        return view('sale', compact('product'));
    }

    public function buy(Request $request){

        $customerId = session('customer');
        if (!$customerId) {
            return redirect('/login')->withErrors(['login-error' => 'Silakan login terlebih dahulu.']);
        }
        $customer = Customer::find($customerId);
        
        $product = Product::find($request->input('product_id'));
        $jumlah = $request->input('jumlah');
        $total_harga = $product->harga * $jumlah;

        $keterangan = $request->input('keterangan');
        if(!$keterangan){
            $keterangan = "-";
        }

        //mencatat semua perubahan ke sale tabel
        $sale = new Sale();
        $sale->count = $jumlah;
        $sale->saldo_awal = $customer->saldo;

        if($customer->saldo < $total_harga ){
            return redirect()->back()->withInput()->withErrors(['saldo' => "saldo tidak cukup"]);
        }

        //pengurangan saldo customer
        $customer->saldo -= $total_harga;
        $customer->save(); 

        //pengurangan stok
        $product->stok -= $jumlah;
        $product->save();

        $sale->product_id = $product->id;
        $sale->customer_id = $customer->id;
        $sale->saldo_akhir = $customer->saldo;
        $sale->keterangan = $keterangan;
        $sale->save();

        return redirect('/home');
    }
}
