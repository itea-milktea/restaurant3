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
        Schema::create('hrms_r3_server_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middle_name');
            $table->integer('age');
            $table->bigInteger('contact');
            $table->string('birthday');
            $table->string('email');
            $table->string('address');
            $table->string('position');
            $table->string('ratings')->nullable();
            $table->string('reviews')->nullable();
            $table->string('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_profiles');
    }
};
