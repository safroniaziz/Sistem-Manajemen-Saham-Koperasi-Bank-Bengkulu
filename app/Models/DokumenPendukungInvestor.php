<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenPendukungInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'ktp',
        'npwp',
        'from_profil_resiko_pemodal',
        'bukti_setoran_investasi_awal',
        'contoh_tanda_tangan',
        'formulir_fatca',
    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }
}
