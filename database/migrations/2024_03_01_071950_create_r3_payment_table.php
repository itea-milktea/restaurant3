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
        Schema::create('hrms_r3_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acc_id');
            $table->string('invoice_no');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('item_name');
            $table->string('category');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('status');
            $table->foreign('acc_id')->references('id')->on('hrms_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r3_payment');
    }
};
