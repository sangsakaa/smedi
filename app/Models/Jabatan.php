<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    public function jabatanPengurus()
    {
return $this->hasOne(Pengurus::class,'jabatan_id','id')->latestOfMany();
    }

}