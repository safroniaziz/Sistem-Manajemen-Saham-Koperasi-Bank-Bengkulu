<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentitasInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'alamat_ktp',
        'rt_ktp',
        'rw-ktp',
        'kelurahan_ktp',
        'kecamatan_ktp',
        'kota_ktp',
        'provinsi_ktp',
        'kode_pos_ktp',
        'alamat_tempat_tinggal',
        'rt_tempat_tinggal',
        'rw_tempat_tinggal',
        'kelurahan_tempat_tinggal',
        'kecamatan_tempat_tinggal',
        'kota_tempat_tinggal',
        'provinsi_tempat_tinggal',
        'kode_pos_tempat_tinggal',
        'telpon_rumah',
        'ponsel',
        'lama_menempati',
        'status_rumah_tinggal',
        'agama',
        'pendidikan_terakhir',
        'nama_gadis_ibu_kandung',
        'emergency_kontak',

    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }
}
