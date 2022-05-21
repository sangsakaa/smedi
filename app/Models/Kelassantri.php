<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelassantri extends Model
{
    use HasFactory;
    protected $table = "kelassantri";
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id', 'id');
    }
    public function asrama()
    {
        return $this->belongsTo(asrama::class, 'asrama_id', 'id');
    }
    public function AsramaSantri()
    {
        return $this->belongsTo(Asramasantri::class, 'asramasantri_id', 'id');
    }
    public function getHitungAttribute()
    {
        return $this->hasMany(Kelassantri::class)->whereAsramaId($this->id)->count();
    }
    public function kelassantri()
    {
        return $this->belongsTo(Presensi::class, 'kelassantri_id', 'id');
    }
}