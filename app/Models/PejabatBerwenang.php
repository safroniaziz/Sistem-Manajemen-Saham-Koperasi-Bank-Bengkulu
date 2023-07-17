<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PejabatBerwenang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_pejabat_berwenang',
        'email',
    ];

    public function persetujuanInvestor()
    {
        return $this->hasMany(PersetujuanInvestor::class, 'pejabat_berwenang_id');
    }
}
