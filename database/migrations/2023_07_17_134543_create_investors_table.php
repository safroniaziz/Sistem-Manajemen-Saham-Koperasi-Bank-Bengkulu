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
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_register');
            $table->string('nama_investor');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan',['menikah','belum_menikah','janda/dudu']);
            $table->enum('kewarganegaraan',['wni','wna']);
            $table->enum('jenis_rekening',['perorangan','nonperorangan']);
            $table->string('profil_resiko_nasabah');
            $table->string('jenis_kelamin');
            $table->string('nomor_ktp');
            $table->date('tanggal_kadaluarsa_ktp');
            $table->string('nomor_npwp');
            $table->date('tanggal_registrasi_npwp');
            $table->string('nama_ahli_waris');
            $table->string('hubungan_ahli_waris');
            $table->boolean('is_verified')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
