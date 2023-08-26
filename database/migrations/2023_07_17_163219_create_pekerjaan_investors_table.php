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
        Schema::create('pekerjaan_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->string('nama_pekerjaan');
            $table->string('nama_perusahaan')->nullable();
            $table->enum('jabatan',['komisaris','direksi','manajer','staf','pemilik','pengawas','lainnya'])->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('kota_perusahaan')->nullable();
            $table->string('provinsi_perusahaan')->nullable();
            $table->string('kode_pos_perusahaan')->nullable();
            $table->string('telpon_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('fax_perusahaan')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('lama_bekerja')->nullable();
            $table->enum('sumber_penghasilan_utama',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya'])->nullable();
            $table->string('penghasilan_lainnya')->nullable();
            $table->enum('sumber_penghasilan_lainnya',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya']);
            $table->enum('sumber_dana_investasi',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya']);
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
        Schema::dropIfExists('pekerjaan_investors');
    }
};
