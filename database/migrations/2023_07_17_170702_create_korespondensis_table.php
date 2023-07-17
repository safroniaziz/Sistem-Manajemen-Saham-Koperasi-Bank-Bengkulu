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
        Schema::create('korespondensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->string('alamat_surat_menyurat_ktp')->nullable();
            $table->string('alamat_surat_menyurat_tempat_tinggal')->nullable();
            $table->string('alamat_surat_menyurat_lainnya')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_email')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_fax')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_alamat_surat_menyurat')->nullable();
            $table->string('tujuan_investasi')->nullable();
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
        Schema::dropIfExists('korespondensis');
    }
};
