<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    protected $guarded = [];

    public function pembayaran_pemesanan()
    {
        return $this->belongsTo(PembayaranPemesanan::class, 'id');
    }

    public function kelengkapan_sopir()
    {
        return $this->belongsTo(KelengkapanSopir::class, 'id');
    }
}
