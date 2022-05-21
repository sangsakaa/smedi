<?php

namespace App\Models;

use App\Models\Asramasantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dashboard extends Model
{
    use HasFactory;
    protected $Appends = ['hitung'];
    public function getHitungAttribute()
    {
        return $this->hasMany(Asramasantri::class)->whereAsramaId($this->id)->count();
    }
    public function santri()
    {
        return $this->belongsTo(santri::class, 'santri_id', 'id');
    }
    public function getKelasAttribute()
    {
        return $this->hasMany(Kelassantri::class)->whereKelasId($this->id)->count();
    }
}