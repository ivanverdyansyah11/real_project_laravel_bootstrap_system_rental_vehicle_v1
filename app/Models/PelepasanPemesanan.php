<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelepasanPemesanan extends Model
{
    protected $guarded = [];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'id');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id');
    }

    public function pembayaran_pemesanan()
    {
        return $this->belongsTo(PembayaranPemesanan::class, 'id');
    }
}
