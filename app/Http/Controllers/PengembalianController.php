<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('pengembalian.index', [
            'title' => 'Pengembalian',
        ]);
    }

    public function restoration()
    {
        return view('pengembalian.restoration', [
            'title' => 'Pengembalian',
        ]);
    }
}
