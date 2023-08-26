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
        Schema::create('pemegang_saham_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institusi_id');
            $table->string('nama_pemegang_saham');
            $table->string('komposisi_pemegang_saham');
            $table->date('tanggal_pernyataan');
            $table->string('yang_menyatakan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemegang_saham_institusis');
    }
};
