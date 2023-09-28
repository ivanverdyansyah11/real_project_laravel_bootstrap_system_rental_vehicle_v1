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

    public function create($id)
    {
        return view('penambahan-sewa.create', [
            'title' => 'Kendaraan Disewa',
        ]);
    }

    public function store($id, Request $request)
    {
        return $request;
    }
}
