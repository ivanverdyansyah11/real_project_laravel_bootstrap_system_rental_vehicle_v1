<?php

namespace App\Http\Controllers;

use App\Models\BrandKendaraan;
use App\Models\JenisKendaraan;
use App\Models\KategoriKilometerKendaraan;
use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\SeriKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => Kendaraan::with('jenis_kendaraan', 'brand_kendaraan')->paginate(6),
            'jenises' => JenisKendaraan::get(),
            'brands' => BrandKendaraan::get(),
            'series' => SeriKendaraan::get(),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::query();
        $kendaraans = $kendaraans->when($request->search != null, function ($query) use ($request) {
            $query->where('nomor_plat', 'like', '%' . $request->search . '%')
                ->orWhere(function ($query) use ($request) {
                    $query->where('kilometer_saat_ini', 'like', '%' . $request->search . '%')
                        ->where('tarif_sewa_hari', [$request->search])
                        ->where('tarif_sewa_minggu', [$request->search])
                        ->where('tarif_sewa_bulan', [$request->search])
                        ->where('tahun_pembuatan', [$request->search])
                        ->where('tanggal_pembelian', [$request->search])
                        ->where('warna', '%' . $request->search . '%')
                        ->where('nomor_rangka', '%' . $request->search . '%')
                        ->where('nomor_mesin', '%' . $request->search . '%');
                });
        })->when($request->jenis_kendaraans_id != null, function ($q) use ($request) {
            $q->where('jenis_kendaraans_id', $request->jenis_kendaraans_id);
        })->when($request->brand_kendaraans_id != null, function ($q) use ($request) {
            $q->where('brand_kendaraans_id', $request->brand_kendaraans_id);
        })->when($request->seri_kendaraans_id != null, function ($q) use ($request) {
            $q->where('seri_kendaraans_id', $request->seri_kendaraans_id);
        });

        $kendaraans = $kendaraans->paginate(6);
        return view('kendaraan.index', [
            'title' => 'Kendaraan',
            'kendaraans' => $kendaraans,
            'jenises' => JenisKendaraan::get(),
            'brands' => BrandKendaraan::get(),
            'series' => SeriKendaraan::get(),
        ]);
    }

    function getSeriKendaraanByJenisBrand($idJenis, $idBrand)
    {
        $nomorSeri = SeriKendaraan::where('jenis_kendaraans_id', $idJenis)->where('brand_kendaraans_id', $idBrand)->with('jenis_kendaraan', 'brand_kendaraan')->get();
        return response()->json($nomorSeri);
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
            'jenises' => JenisKendaraan::get(),
            'brands' => BrandKendaraan::get(),
            'series' => SeriKendaraan::get(),
            'kilometers' => KategoriKilometerKendaraan::all(),
        ]);
    }

    function getSeriKendaraan($id)
    {
        $seri = SeriKendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan')->first();
        return response()->json($seri);
    }

    function check()
    {
        $series = SeriKendaraan::count();

        if ($series == 0) {
            return redirect(route('kendaraan'))->with('failed', 'Tambahkan Tipe Kendaraan Terlebih Dahulu!');
        }
    }

    function store(Request $request)
    {
        try {
            if ($request->seri_kendaraans_id == '' || $request->kategori_kilometer_kendaraans_id == '') {
                return redirect(route('kendaraan.create'))->with('failed', 'Isi Form Input Tipe Kendaraan dan Kategori Kilometer Kendaraan Terlebih Dahulu!');
            }
    
            $seri = SeriKendaraan::where('id', $request->seri_kendaraans_id)->first();
            $jenis_kendaraans_id = $seri->jenis_kendaraans_id;
            $brand_kendaraans_id = $seri->brand_kendaraans_id;
    
            $validatedData = $request->validate([
                'seri_kendaraans_id' => 'required|string',
                'kategori_kilometer_kendaraans_id' => 'required|string',
                'foto_kendaraan' => 'required|image|max:2048',
                'stnk_nama' => 'required|string|max:255',
                'nomor_plat' => 'required|string|max:255',
                'kilometer' => 'required|string|max:255',
                'tarif_sewa_hari' => 'required|string|max:255',
                'tarif_sewa_minggu' => 'required|string|max:255',
                'tarif_sewa_bulan' => 'required|string|max:255',
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
                $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
                $image->move(public_path('assets/img/kendaraan-images/'), $imageName);
                $validatedData['foto_kendaraan'] = $imageName;
            }
    
            Kendaraan::create($validatedData);
            $kendaraanID = Kendaraan::latest()->first();
    
            Laporan::create([
                'penggunas_id' => auth()->user()->id,
                'relations_id' => $kendaraanID->id,
                'kategori_laporan' => 'kendaraan',
            ]);
    
            return redirect(route('kendaraan'))->with('success', 'Berhasil Tambah Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kendaraan'))->with('failed', 'Gagal Tambah Kendaraan!');
        }
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();
        return view('kendaraan.edit', [
            'title' => 'Kendaraan',
            'kendaraan' => $kendaraan,
            'jenises' => JenisKendaraan::get(),
            'brands' => BrandKendaraan::get(),
            'series' => SeriKendaraan::get(),
            'kilometers' => KategoriKilometerKendaraan::all(),
        ]);
    }

    function update($id, Request $request)
    {
        try {
            $kendaraan = Kendaraan::where('id', $id)->first();
            $seri = SeriKendaraan::where('id', $request->seri_kendaraans_id)->first();
            $jenis_kendaraans_id = $seri->jenis_kendaraans_id;
            $brand_kendaraans_id = $seri->brand_kendaraans_id;

            $validatedData = $request->validate([
                'seri_kendaraans_id' => 'required|string',
                'kategori_kilometer_kendaraans_id' => 'required|string',
                'stnk_nama' => 'required|string|max:255',
                'nomor_plat' => 'required|string|max:255',
                'tarif_sewa_hari' => 'required|string|max:255',
                'tarif_sewa_minggu' => 'required|string|max:255',
                'tarif_sewa_bulan' => 'required|string|max:255',
                'tahun_pembuatan' => 'required|string|max:255',
                'tanggal_pembelian' => 'required|date',
                'warna' => 'required|string|max:255',
                'nomor_rangka' => 'required|string|max:255',
                'nomor_mesin' => 'required|string|max:255',
                'status' => 'required|string',
            ]);

            $validatedData['jenis_kendaraans_id'] = $jenis_kendaraans_id;
            $validatedData['brand_kendaraans_id'] = $brand_kendaraans_id;
            $validatedData['kilometer_saat_ini'] = $request->kilometer;

            if ($request->file('foto_kendaraan')) {
                $path = "assets/img/kendaraan-images/$kendaraan->foto_kendaraan";

                if (File::exists($path)) {
                    File::delete($path);
                }

                $image = $request->file('foto_kendaraan');
                $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
                $image->move(public_path('assets/img/kendaraan-images/'), $imageName);
                $validatedData['foto_kendaraan'] = $imageName;
            } else {
                $validatedData['foto_kendaraan'] = $kendaraan->foto_kendaraan;
            }

            Kendaraan::where('id', $id)->first()->update($validatedData);
            return redirect(route('kendaraan'))->with('success', 'Berhasil Edit Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kendaraan'))->with('failed', 'Gagal Edit Kendaraan!');
        }
    }

    function delete($id)
    {
        try {
            $kendaraan = Kendaraan::where('id', $id)->first();
            $laporan = Laporan::where('relations_id', $kendaraan->id)->first();
            $laporan->delete();
            $path = "assets/img/kendaraan-images/$kendaraan->foto_kendaraan";
            if (File::exists($path)) {
                File::delete($path);
            }
            $kendaraan->delete();
            return redirect(route('kendaraan'))->with('success', 'Berhasil Hapus Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('kendaraan'))->with('failed', 'Gagal Hapus Kendaraan!');
        }
    }
}
