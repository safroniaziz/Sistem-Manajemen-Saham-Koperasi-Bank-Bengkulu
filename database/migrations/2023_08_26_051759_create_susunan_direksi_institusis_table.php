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
        Schema::create('susunan_direksi_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institusi_id');
            $table->string('nama_direksi');
            $table->string('nomor_identitas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susunan_direksi_institusis');
    }
};
