<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pondok extends Model
{
    use HasFactory;
    protected $table = "pondok";
    public function histori()
    {
        return $this->hasMany(histori::class,'pondok_id','id');
    }
}