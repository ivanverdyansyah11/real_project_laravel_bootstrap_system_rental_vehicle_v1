<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
    {
        return view('pajak.index', [
            'title' => 'Pajak',
            'kendaraans' => Kendaraan::all(),
        ]);
    }

    public function transaction($id)
    {
        return view('pajak.transaction', [
            'title' => 'Pajak',
            'kendaraan' => Kendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan')->first(),
        ]);
    }

    public function transactionAction($id, Request $request)
    {
        $validatedData = $request->validate([
            'jenis_pajak' => 'required|string',
            'tanggal_bayar' => 'required|date',
            'metode_bayar' => 'required|string',
            'jumlah_bayar' => 'required|string',
        ]);

        $validatedData['kendaraans_id'] = $id;
        $pajak = Pajak::create($validatedData);

        if ($pajak) {
            return redirect(route('pajak'))->with('success', 'Berhasil Tambah Bayar Pajak Kendaraan!');
        } else {
            return redirect(route('pajak'))->with('failed', 'Gagal Tambah Bayar Pajak Kendaraan!');
        }
    }
}
