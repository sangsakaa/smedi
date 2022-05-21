<?php

namespace App\Models;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'absensi_kelas';

    public function santri()
    {
        return $this->belongsTo(Kelassantri::class, 'kelassantri_id', 'id');
    }
    public function getKelasAttribute()
    {
        return $this->hasMany(Presensi::class)->whereKelassantriId($this->id)->count();
    }
}