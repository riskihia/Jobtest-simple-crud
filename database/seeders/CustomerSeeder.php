<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::create([
            "username"=>"riski hia",
            "password"=>bcrypt('rahasia'),
            "saldo"=>100000,
            "kontak"=>"12341234"
        ]);
        Customer::create([
            "username"=>"pelanggan test",
            "password"=>bcrypt('rahasia'),
            "saldo"=>50000,
            "kontak"=>"666777"
        ]);
    }
}
