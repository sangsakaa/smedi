<?php

namespace App\Models;

use App\Models\Asrama;
use App\Models\Santri;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penugasan extends Model
{
    use HasFactory;
    protected $table = "penugasan";
    public function pengurusSantri()
    {
        return $this->belongsTo(Santri::class,'santri_id','id');
    }
    public function pengurusJabatan()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }
    public function pengurusAsrama()
    {
        return $this->belongsTo(Asrama::class,'asrama_id','id');
    }
}