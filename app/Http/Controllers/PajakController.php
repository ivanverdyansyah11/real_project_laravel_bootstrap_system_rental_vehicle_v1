<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
    {
        return view('pajak.index', [
            'title' => 'Pajak',
        ]);
    }

    public function detail()
    {
        return view('pajak.detail', [
            'title' => 'Pajak',
        ]);
    }

    public function transaction()
    {
        return view('pajak.transaction', [
            'title' => 'Pajak',
        ]);
    }
}
