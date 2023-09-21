<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function index()
    {
        return view('sopir.index', [
            'title' => 'Sopir',
        ]);
    }

    public function detail()
    {
        return view('sopir.detail', [
            'title' => 'Sopir',
        ]);
    }

    public function create()
    {
        return view('sopir.create', [
            'title' => 'Sopir',
        ]);
    }

    public function edit()
    {
        return view('sopir.edit', [
            'title' => 'Sopir',
        ]);
    }
}
