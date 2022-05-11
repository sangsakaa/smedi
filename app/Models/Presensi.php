<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    public function santri()
    {
        return $this->belongsTo(santri::class,'santri_id','id');
    }
}
