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
        Schema::create('oddo_in', function (Blueprint $table) {
            $table->id();
            $table->string('kendaraan_id');
            $table->string('user_id');
            $table->string('oddometer');
            $table->string('foto_oddo_meter')->nullable();
            $table->string('safety_tools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oddo_in');
    }
};
