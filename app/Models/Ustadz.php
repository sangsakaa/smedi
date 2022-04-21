<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ustadz extends Model
{
    use HasFactory;
    protected $table = "ustadz";
    
    public function getKhitmadAttribute()
    {
        $tanggal_masuk = new Carbon($this->tanggal_masuk);
        return  $tanggal_masuk->diff(now())->y;
    }
    
}