<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perangkat extends Model
{
    use HasFactory;
    protected $table = "perangkat";
    public function getKhitmadAttribute()
    {
        $tgl_masuk = new Carbon($this->tgl_masuk);
        return  $tgl_masuk->diff(now())->y;
    }
}