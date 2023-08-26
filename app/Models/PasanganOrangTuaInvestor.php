<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasanganOrangTuaInvestor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'investor_id',
        'nama_pasangan',
        'hubungan',
        'alamat_pasangan',
        'telepon_rumah_pasangan',
        'ponsel_pasangan',
        'pekerjaan_pasangan',
        'perusahaan_pasangan',
        'jabatan_pasangan',
        'alamat_perusahan_pasangan',
        'kota_perusahan_pasangan',
        'provinsi_perusahaan_pasangan',
        'kode_pos_perusahaan_pasangan',
        'telpon_perusahaan_pasangan',
        'email_perusahaan_pasangan',
        'fax_perusahaan_pasangan',
        'jenis_usaha_pasangan',
        'lama_bekerja_pasangan',
        'penghasilan_kotor_per_tahun',
        'sumber_penghasilan_utama_pasangan',

    ];

    public function investor()
    {
        return $this->belongsTo(investor::class, 'investor_id');
    }
}
