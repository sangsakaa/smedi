<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\Histori;
use App\Models\Santri;
use App\Models\Kelassantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asramasantri extends Model
{
    use HasFactory;
    protected $table = "asramasantri";

    public function santri()
    {
        return $this->belongsTo(santri::class, 'santri_id', 'id');
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Histori::class, 'histori_id', 'id');
    }
    public function asrama()
    {
        return $this->belongsTo(Asrama::class, 'asrama_id', 'id');
    }
    public function KelasAsramasantri()
    {
        return $this->belongsTo(Kelassantri::class, 'asramasantri_id', 'id');
    }
    public function Asramasantri()
    {
        return $this->belongsTo(santri::class, 'asramasantri_id', 'id');
    }
    public function Presensi()
    {
        return $this->belongsTo(Presensi::class, 'asramasantri_id', 'id');
    }
}