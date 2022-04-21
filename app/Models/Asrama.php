<?php

namespace App\Models;

use App\Models\Santri;
use App\Models\Pengurus;
use App\Models\Asramasantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asrama extends Model
{
    use HasFactory;
    protected $table = "asrama";
    protected $Appends =['hitung'];

    public function getHitungAttribute(){
    return $this->hasMany(Asramasantri::class)->whereAsramaId($this->id)->count();    
    }

    public function asrama()
    {
        return $this->belongsTo(Asramasantri::class,'asrama_id','id');
    }
    public function asramapondok()
    {
        return $this->belongsTo(Santri::class,'santri_id','id');
    }
    public function asramaPengurus()
    {
        return $this->belongsTo(Pengurus::class,'asrama_id','id');
    }
    



}