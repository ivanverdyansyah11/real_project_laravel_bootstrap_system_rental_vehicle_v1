<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => Kendaraan::with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan', 'kilometer_kendaraan')->paginate(6),
        ]);
    }

    public function detail()
    {
        return view('kendaraan.detail', [
            'title' => 'Kendaraan',
        ]);
    }

    public function create()
    {
        return view('kendaraan.create', [
            'title' => 'Kendaraan',
        ]);
    }

    public function edit()
    {
        return view('kendaraan.edit', [
            'title' => 'Kendaraan',
        ]);
    }
}
