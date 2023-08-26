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
        Schema::create('identitas_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->string('alamat_ktp');
            $table->string('rt_ktp');
            $table->string('rw_ktp');
            $table->string('kelurahan_ktp');
            $table->string('kecamatan_ktp');
            $table->string('kota_ktp');
            $table->string('provinsi_ktp');
            $table->string('kode_pos_ktp');
            $table->string('alamat_tempat_tinggal');
            $table->string('rt_tempat_tinggal');
            $table->string('rw_tempat_tinggal');
            $table->string('kelurahan_tempat_tinggal');
            $table->string('kecamatan_tempat_tinggal');
            $table->string('kota_tempat_tinggal');
            $table->string('provinsi_tempat_tinggal');
            $table->string('kode_pos_tempat_tinggal');
            $table->string('telpon_rumah');
            $table->string('ponsel');
            $table->string('lama_menempati');
            $table->enum('status_rumah_tinggal',['milik_sendiri','sewa','lainnya']);
            $table->enum('agama',['islam','protestan','katolik','hindu','buddha','konghucu','lainnya']);
            $table->enum('pendidikan_terakhir',['sma','d3','s1','s2','s3','lainnya']);
            $table->string('nama_gadis_ibu_kandung');
            $table->string('emergency_kontak');
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
        Schema::dropIfExists('identitas_investors');
    }
};
