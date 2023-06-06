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
        Schema::create('klub_bola', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klub');
            $table->string('nama_manager');
            $table->string('logo');
            $table->uuid('negara_id');
            $table->foreign('negara_id')->references('id')->on('negara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klub');
    }
};
