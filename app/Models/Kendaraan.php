<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servis;

class Kendaraan extends Model
{   use SoftDeletes;
    protected $guarded = [];

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraans_id')->withTrashed();
    }

    public function brand_kendaraan()
    {
        return $this->belongsTo(BrandKendaraan::class, 'brand_kendaraans_id')->withTrashed();
    }

    public function seri_kendaraan()
    {
        return $this->belongsTo(SeriKendaraan::class, 'seri_kendaraans_id')->withTrashed();
    }

    public function kilometer_kendaraan()
    {
        return $this->belongsTo(KategoriKilometerKendaraan::class, 'kategori_kilometer_kendaraans_id')->withTrashed();
    }

    public function pelepasan_pemesanan()
    {
        return $this->belongsTo(PelepasanPemesanan::class, 'id')->withTrashed();
    }

    public function servis(int $kendaraans_id)
    {
        return Servis::where('kendaraans_id', $kendaraans_id)->latest()->first();
    }
}
