<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPemesanan extends Model
{
    protected $guarded = [];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'kendaraans_id');
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopirs_id');
    }

    public function pelepasan_pemesanan()
    {
        return $this->belongsTo(PelepasanPemesanan::class, 'pelepasan_pemesanans_id');
    }
}
