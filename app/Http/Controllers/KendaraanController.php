<?php

namespace App\Http\Controllers;

use App\Models\KategoriKilometerKendaraan;
use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\SeriKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => Kendaraan::where('status', 'ready')->with('jenis_kendaraan', 'brand_kendaraan')->paginate(6),
            'pelanggans' => Pelanggan::where('status', 'ada')->where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_kk', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->get(),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('status', 'ready')
            ->where('nama_kendaraan', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_polisi', 'like', '%' . $request->search . '%')
            ->orWhere('kilometer_saat_ini', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa', 'like', '%' . $request->search . '%')
            ->orWhere('tahun_pembuatan', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pembelian', 'like', '%' . $request->search . '%')
            ->orWhere('warna', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_rangka', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_mesin', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => $kendaraans,
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
            'series' => SeriKendaraan::where('status', 'ada')->get(),
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
            return redirect(route('kendaraan.create'))->with('failed', 'Isi Form Input Seri Kendaraan dan Kategori Kilometer Kendaraan Terlebih Dahulu!');
        }

        $seri = SeriKendaraan::where('id', $request->seri_kendaraans_id)->first();
        $jenis_kendaraans_id = $seri->jenis_kendaraans_id;
        $brand_kendaraans_id = $seri->brand_kendaraans_id;

        $validatedData = $request->validate([
            'seri_kendaraans_id' => 'required|string',
            'kategori_kilometer_kendaraans_id' => 'required|string',
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

        $seriKendaraan = SeriKendaraan::where('id', $validatedData['seri_kendaraans_id'])->first()->update([
            'status' => 'tidak ada',
        ]);

        $kendaraan = Kendaraan::create($validatedData);
        $kendaraanID = Kendaraan::latest()->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $kendaraanID->id,
            'kategori_laporan' => 'kendaraan',
        ]);

        if ($kendaraan && $seriKendaraan && $laporan) {
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
            'seri_kendaraans_id' => 'required|string',
            'kategori_kilometer_kendaraans_id' => 'required|string',
            'stnk_nama' => 'required|string|max:255',
            'nama_kendaraan' => 'required|string|max:255',
            'nomor_polisi' => 'required|string|max:255',
            'tarif_sewa' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'warna' => 'required|string|max:255',
            'nomor_rangka' => 'required|string|max:255',
            'nomor_mesin' => 'required|string|max:255',
        ]);

        $validatedData['jenis_kendaraans_id'] = $jenis_kendaraans_id;
        $validatedData['brand_kendaraans_id'] = $brand_kendaraans_id;
        $validatedData['kilometer_saat_ini'] = $request->kilometer;

        if ($request->file('foto_kendaraan')) {
            if (file_exists(public_path('assets/img/kendaraan-images/') . $kendaraan->foto_kendaraan) && $kendaraan->foto_kendaraan) {
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

        $laporan = Laporan::where('relations_id', $kendaraan->id)->first();
        $laporan = $laporan->delete();
        $seriKendaraan = SeriKendaraan::where('id', $kendaraan->seri_kendaraans_id)->first()->update([
            'status' => 'ada',
        ]);

        if (file_exists(public_path('assets/img/kendaraan-images/') . $kendaraan->foto_kendaraan) && $kendaraan->foto_kendaraan) {
            $imagePath = public_path('assets/img/kendaraan-images/') . $kendaraan->foto_kendaraan;
            unlink($imagePath);
        }

        $kendaraan = $kendaraan->delete();

        if ($kendaraan && $seriKendaraan && $laporan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Hapus Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Hapus Kendaraan!');
        }
    }
}
