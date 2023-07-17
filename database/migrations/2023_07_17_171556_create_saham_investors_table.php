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
        Schema::create('saham_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->string('nomor_sk3s');
            $table->string('seri_spmpkop');
            $table->integer('seri_formulir');
            $table->string('jumlah_saham');
            $table->string('jumlah_saham_terbilang');
            $table->enum('jenis_mata_uang',['idr','usd']);
            $table->string('pembayaran_nomor_rekening');
            $table->string('pembayaran_nama_rekening');
            $table->string('pembayaran_nama_bank');
            $table->unsignedBigInteger('investor_id_lama')->nullable();
            $table->string('nomor_sk3s_lama')->nullable();
            $table->string('jumlah_lembar')->nullable();
            $table->string('nomor_saham')->nullable();
            $table->date('tanggal_ditetapkan')->nullable();
            $table->integer('perubahan_ke')->default(0);
            $table->boolean('is_verified')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('investor_id')->references('id')->on('investors');
            $table->foreign('investor_id_lama')->references('id')->on('investors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saham_investors');
    }
};
