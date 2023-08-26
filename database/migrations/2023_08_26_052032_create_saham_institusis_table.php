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
        Schema::create('saham_institusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institusi_id');
            $table->string('nomor_sk3s')->length('30');
            $table->string('seri_spmpkop')->length(10);
            $table->unsignedInteger('seri_formulir')->length(11);
            $table->string('jumlah_saham')->length(30);
            $table->text('terbilang_saham');
            $table->string('jumlah_lembar');
            $table->string('nomor_saham');
            $table->date('tanggal_ditetapkan');
            $table->enum('jenis_mata_uang',['idr','usd']);
            $table->string('pembayaran_no_rek')->length(40);
            $table->string('pembayaran_nm_rek')->length(100);
            $table->string('pembayaran_nm_bank')->length(100);
            $table->string('institusi_id_lama')->nullable();
            $table->string('nomor_sk3s_lama')->nullable();
            $table->string('perubahan_ke')->default('0');
            $table->enum('status_verifikasi',['0','1','2','3'])->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saham_institusis');
    }
};
