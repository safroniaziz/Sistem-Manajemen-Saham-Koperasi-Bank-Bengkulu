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
        Schema::create('dokumen_pendukung_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institusi_id');
            $table->enum('kelengkapan_dokumen',['ada','tidak']);
            $table->enum('profil_resiko',['ada','tidak']);
            $table->enum('bukti_setoran',['ada','tidak']);
            $table->enum('ttd_penerima_kuasa',['ada','tidak']);
            $table->enum('fatca',['ada','tidak']);
            $table->enum('persetujuan',['ada','tidak']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendukung_institusis');
    }
};
