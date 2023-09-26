<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPemesanan extends Model
{
    protected $guarded = [];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'id');
    }

    public function pelepasan_pemesanan()
    {
        return $this->belongsTo(PelepasanPemesanan::class, 'id');
    }
}
