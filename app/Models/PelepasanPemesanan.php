<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelepasanPemesanan extends Model
{
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'kendaraans_id');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'pemesanans_id');
    }

    // public function pembayaran_pemesanan()
    // {
    //     return $this->belongsTo(PembayaranPemesanan::class, 'id');
    // }
}
