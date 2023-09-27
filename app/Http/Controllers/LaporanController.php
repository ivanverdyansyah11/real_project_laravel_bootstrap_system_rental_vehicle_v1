<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index', [
            'title' => 'Laporan',
        ]);
    }

    public function detail($id)
    {
        return view('laporan.index', [
            'title' => 'Laporan',
        ]);
    }
}
