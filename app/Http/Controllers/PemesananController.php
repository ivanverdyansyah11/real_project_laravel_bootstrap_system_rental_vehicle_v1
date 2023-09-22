<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
        ]);
    }

    public function booking()
    {
        return view('pemesanan.booking', [
            'title' => 'Pemesanan',
        ]);
    }

    public function transaction()
    {
        return view('pemesanan.transaction', [
            'title' => 'Pemesanan',
        ]);
    }
}
