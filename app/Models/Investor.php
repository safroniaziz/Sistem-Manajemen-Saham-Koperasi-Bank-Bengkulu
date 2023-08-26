<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nomor_register',
        'nama_investor',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'kewarganegaraan',
        'jenis_rekening',
        'profil_resiko_nasabah',
        'jenis_kelamin',
        'nomor_ktp',
        'tanggal_kadaluarsa_ktp',
        'nomor_npwp',
        'tanggal_registrasi_npwp',
        'nama_ahli_waris',
        'hubungan_ahli_waris',
        'is_verified',
    ];

    public function persetujuanInvestor()
    {
        return $this->hasOne(PersetujuanInvestor::class, 'investor_id');
    }

    public function dokumenPendukungInvestor()
    {
        return $this->hasOne(DokumenPendukungInvestor::class, 'investor_id');
    }

    public function pasanganOrangTuaInvestor()
    {
        return $this->hasOne(PasanganOrangTuaInvestor::class, 'investor_id');
    }

    public function identitasInvestor()
    {
        return $this->hasOne(IdentitasInvestor::class, 'investor_id');
    }

    public function pekerjaanInvestor()
    {
        return $this->hasOne(PekerjaanInvestor::class, 'investor_id');
    }

    public function korespondensi()
    {
        return $this->hasOne(Korespondensi::class, 'investor_id');
    }

    public function sahamInvestor()
    {
        return $this->hasOne(SahamInvestor::class, 'investor_id');
    }
}

