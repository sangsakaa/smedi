<?php

namespace App\Models;

use App\Models\Kelassantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";

    public function kelassantri()
    {
        return $this->hasMany(Kelassantri::class,'kelas_id','id');
    }
}