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
        Schema::create('pasangan_orang_tua_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->string('nama_pasangan');
            $table->string('hubungan');
            $table->string('alamat_pasangan');
            $table->string('telepon_rumah_pasangan');
            $table->string('ponsel_pasangan');
            $table->string('pekerjaan_pasangan');
            $table->string('perusaan_pasangan')->nullable();
            $table->enum('jabatan_pasangan',['komisaris','direksi','manajer','staf','pemilik','pengawas','lainnya']);
            $table->string('alamat_perusahan_pasangan')->nullable();
            $table->string('kota_perusahan_pasangan')->nullable();
            $table->string('provinsi_perusahaan_pasangan')->nullable();
            $table->string('kode_pos_perusahaan_pasangan')->nullable();
            $table->string('telpon_perusahaan_pasangan')->nullable();
            $table->string('email_perusahaan_pasangan')->nullable();
            $table->string('fax_perusahaan_pasangan')->nullable();
            $table->string('jenis_usaha_pasangan')->nullable();
            $table->string('lama_bekerja_pasangan')->nullable();
            $table->string('penghasilan_kotor_per_tahun-pasangan')->nullable();
            $table->enum('sumber_penghasilan_utama_pasangan',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya']);
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
        Schema::dropIfExists('pasangan_orang_tua_investors');
    }
};
