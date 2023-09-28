<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index', [
            'title' => 'Laporan',
            'laporans' => Laporan::orderBy('created_at', 'DESC')->paginate(6),
        ]);
    }

    public function detail($id)
    {
        return view('laporan.index', [
            'title' => 'Laporan',
        ]);
    }
}
