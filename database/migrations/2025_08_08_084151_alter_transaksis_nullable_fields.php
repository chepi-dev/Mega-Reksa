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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->float('Berat')->nullable()->change();
            $table->float('Tarif_Pertama')->nullable()->change();
            $table->float('Tarif_Selanjutnya')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->float('Berat')->nullable(false)->change();
            $table->float('Tarif_Pertama')->nullable(false)->change();
            $table->float('Tarif_Selanjutnya')->nullable(false)->change();
        });
    }
};
