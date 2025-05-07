<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('total_harga')->nullable('false');
            $table->integer('harga_satuan')->nullable('false');
            $table->integer('jumlah')->nullable('false');

            $table->foreignId('products_id')->constrained()->onDelete('cascade');
            $table->foreignId('pelanggans_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
