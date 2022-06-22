<?php

namespace App\Models;

use App\Models\Pondok;
use App\Models\Santri;
use App\Models\Asramasantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Histori extends Model
{
    use HasFactory;
    protected $table = "histori";

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id', 'id');
    }

    public function asrama()
    {
        return $this->belongsTo(Asramasantri::class, 'santri_id', 'id');
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Asramasantri::class, 'histori_id', 'id');
    }
    public function pondok()
    {
        return $this->belongsTo(Pondok::class, 'pondok_id', 'id');
    }
    public function santriTer()
    {
        return $this->belongsTo(Histori::class, 'santri_id', 'id');
    }
}
