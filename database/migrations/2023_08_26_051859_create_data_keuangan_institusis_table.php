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
        Schema::create('data_keuangan_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institusi_id');
            $table->string('aset_keuangan_tahun_1')->nullable();
            $table->string('aset_keuangan_tahun_2')->nullable();
            $table->string('aset_keuangan_tahun_3')->nullable();
            $table->string('laba_keuangan_tahun_1')->nullable();
            $table->string('laba_keuangan_tahun_2')->nullable();
            $table->string('laba_keuangan_tahun_3')->nullable();
            $table->enum('sumber_dana',['hasil_usaha','dana_pensiun','bunga_simpanan','hasil_investasi','lainnya']);
            $table->enum('tujuan_investasi',['kenaikan_harga','investasi','spekulasi','penghasilan','lainnya']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_keuangan_institusis');
    }
};
