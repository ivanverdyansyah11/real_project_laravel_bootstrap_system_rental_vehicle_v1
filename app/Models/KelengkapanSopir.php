<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelengkapanSopir extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopirs_id');
    }
}
