<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Presensi;
use App\Models\Asramasantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sesikelas extends Model
{
    use HasFactory;
    protected $table = "sesi_kelas";

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'sesi_id', 'id');
    }
    public function getHitungAttribute()
    {
        return $this->hasMany(Asramasantri::class)->whereAsramaId($this->id)->count();
    }
}