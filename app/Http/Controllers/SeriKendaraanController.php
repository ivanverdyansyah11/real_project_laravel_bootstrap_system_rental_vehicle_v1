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

    public function search(Request $request)
    {
        $keyword = $request->search;
        $series = SeriKendaraan::where('nomor_seri', 'like', '%' . $keyword . '%')->orWhereHas('jenis_kendaraan', function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })->orWhereHas('brand_kendaraan', function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })->paginate(6);

        return view('seri-kendaraan.index', [
            'title' => 'Kendaraan',
            'series' => $series,
            'jenises' => JenisKendaraan::all(),
            'brands' => BrandKendaraan::all(),
        ]);
    }

    function check()
    {
        $jenises = JenisKendaraan::count();
        $brands = BrandKendaraan::count();

        if ($jenises == 0 && $brands == 0) {
            return redirect(route('tipeKendaraan'))->with('failed', 'Tambahkan Jenis dan Brand Kendaraan Terlebih Dahulu!');
        } elseif ($jenises == 0) {
            return redirect(route('tipeKendaraan'))->with('failed', 'Tambahkan Jenis Kendaraan Terlebih Dahulu!');
        } elseif ($brands == 0) {
            return redirect(route('tipeKendaraan'))->with('failed', 'Tambahkan Brand Kendaraan Terlebih Dahulu!');
        }
    }

    function detail($id)
    {
        return view('seri-kendaraan.detail', [
            'title' => 'Kendaraan',
            'seri' => SeriKendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan')->first(),
        ]);
    }

    function create()
    {
        return view('seri-kendaraan.create', [
            'title' => 'Kendaraan',
            'jenises' => JenisKendaraan::all(),
            'brands' => BrandKendaraan::all(),
        ]);
    }

    function store(Request $request)
    {
        try {
            if ($request->jenis_kendaraans_id == '' || $request->brand_kendaraans_id == '') {
                return redirect(route('tipeKendaraan.create'))->with('failed', 'Isi Form Input Jenis Kendaraan dan Brand Kendaraan Terlebih Dahulu!');
            }
    
            $validatedData = $request->validate([
                'nomor_seri' => 'required|string',
                'jenis_kendaraans_id' => 'required|string',
                'brand_kendaraans_id' => 'required|string',
            ]);
            SeriKendaraan::create($validatedData);
            return redirect(route('tipeKendaraan'))->with('success', 'Berhasil Tambah Tipe Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('tipeKendaraan'))->with('failed', 'Gagal Tambah Tipe Kendaraan!');
        }
    }

    function edit($id)
    {
        return view('seri-kendaraan.edit', [
            'title' => 'Kendaraan',
            'seri' => SeriKendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan')->first(),
            'jenises' => JenisKendaraan::all(),
            'brands' => BrandKendaraan::all(),
        ]);
    }

    function update($id, Request $request)
    {
        try {
            if ($request->jenis_kendaraans_id == '' || $request->brand_kendaraans_id == '') {
                return redirect(route('tipeKendaraan.edit', $id))->with('failed', 'Isi Form Input Jenis Kendaraan dan Brand Kendaraan Terlebih Dahulu!');
            }
    
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
            SeriKendaraan::where('id', $id)->first()->update($validatedData);
            return redirect(route('tipeKendaraan'))->with('success', 'Berhasil Update Tipe Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('tipeKendaraan'))->with('failed', 'Gagal Update Tipe Kendaraan!');
        }
    }

    function delete($id)
    {
        try {
            SeriKendaraan::where('id', $id)->first()->delete();
            return redirect(route('tipeKendaraan'))->with('success', 'Berhasil Hapus Tipe Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('tipeKendaraan'))->with('failed', 'Gagal Hapus Tipe Kendaraan!');
        }
    }
}
