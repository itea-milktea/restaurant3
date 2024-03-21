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
        Schema::create('hrms_r3_cart_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->integer('account_id');
            $table->string('item_name');
            $table->string('category');
            $table->integer('quantity');
            $table->string('status');
            $table->integer('total_price');
            $table->foreign('payment_id')->references('id')->on('hrms_r3_payment_info')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_r3_cart_payment');
    }
};
