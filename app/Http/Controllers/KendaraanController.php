<?php

namespace App\Http\Controllers;

use App\Models\KategoriKilometerKendaraan;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\SeriKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => Kendaraan::where('status', 'ready')->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan', 'kilometer_kendaraan')->get(),
            'pelanggans' => Pelanggan::all(),
        ]);
    }

    function getDetail($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();
        return response()->json($kendaraan);
    }

    public function detail($id)
    {
        return view('kendaraan.detail', [
            'title' => 'Kendaraan',
            'kendaraan' => Kendaraan::where('id', $id)->with('jenis_kendaraan')->first(),
            'series' => SeriKendaraan::all(),
            'kilometers' => KategoriKilometerKendaraan::all(),
        ]);
    }

    public function create()
    {
        return view('kendaraan.create', [
            'title' => 'Kendaraan',
            'series' => SeriKendaraan::all(),
            'kilometers' => KategoriKilometerKendaraan::all(),
        ]);
    }

    function getSeriKendaraan($id)
    {
        $seri = SeriKendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan')->first();
        return response()->json($seri);
    }

    function store(Request $request)
    {
        if ($request->seri_kendaraans_id == '-' || $request->kategori_kilometer_kendaraans_id == '-') {
            return redirect(route('kendaraan'))->with('failed', 'Isi Form Input Seri Kendaraan dan Kategori Kilometer Kendaraan Terlebih Dahulu!');
        }

        $seri = SeriKendaraan::where('id', $request->seri_kendaraans_id)->first();
        $jenis_kendaraans_id = $seri->jenis_kendaraans_id;
        $brand_kendaraans_id = $seri->brand_kendaraans_id;

        $validatedData = $request->validate([
            'seri_kendaraans_id' => 'required|integer',
            'kategori_kilometer_kendaraans_id' => 'required|integer',
            'foto_kendaraan' => 'required|image|max:2048',
            'stnk_nama' => 'required|string|max:255',
            'nama_kendaraan' => 'required|string|max:255',
            'nomor_polisi' => 'required|string|max:255',
            'kilometer' => 'required|string|max:255',
            'tarif_sewa' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'warna' => 'required|string|max:255',
            'nomor_rangka' => 'required|string|max:255',
            'nomor_mesin' => 'required|string|max:255',
        ]);

        $validatedData['jenis_kendaraans_id'] = $jenis_kendaraans_id;
        $validatedData['brand_kendaraans_id'] = $brand_kendaraans_id;
        $validatedData['status'] = 'ready';
        $validatedData['kilometer_saat_ini'] = $validatedData['kilometer'];

        if (!empty($validatedData['foto_kendaraan'])) {
            $image = $request->file('foto_kendaraan');
            $imageName = $validatedData['nama_kendaraan'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        }

        $kendaraan = Kendaraan::create($validatedData);

        if ($kendaraan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Tambah Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Tambah Kendaraan!');
        }
    }

    public function edit($id)
    {
        return view('kendaraan.edit', [
            'title' => 'Kendaraan',
            'kendaraan' => Kendaraan::where('id', $id)->first(),
            'series' => SeriKendaraan::all(),
            'kilometers' => KategoriKilometerKendaraan::all(),
        ]);
    }

    function update($id, Request $request)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();
        $seri = SeriKendaraan::where('id', $request->seri_kendaraans_id)->first();
        $jenis_kendaraans_id = $seri->jenis_kendaraans_id;
        $brand_kendaraans_id = $seri->brand_kendaraans_id;

        $validatedData = $request->validate([
            'seri_kendaraans_id' => 'required|integer',
            'kategori_kilometer_kendaraans_id' => 'required|integer',
            'stnk_nama' => 'required|string|max:255',
            'nama_kendaraan' => 'required|string|max:255',
            'nomor_polisi' => 'required|string|max:255',
            'kilometer' => 'required|string|max:255',
            'tarif_sewa' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'warna' => 'required|string|max:255',
            'nomor_rangka' => 'required|string|max:255',
            'nomor_mesin' => 'required|string|max:255',
        ]);

        $validatedData['jenis_kendaraans_id'] = $jenis_kendaraans_id;
        $validatedData['brand_kendaraans_id'] = $brand_kendaraans_id;

        if ($request->file('foto_kendaraan')) {
            if ($kendaraan->foto_kendaraan) {
                $oldImagePath = public_path('assets/img/kendaraan-images/') . $kendaraan->foto_kendaraan;
                unlink($oldImagePath);
            }

            $image = $request->file('foto_kendaraan');
            $imageName = $validatedData['nama_kendaraan'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        } else {
            $validatedData['foto_kendaraan'] = $kendaraan->foto_kendaraan;
        }

        $kendaraan = Kendaraan::where('id', $id)->first()->update($validatedData);

        if ($kendaraan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Edit Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Edit Kendaraan!');
        }
    }

    function delete($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();

        if ($kendaraan->foto_kendaraan) {
            $imagePath = public_path('assets/img/kendaraan-images/') . $kendaraan->foto_kendaraan;
            unlink($imagePath);
        }

        $kendaraan = $kendaraan->delete();

        if ($kendaraan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Hapus Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Hapus Kendaraan!');
        }
    }
}
