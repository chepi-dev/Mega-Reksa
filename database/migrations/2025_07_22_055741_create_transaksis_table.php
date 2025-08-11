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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('Tanggal');
            $table->string('Nama_Customer');
            $table->string('AWB');
            $table->string('Nama_Barang');
            $table->string('Tujuan');
            $table->integer('Koli');
            $table->decimal('Berat');
            $table->decimal('Tarif_Pertama');
            $table->decimal('Tarif_Selanjutnya');
            $table->decimal('Total_Tarif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};