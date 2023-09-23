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
}
