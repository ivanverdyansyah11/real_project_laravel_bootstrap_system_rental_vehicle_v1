<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'kendaraans' => Kendaraan::where('status', 'booking')->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan', 'kilometer_kendaraan')->get(),
        ]);
    }

    public function booking($id)
    {
        return view('pemesanan.booking', [
            'title' => 'Pemesanan',
            'kendaraan' => Kendaraan::where('id', $id)->first(),

        ]);
    }

    public function transaction($id)
    {
        return view('pemesanan.transaction', [
            'title' => 'Pemesanan',
        ]);
    }

    public function delete($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first()->update([
            'status' => 'ready',
        ]);

        if ($kendaraan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Hapus Pemesanan Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Hapus Pemesanan Kendaraan!');
        }
    }
}
