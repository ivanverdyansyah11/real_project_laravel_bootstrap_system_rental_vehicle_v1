<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriKendaraan extends Model
{
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'id');
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'id');
    }

    public function brand_kendaraan()
    {
        return $this->belongsTo(BrandKendaraan::class, 'id');
    }
}
