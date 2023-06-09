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
        Schema::create('pemain', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama');
            $table->char('nomor_punggung',2);
            $table->string('posisi');
            $table->string('foto');
            $table->uuid('klub_id');
            $table->foreign('klub_id')->references('id')->on('klub');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemain');
    }
};
