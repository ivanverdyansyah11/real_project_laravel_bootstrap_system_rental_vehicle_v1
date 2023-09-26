<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $guarded = [];

    public function kelengkapan_pemesanan()
    {
        return $this->belongsTo(KelengkapanPemesanan::class, 'id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id');
    }

    public function pelepasan_pemesanans()
    {
        return $this->hasMany(PelepasanPemesanan::class, 'id');
    }
}
