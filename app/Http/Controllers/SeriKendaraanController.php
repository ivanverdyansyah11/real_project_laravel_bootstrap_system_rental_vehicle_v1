<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriKendaraanController extends Controller
{
    public function index()
    {
        return view('seri-kendaraan.index', [
            'title' => 'Kendaraan',
        ]);
    }
}
