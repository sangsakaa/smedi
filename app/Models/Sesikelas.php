<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}