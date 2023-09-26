<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        return view('servis.index', [
            'title' => 'Servis',
            'kendaraans' => Kendaraan::where('status', 'servis')->with('jenis_kendaraan', 'brand_kendaraan')->get(),
        ]);
    }

    public function check($id)
    {
        return view('servis.check', [
            'title' => 'Servis',
            'kendaraan' => Kendaraan::where('id', $id)->with('kilometer_kendaraan')->first(),
        ]);
    }

    public function checkAction($id, Request $request)
    {
        if ($request->air_accu == '-' || $request->air_waiper == '-' || $request->ban == '-' || $request->oli == '-') {
            return redirect(route('servis.check', $id))->with('failed', 'Isi Form Input Kelengkapan Kondisi Kendaraan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'tanggal_servis' => 'required|date',
            'kilometer_sebelum' => 'required|string',
            'kilometer_setelah' => 'required|string',
            'air_accu' => 'required|string',
            'air_waiper' => 'required|string',
            'ban' => 'required|string',
            'oli' => 'required|string',
            'total_bayar' => 'required|string',
            'keterangan' => 'nullable|text',
        ]);

        $validatedData['kendaraans_id'] = $id;

        $kendaraan = Kendaraan::where('id', $id)->first()->update([
            'kilometer' => $validatedData['kilometer_setelah'],
            'kilometer_saat_ini' => $validatedData['kilometer_setelah'],
            'status' => 'ready',
        ]);

        $servis = Servis::create($validatedData);

        if ($servis && $kendaraan) {
            return redirect(route('laporan'))->with('success', 'Berhasil Melakukan Servis Kendaraan!');
        } else {
            return redirect(route('servis'))->with('failed', 'Gagal Melakukan Servis Kendaraan!');
        }
    }
}
