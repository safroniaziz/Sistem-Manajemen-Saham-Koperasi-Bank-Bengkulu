<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institusi extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function dataKeuangan()
    {
        return $this->hasOne(DataKeuanganInstitusi::class, 'institusi_id');
    }

    public function dokumenPendukung()
    {
        return $this->hasOne(DokumenPendukungInstitusi::class, 'institusi_id');
    }

    public function instruksiPembayaran()
    {
        return $this->hasOne(InstruksiPembayaranInstitusi::class, 'institusi_id');
    }

    public function pemegangSaham()
    {
        return $this->hasOne(PemegangSahamInstitusi::class, 'institusi_id');
    }

    public function penerimaKuasaTransaksi()
    {
        return $this->hasOne(PenerimaKuasaTransaksiInstitusi::class, 'institusi_id');
    }

    public function susunanDireksi()
    {
        return $this->hasMany(SusunanDireksiInstitusi::class, 'institusi_id');
    }

    public function susunanKomisaris()
    {
        return $this->hasMany(SusunanKomisarisInstitusi::class, 'institusi_id');
    }

    public function sahamInstitusi()
    {
        return $this->hasMany(SahamInstitusi::class, 'institusi_id');
    }
}
