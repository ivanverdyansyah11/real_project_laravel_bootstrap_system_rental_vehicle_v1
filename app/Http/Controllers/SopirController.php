<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanSopir;
use App\Models\Sopir;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class SopirController extends Controller
{
    public function index()
    {
        return view('sopir.index', [
            'title' => 'Sopir',
            'sopirs' => Sopir::with('kelengkapan_sopir')->paginate(6),
        ]);
    }

    public function detail($id)
    {
        return view('sopir.detail', [
            'title' => 'Sopir',
            'sopir' => Sopir::where('id', $id)->first(),
        ]);
    }

    public function create()
    {
        return view('sopir.create', [
            'title' => 'Sopir',
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|integer',
            'nomor_telepon' => 'nullable|integer',
            'nomor_ktp' => 'nullable|integer',
            'nomor_sim' => 'nullable|integer',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_sim' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
        ]);

        if (!empty($validatedData['foto_ktp'])) {
            $image = $request->file('foto_ktp');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        }

        if (!empty($validatedData['foto_sim'])) {
            $image = $request->file('foto_sim');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/sim-images/'), $imageName);
            $validatedData['foto_sim'] = $imageName;
        }

        $sopirID = Sopir::latest()->first();
        if ($sopirID) {
            $validatedDataKelengkapan['sopirs_id'] = $sopirID->id + 1;
        } else {
            $validatedDataKelengkapan['sopirs_id'] = 1;
        }

        if (!empty($validatedData['foto_ktp']) && !empty($validatedData['nomor_ktp'])) {
            $validatedDataKelengkapan['ktp'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['ktp'] = 'belum lengkap';
        }

        if (!empty($validatedData['foto_sim']) && !empty($validatedData['nomor_sim'])) {
            $validatedDataKelengkapan['sim'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['sim'] = 'belum lengkap';
        }

        if (!empty($validatedData['nomor_telepon'])) {
            $validatedDataKelengkapan['nomor_telepon'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['nomor_telepon'] = 'belum lengkap';
        }

        $sopir = Sopir::create($validatedData);
        $kelengkapanSopir = KelengkapanSopir::create($validatedDataKelengkapan);

        if ($sopir && $kelengkapanSopir) {
            return redirect(route('sopir'))->with('success', 'Berhasil Tambah Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Tambah Sopir!');
        }
    }

    public function edit($id)
    {
        return view('sopir.edit', [
            'title' => 'Sopir',
            'sopir' => Sopir::where('id', $id)->first(),
        ]);
    }

    function update($id, Request $request)
    {
        $sopir = Sopir::where('id', $id)->first();
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|integer',
            'nomor_telepon' => 'nullable|integer',
            'nomor_ktp' => 'nullable|integer',
            'nomor_sim' => 'nullable|integer',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_sim' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
        ]);

        if ($request->file('foto_ktp')) {
            if ($sopir->foto_ktp) {
                $oldImagePath = public_path('assets/img/ktp-images/') . $sopir->foto_ktp;
                unlink($oldImagePath);
            }

            $image = $request->file('foto_ktp');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/ktp-images/'), $imageName);
            $validatedData['foto_ktp'] = $imageName;
        } else {
            $validatedData['foto_ktp'] = $sopir->foto_ktp;
        }

        if ($request->file('foto_sim')) {
            if ($sopir->foto_sim) {
                $oldImagePath = public_path('assets/img/sim-images/') . $sopir->foto_sim;
                unlink($oldImagePath);
            }

            $image = $request->file('foto_sim');
            $imageName = $validatedData['nik'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/sim-images/'), $imageName);
            $validatedData['foto_sim'] = $imageName;
        } else {
            $validatedData['foto_sim'] = $sopir->foto_sim;
        }

        if (!empty($validatedData['foto_ktp']) && !empty($validatedData['nomor_ktp'])) {
            $validatedDataKelengkapan['ktp'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['ktp'] = 'belum lengkap';
        }

        if (!empty($validatedData['foto_sim']) && !empty($validatedData['nomor_sim'])) {
            $validatedDataKelengkapan['sim'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['sim'] = 'belum lengkap';
        }

        if (!empty($validatedData['nomor_telepon'])) {
            $validatedDataKelengkapan['nomor_telepon'] = 'lengkap';
        } else {
            $validatedDataKelengkapan['nomor_telepon'] = 'belum lengkap';
        }

        $sopir = Sopir::where('id', $id)->first()->update($validatedData);
        $kelengkapanSopir = KelengkapanSopir::where('sopirs_id', $id)->first()->update($validatedDataKelengkapan);;

        if ($sopir && $kelengkapanSopir) {
            return redirect(route('sopir'))->with('success', 'Berhasil Edit Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Edit Sopir!');
        }
    }

    function delete($id)
    {
        $sopir = Sopir::where('id', $id)->first();

        if ($sopir->foto_ktp) {
            $imagePath = public_path('assets/img/ktp-images/') . $sopir->foto_ktp;
            unlink($imagePath);
        }

        if ($sopir->foto_sim) {
            $imagePath = public_path('assets/img/sim-images/') . $sopir->foto_sim;
            unlink($imagePath);
        }

        $sopir = $sopir->delete();
        $kelengkapanSopir = KelengkapanSopir::where('sopirs_id', $id)->first()->delete();

        if ($sopir && $kelengkapanSopir) {
            return redirect(route('sopir'))->with('success', 'Berhasil Hapus Sopir!');
        } else {
            return redirect(route('sopir'))->with('failed', 'Gagal Hapus Sopir!');
        }
    }
}
