<?php

namespace App\Http\Controllers;

use App\Models\KategoriKilometerKendaraan;
use Illuminate\Http\Request;

class KategoriKilometerKendaraanController extends Controller
{
    public function index()
    {
        return view('kilometer-kendaraan.index', [
            'title' => 'Kendaraan',
            'kilometers' => KategoriKilometerKendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $kilometers = KategoriKilometerKendaraan::where('jumlah', 'like', '%' . $request->search . '%')->paginate(6);

        return view('kilometer-kendaraan.index', [
            'title' => 'Kendaraan',
            'kilometers' => $kilometers,
        ]);
    }

    function detail($id)
    {
        $kilometer = KategoriKilometerKendaraan::where('id', $id)->first();
        return response()->json($kilometer);
    }

    function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'jumlah' => 'required|string|max:255',
            ]);
            KategoriKilometerKendaraan::create($validatedData);
            return redirect(route('kilometerKendaraan'))->with('success', 'Berhasil Tambah Kategori Kilometer Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kilometerKendaraan'))->with('failed', 'Gagal Tambah Kategori Kilometer Kendaraan!');
        }
    }

    function update($id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'jumlah' => 'required|string|max:255',
            ]);
            KategoriKilometerKendaraan::where('id', $id)->first()->update($validatedData);
            return redirect(route('kilometerKendaraan'))->with('success', 'Berhasil Update Kategori Kilometer Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kilometerKendaraan'))->with('failed', 'Gagal Update Kategori Kilometer Kendaraan!');
        }
    }

    function delete($id)
    {
        try {
            KategoriKilometerKendaraan::where('id', $id)->first()->delete();
            return redirect(route('kilometerKendaraan'))->with('success', 'Berhasil Hapus Kategori Kilometer Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kilometerKendaraan'))->with('failed', 'Gagal Hapus Kategori Kilometer Kendaraan!');
        }
    }
}
