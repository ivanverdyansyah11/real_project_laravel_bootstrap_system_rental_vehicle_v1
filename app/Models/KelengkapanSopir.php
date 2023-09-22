<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanSopir extends Model
{
    protected $guarded = [];

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'id');
    }
}
