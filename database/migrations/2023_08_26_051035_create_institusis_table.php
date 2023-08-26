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
        Schema::create('institusis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_investor');
            $table->string('nomor_register');
            $table->string('nomor_cif')->nullable();
            $table->unsignedInteger('agen_pemasaran_id');
            $table->unsignedInteger('pejabat_berwenang_id_1');
            $table->unsignedInteger('pejabat_berwenang_id_2')->nullable();
            $table->string('nama_institusi');
            $table->string('kota_institusi');
            $table->string('provinsi_institusi');
            $table->string('negara_institusi');
            $table->string('kode_pos_institusi');
            $table->string('email_kantor')->nullable();
            $table->string('telephone_kantor');
            $table->enum('domisili',['lokal','asing']);
            $table->enum('tipe_perusahaan',['pt','yayasan','dana_pensiun','asuransi','keuangan','efek','koperasi','lainnya']);
            $table->enum('karakteristik',['bumn','swasta','pma','bumd','keluarga','patungan','afiliasi','lainnya']);
            $table->string('bidang_usaha');
            $table->string('nomor_akta_pendirian');
            $table->date('tgl_akta_pendirian');
            $table->string('nomor_akta_perubahan_terakhir')->nullable();
            $table->string('tgl_akta_perubahan_terakhir')->nullable();
            $table->string('nomor_npwp')->nullable();
            $table->date('tgl_registrasi_npwp')->nullable();
            $table->string('nomor_siup')->nullable();
            $table->date('tgl_kadaluarsa_siup')->nullable();
            $table->string('nomor_skdp')->nullable();
            $table->date('tgl_kadaluarsa_skdp')->nullable();
            $table->string('nomor_tdp')->nullable();
            $table->date('tgl_kadaluarsa_tdp')->nullable();
            $table->string('nomor_izin_pma')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institusis');
    }
};
