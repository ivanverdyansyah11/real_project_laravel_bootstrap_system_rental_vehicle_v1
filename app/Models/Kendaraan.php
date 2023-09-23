<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $guarded = [];

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'id');
    }

    public function brand_kendaraan()
    {
        return $this->belongsTo(BrandKendaraan::class, 'id');
    }

    public function seri_kendaraan()
    {
        return $this->belongsTo(SeriKendaraan::class, 'id');
    }

    public function kilometer_kendaraan()
    {
        return $this->belongsTo(KategoriKilometerKendaraan::class, 'id');
    }
}
