<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgenPemasaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_agen_pemasaran',
        'email',
    ];

    public function persetujuanInvestor()
    {
        return $this->hasMany(PersetujuanInvestor::class, 'agen_pemasaran_id');
    }
}
