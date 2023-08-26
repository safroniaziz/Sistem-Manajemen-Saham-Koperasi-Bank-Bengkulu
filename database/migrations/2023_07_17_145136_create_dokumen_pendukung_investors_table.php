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
        Schema::create('dokumen_pendukung_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->boolean('ktp');
            $table->boolean('npwp');
            $table->boolean('form_profil_resiko_pemodal');
            $table->boolean('bukti_setoran_investasi_awal');
            $table->boolean('contoh_tanda_tangan');
            $table->boolean('formulir_fatca')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('investor_id')->references('id')->on('investors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendukung_investors');
    }
};
