<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'title' => 'Pelanggan',
        ]);
    }

    public function detail()
    {
        return view('pelanggan.detail', [
            'title' => 'Pelanggan',
        ]);
    }

    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Pelanggan',
        ]);
    }

    public function edit()
    {
        return view('pelanggan.edit', [
            'title' => 'Pelanggan',
        ]);
    }
}
