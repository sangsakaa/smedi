<?php

namespace App\Models;


use App\Models\Report;
use App\Models\Histori;
use App\Models\Pengurus;
use App\Models\Kelassantri;
use App\Models\Asramasantri;
use App\Models\Historipelanggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Santri extends Model
{
    use HasFactory;
    protected $table = "santri";
    protected $fillable = ['status_santri'];
    protected $dates = ['created_at'];
    protected $timestamps = true;



    public function historiTerakhir()
    {
        return $this->hasOne(Histori::class)->latestOfMany();
    }

    public function asramaTerakhir()
    {
        return $this->hasOne(Asramasantri::class)->latestOfMany();
    }

    public function kelasTerakhir()
    {
        return $this->hasOne(Kelassantri::class)->latestOfMany();
    }



    public function histori()
    {
        return $this->hasMany(Histori::class, 'histori_id', 'id');
    }
    public function asrama()
    {
        return $this->belongsTo(Asramasantri::class, 'santri_id', 'id');
    }
    // 

    public function historiPelanggaran()
    {
        return $this->hasMany(Historipelanggaran::class);
    }
    public function santriPengurus()
    {
        return $this->hasMany(Pengurus::class, 'santri_id', 'id');
    }
    public function santriAsrama()
    {
        return $this->hasMany(Asramasantri::class, 'asramasantri_id', 'id');
    }

    //  kelas santri
    public function santriReport()
    {
        return $this->hasMany(Report::class, 'asramasantri_id', 'id');
    }
    public function kelassantri()
    {
        return $this->hasMany(kelassantri::class, 'asramasantri_id', 'id');
    }
}