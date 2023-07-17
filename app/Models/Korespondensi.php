<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Korespondensi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'alamat_surat_menyurat_ktp',
        'alamat_surat_menyurat_tempat_tinggal',
        'alamat_surat_menyurat_lainnya',
        'pengiriman_konfirmasi_melalui_email',
        'pengiriman_konfirmasi_melalui_fax',
        'pengiriman_konfirmasi_melalui_alamat_surat_menyurat',
        'tujuan_investasi',
    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }
}
