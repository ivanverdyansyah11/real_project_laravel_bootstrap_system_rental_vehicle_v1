<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriKilometerKendaraanController extends Controller
{
    public function index()
    {
        return view('kilometer-kendaraan.index', [
            'title' => 'Kendaraan',
        ]);
    }
}
