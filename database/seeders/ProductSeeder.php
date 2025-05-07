<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            "name"=>"meja",
            "harga"=>1200,
            "stok"=>14
        ]);
        Product::create([
            "name"=>"kursi",
            "harga"=>800,
            "stok"=>32
        ]);

        Product::create([
            "name"=>"mobil",
            "harga"=>23000,
            "stok"=>5
        ]);
        Product::create([
            "name"=>"sepeda",
            "harga"=>11000,
            "stok"=>8
        ]);


        Product::create([
            "name"=>"kompor",
            "harga"=>17000,
            "stok"=>9
        ]);
        Product::create([
            "name"=>"kulkas",
            "harga"=>21000,
            "stok"=>3
        ]);
    }
}
