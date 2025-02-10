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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id'); 
            $table->unsignedBigInteger('car_id');
            $table->decimal('amount', 8, 2);
            $table->string('payment_method');
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('rental_id')->references('id')->on('reservations')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
