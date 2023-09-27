<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanPelanggan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'title' => 'Pelanggan',
            'pelanggans' => Pelanggan::with('kelengkapan_pelanggan')->paginate(6),
        ]);
    }

    public function detail($id)
    {
        return view('pelanggan.detail', [
            'title' => 'Pelanggan',
            'pelanggan' => Pelanggan::where('id', $id)->first(),
        ]);
    }

    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Pelanggan',
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_kk' => 'nullable|string',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_kk' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
        ]);

        if (!empty($validatedData['foto_ktp'])) {
            $image = $request->file('foto_ktp');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        }

        if (!empty($validatedData['foto_kk'])) {
            $image = $request->file('foto_kk');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/kk-images/'), $imageName);
            $validatedData['foto_kk'] = $imageName;
        }

        $pelangganID = Pelanggan::latest()->first();
        if ($pelangganID) {
            $validatedDataKelengkapan['pelanggans_id'] = $pelangganID->id + 1;
        } else {
            $validatedDataKelengkapan['pelanggans_id'] = 1;
        }

        if (!empty($validatedData['foto_ktp']) && !empty($validatedData['nomor_ktp'])) {
            $validatedDataKelengkapan['ktp'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['ktp'] = 'belum lengkap';
        }

        if (!empty($validatedData['foto_kk']) && !empty($validatedData['nomor_kk'])) {
            $validatedDataKelengkapan['kk'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['kk'] = 'belum lengkap';
        }

        if (!empty($validatedData['nomor_telepon'])) {
            $validatedDataKelengkapan['nomor_telepon'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['nomor_telepon'] = 'belum lengkap';
        }

        $pelanggan = Pelanggan::create($validatedData);
        $kelengkapanPelanggan = KelengkapanPelanggan::create($validatedDataKelengkapan);
        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'kategori_laporan' => 'pelanggan',
        ]);

        if ($pelanggan && $kelengkapanPelanggan && $laporan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Tambah Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Tambah Pelanggan!');
        }
    }

    public function edit($id)
    {
        return view('pelanggan.edit', [
            'title' => 'Pelanggan',
            'pelanggan' => Pelanggan::where('id', $id)->first(),
        ]);
    }

    function update($id, Request $request)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'nomor_telepon' => 'nullable|string',
            'nomor_ktp' => 'nullable|string',
            'nomor_kk' => 'nullable|string',
            'alamat' => 'required|string',
        ]);

        if ($request->file('foto_ktp')) {
            if (file_exists(public_path('assets/img/ktp-images/') . $pelanggan->foto_ktp && $pelanggan->foto_ktp)) {
                $oldImagePath = public_path('assets/img/ktp-images/') . $pelanggan->foto_ktp;
                unlink($oldImagePath);
            }

            $image = $request->file('foto_ktp');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        } else {
            $validatedData['foto_ktp'] = $pelanggan->foto_ktp;
        }

        if ($request->file('foto_kk')) {
            if (file_exists(public_path('assets/img/kk-images/') . $pelanggan->foto_kk && $pelanggan->foto_kk)) {
                $oldImagePath = public_path('assets/img/kk-images/') . $pelanggan->foto_kk;
                unlink($oldImagePath);
            }

            $image = $request->file('foto_kk');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/kk-images/'), $imageName);
            $validatedData['foto_kk'] = $imageName;
        } else {
            $validatedData['foto_kk'] = $pelanggan->foto_kk;
        }

        if (!empty($validatedData['foto_ktp']) && !empty($validatedData['nomor_ktp'])) {
            $validatedDataKelengkapan['ktp'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['ktp'] = 'belum lengkap';
        }

        if (!empty($validatedData['foto_kk']) && !empty($validatedData['nomor_kk'])) {
            $validatedDataKelengkapan['kk'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['kk'] = 'belum lengkap';
        }

        if (!empty($validatedData['nomor_telepon'])) {
            $validatedDataKelengkapan['nomor_telepon'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['nomor_telepon'] = 'belum lengkap';
        }

        $pelanggan = Pelanggan::where('id', $id)->first()->update($validatedData);
        $kelengkapanPelanggan = KelengkapanPelanggan::where('pelanggans_id', $id)->first()->update($validatedDataKelengkapan);;

        if ($pelanggan && $kelengkapanPelanggan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Edit Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Edit Pelanggan!');
        }
    }

    function delete($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        if (file_exists(public_path('assets/img/ktp-images/') . $pelanggan->foto_ktp && $pelanggan->foto_ktp)) {
            $imagePath = public_path('assets/img/ktp-images/') . $pelanggan->foto_ktp;
            unlink($imagePath);
        }

        if (file_exists(public_path('assets/img/kk-images/') . $pelanggan->foto_kk && $pelanggan->foto_kk)) {
            $imagePath = public_path('assets/img/kk-images/') . $pelanggan->foto_kk;
            unlink($imagePath);
        }

        $pelanggan = $pelanggan->delete();
        $kelengkapanPelanggan = KelengkapanPelanggan::where('pelanggans_id', $id)->first()->delete();

        if ($pelanggan && $kelengkapanPelanggan) {
            return redirect(route('pelanggan'))->with('success', 'Berhasil Hapus Pelanggan!');
        } else {
            return redirect(route('pelanggan'))->with('failed', 'Gagal Hapus Pelanggan!');
        }
    }
}
