<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelepasanPemesanan extends Model
{
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanans_id');
    }
}
