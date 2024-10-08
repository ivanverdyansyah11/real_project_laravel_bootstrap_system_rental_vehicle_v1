<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id')->withTrashed();
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id')->withTrashed();
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopirs_id')->withTrashed();
    }

    public function pelepasan_pemesanan()
    {
        return $this->belongsTo(PelepasanPemesanan::class, 'id')->withTrashed();
    }
}
