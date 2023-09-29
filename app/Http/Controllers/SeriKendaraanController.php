<?php

namespace App\Http\Controllers;

use App\Models\BrandKendaraan;
use App\Models\JenisKendaraan;
use App\Models\SeriKendaraan;
use Illuminate\Http\Request;

class SeriKendaraanController extends Controller
{
    public function index()
    {
        return view('seri-kendaraan.index', [
            'title' => 'Kendaraan',
            'series' => SeriKendaraan::with('jenis_kendaraan', 'brand_kendaraan')->paginate(6),
            'jenises' => JenisKendaraan::all(),
            'brands' => BrandKendaraan::all(),
        ]);
    }

    function detail($id)
    {
        $seri = SeriKendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan')->first();
        $jenises = JenisKendaraan::all();
        $brands = BrandKendaraan::all();
        return response()->json([$seri, $jenises, $brands]);
    }

    function store(Request $request)
    {
        if ($request->jenis_kendaraans_id == '-' || $request->brand_kendaraans_id == '-') {
            return redirect(route('seriKendaraan'))->with('failed', 'Isi Form Input Jenis Kendaraan dan Brand Kendaraan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'nomor_seri' => 'required|string',
            'jenis_kendaraans_id' => 'required|string',
            'brand_kendaraans_id' => 'required|string',
        ]);

        $validatedData['status'] = 'ada';

        $seri = SeriKendaraan::create($validatedData);

        if ($seri) {
            return redirect(route('seriKendaraan'))->with('success', 'Berhasil Tambah Seri Kendaraan!');
        } else {
            return redirect(route('seriKendaraan'))->with('failed', 'Gagal Tambah Seri Kendaraan!');
        }
    }

    function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kendaraans_id' => 'required|string',
            'brand_kendaraans_id' => 'required|string',
            'nomor_seri' => 'required|string',
        ]);

        if (is_string($validatedData['jenis_kendaraans_id'])) {
            $validatedData['jenis_kendaraans_id'] = (int)$validatedData['jenis_kendaraans_id'];
        }

        if (is_string($validatedData['brand_kendaraans_id'])) {
            $validatedData['brand_kendaraans_id'] = (int)$validatedData['brand_kendaraans_id'];
        }

        $seri = SeriKendaraan::where('id', $id)->first()->update($validatedData);

        if ($seri) {
            return redirect(route('seriKendaraan'))->with('success', 'Berhasil Update Seri Kendaraan!');
        } else {
            return redirect(route('seriKendaraan'))->with('failed', 'Gagal Update Seri Kendaraan!');
        }
    }

    function delete($id)
    {
        $seri = SeriKendaraan::where('id', $id)->first()->delete();

        if ($seri) {
            return redirect(route('seriKendaraan'))->with('success', 'Berhasil Hapus Seri Kendaraan!');
        } else {
            return redirect(route('seriKendaraan'))->with('failed', 'Gagal Hapus Seri Kendaraan!');
        }
    }
}
