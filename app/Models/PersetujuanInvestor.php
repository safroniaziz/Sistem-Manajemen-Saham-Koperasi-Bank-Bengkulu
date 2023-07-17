<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersetujuanInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'agen_pemasaran_id',
        'pejabat_berwenang_id',
        'ttd_agen_pemasaran',
        'tanggal_agen_pemasaran',
        'status_persetujuan',
        'ttd_pejabat_berwenang',
        'tanggal_pejabat_berwenang',
    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }

    public function agenPemasaran()
    {
        return $this->belongsTo(AgenPemasaran::class, 'agen_pemasaran_id');
    }

    public function pejabatBerwenang()
    {
        return $this->belongsTo(PejabatBerwenang::class, 'pejabat_berwenang_id');
    }
}
