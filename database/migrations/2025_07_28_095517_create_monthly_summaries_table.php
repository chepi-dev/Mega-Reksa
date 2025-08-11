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
        Schema::create('monthly_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->string('mounth')->comment('Format: YYYY-MM');
            $table->decimal('total_tarif', 15, 2)->default(0);
            $table->timestamps();
            $table->unique(['customer_id', 'mounth']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_summaries');
    }
};
