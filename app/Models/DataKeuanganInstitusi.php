<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKeuanganInstitusi extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function institusi()
    {
        return $this->belongsTo(Institusi::class , 'institusi_id');
    }
}
