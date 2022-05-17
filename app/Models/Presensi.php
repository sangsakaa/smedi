<?php

namespace App\Models;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $table = "absensi_kelas";

    public function santri()
    {
        return $this->belongsTo(Santri::class,'santri_id','id');
    }
}