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
        Schema::create('hrms_r3_payment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acc_id');
            $table->string('invoice_no');
            $table->string('customer_name');
            $table->string('customer_email');    
            $table->string('payment_method');
            $table->string('payment_status');
            $table->integer('room_no');
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
        Schema::dropIfExists('hrms_r3_payment_info');
    }
};
