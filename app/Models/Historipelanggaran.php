<?php

namespace App\Models;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historipelanggaran extends Model
{
    use HasFactory;
    protected $table = "historipelanggaran";
    

    public function santri()
    {
        return $this->belongsTo(Santri::class,'santri_id','id');
    }
    public function santripelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class,'pelanggaran_id','id');
    }
}