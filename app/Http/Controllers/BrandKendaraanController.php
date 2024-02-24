<?php

namespace App\Http\Controllers;

use App\Models\BrandKendaraan;
use Illuminate\Http\Request;

class BrandKendaraanController extends Controller
{
    public function index()
    {
        return view('brand-kendaraan.index', [
            'title' => 'Kendaraan',
            'brands' => BrandKendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $brands = BrandKendaraan::where('nama', 'like', '%' . $request->search . '%')->paginate(6);

        return view('brand-kendaraan.index', [
            'title' => 'Kendaraan',
            'brands' => $brands,
        ]);
    }

    function detail($id)
    {
        $brand = BrandKendaraan::where('id', $id)->first();
        return response()->json($brand);
    }

    function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
            ]);
            BrandKendaraan::create($validatedData);
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Tambah Brand Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Tambah Brand Kendaraan!');
        }
    }

    function update($id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
            ]);
            BrandKendaraan::where('id', $id)->first()->update($validatedData);
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Update Brand Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Update Brand Kendaraan!');
        }
    }

    function delete($id)
    {
        try {
            BrandKendaraan::where('id', $id)->first()->delete();
            return redirect(route('brandKendaraan'))->with('success', 'Berhasil Hapus Brand Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('brandKendaraan'))->with('failed', 'Gagal Hapus Brand Kendaraan!');
        }
    }
}
