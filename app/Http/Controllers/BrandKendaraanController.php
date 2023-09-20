<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandKendaraanController extends Controller
{
    public function index()
    {
        return view('brand-kendaraan.index', [
            'title' => 'Kendaraan',
        ]);
    }
}
