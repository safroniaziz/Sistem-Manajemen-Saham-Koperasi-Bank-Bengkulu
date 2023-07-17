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
        'profil_resiko_nasaba',
        'jenis_kelamin',
        'nomor_ktp',
        'tanggal_kadaluarsa_ktp',
        'nomor_npwp',
        'tanggal_registrasi_npwp',
        'is_verified',
    ];

    public function persetujuanInvestor()
    {
        return $this->hasMany(PersetujuanInvestor::class, 'investor_id');
    }

    public function dokumenPendukungInvestor()
    {
        return $this->hasMany(DokumenPendukungInvestor::class, 'investor_id');
    }

    public function pasanganOrangTuaInvestor()
    {
        return $this->hasMany(PasanganOrangTuaInvestor::class, 'investor_id');
    }

    public function identitasInvestor()
    {
        return $this->hasMany(IdentitasInvestor::class, 'investor_id');
    }

    public function pekerjaanInvestor()
    {
        return $this->hasMany(PekerjaanInvestor::class, 'investor_id');
    }

    public function korespondensi()
    {
        return $this->hasMany(Korespondensi::class, 'investor_id');
    }

    public function sahamInvestor()
    {
        return $this->hasMany(SahamInvestor::class, 'investor_id');
    }
}

