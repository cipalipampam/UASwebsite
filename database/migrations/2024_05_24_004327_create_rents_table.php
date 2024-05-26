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
        Schema::create('rents', function (Blueprint $table) {
            $table->id(); // Primary key with default name 'id'
            $table->date('tgl_sewa');
            $table->decimal('bayar', 10, 2);
            $table->enum('status', ['paid', 'unpaid']);
            $table->decimal('total', 10, 2);
            $table->date('tgl_bayar')->nullable(); // Make tgl_bayar nullable
            $table->string('NIK', 20); // Adjust string length if necessary
        
            // Define foreign key constraint
            $table->foreign('NIK')->references('NIK')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
