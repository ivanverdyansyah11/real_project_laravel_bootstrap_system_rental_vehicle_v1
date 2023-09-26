<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        return view('servis.index', [
            'title' => 'Servis',
            'kendaraans' => Kendaraan::where('status', 'servis')->with('jenis_kendaraan', 'brand_kendaraan')->get(),
        ]);
    }

    public function check()
    {
        return view('servis.check', [
            'title' => 'Servis',
        ]);
    }
}
