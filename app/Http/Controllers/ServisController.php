<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        return view('servis.index', [
            'title' => 'Servis',
        ]);
    }

    public function check()
    {
        return view('servis.check', [
            'title' => 'Servis',
        ]);
    }

    public function category()
    {
        return view('kategori-servis.index', [
            'title' => 'Servis',
        ]);
    }
}
