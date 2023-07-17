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
        Schema::create('persetujuan_investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->unsignedBigInteger('agen_pemasaran_id');
            $table->unsignedBigInteger('pejabat_berwenang_id');
            $table->boolean('ttd_agen_pemasaran');
            $table->date('tanggal_agen_pemasaran');
            $table->boolean('status_persetujuan');
            $table->boolean('ttd_pejabat_berwenang');
            $table->date('tanggal_pejabat_berwenang');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('investor_id')->references('id')->on('investors');
            $table->foreign('agen_pemasaran_id')->references('id')->on('agen_pemasarans');
            $table->foreign('pejabat_berwenang_id')->references('id')->on('pejabat_berwenangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_investors');
    }
};
