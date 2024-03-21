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
        Schema::create('hrms_r3_server_task', function (Blueprint $table) {
            $table->id();
            $table->string('task_type');
            $table->string('server_name');
            $table->string('client_invoice');
            $table->string('room_no');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_r3_server_task');
    }
};
