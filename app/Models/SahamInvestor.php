<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SahamInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        // 'tanggal_ditetapkan' => 'date',
    ];

    protected $fillable = [
        'investor_id',
        'nomor_sk3s',
        'seri_spmpkop',
        'seri_formulir',
        'jumlah_saham',
        'jumlah_saham_terbilang',
        'jenis_mata_uang',
        'pembayaran_nomor_rekening',
        'pembayaran_nama_rekening',
        'pembayaran_nama_bank',
        'investor_id_lama',
        'nomor_sk3s_lama',
        'jumlah_lembar',
        'nomor_saham',
        'tanggal_ditetapkan',
        'perubahan_ke',
        'is_verified',

    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }

    public function investorLama()
    {
        return $this->belongsTo(investor::class, 'investor_id_lama');
    }
}
