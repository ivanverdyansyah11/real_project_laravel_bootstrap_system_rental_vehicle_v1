<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenambahanSewaController extends Controller
{
    public function index()
    {
        return view('penambahan-sewa.index', [
            'title' => 'Kendaraan Disewa',
        ]);
    }

    public function edit()
    {
        return view('penambahan-sewa.edit', [
            'title' => 'Kendaraan Disewa',
        ]);
    }
}
