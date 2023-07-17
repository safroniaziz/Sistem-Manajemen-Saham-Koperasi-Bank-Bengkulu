<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PekerjaanInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'nama_pekerjaan',
        'nama_perusahaan',
        'jabatan',
        'alamat_perusahaan',
        'kota_perusahaan',
        'provinsi_perusahaan',
        'kode_pos_perusahaan',
        'telpon_perusahaan',
        'email_perusahaan',
        'fax_perusahaan',
        'jenis_usaha',
        'lama_bekerja',
        'sumber_penghasilan_utama',
        'penghasilan_lainnya',
        'sumber_penghasilan_lainnya',
        'sumber_dana_investasi',

    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }
}
