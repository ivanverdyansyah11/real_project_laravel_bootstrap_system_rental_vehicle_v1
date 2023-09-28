<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\PelepasanPemesanan;
use App\Models\PembayaranPemesanan;
use App\Models\PenambahanSewa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenambahanSewaController extends Controller
{
    public function create($id)
    {
        return view('penambahan-sewa.create', [
            'title' => 'Kendaraan Disewa',
            'pemesanan' => PelepasanPemesanan::where('kendaraans_id', $id)->with('kendaraan')->latest()->first(),
        ]);
    }

    public function store($id, Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_hari' => 'required|string',
            'total_biaya' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        $pemesanan = PelepasanPemesanan::where('kendaraans_id', $id)->with('kendaraan')->latest()->first();
        $pembayaran = PembayaranPemesanan::where('kendaraans_id', $id)->latest()->first();

        $validatedData['pelepasan_pemesanans_id'] = $pemesanan->id;
        $validatedData['kendaraans_id'] = $id;

        $tanggal_kembali = Carbon::parse($pemesanan->tanggal_kembali);
        $jumlah_hari = (int)$validatedData['jumlah_hari'];
        $tanggal_kembali->addDays($jumlah_hari);

        $pemesanan = PelepasanPemesanan::where('kendaraans_id', $id)->latest()->first()->update([
            'tanggal_kembali' => $tanggal_kembali,
        ]);

        $waktu_sewa = $pembayaran->waktu_sewa + (int)$validatedData['jumlah_hari'];
        $total_tarif_sewa = $pembayaran->total_tarif_sewa + (int)$validatedData['total_biaya'];

        $pembayaran = PembayaranPemesanan::where('kendaraans_id', $id)->latest()->first()->update([
            'waktu_sewa' => $waktu_sewa,
            'total_tarif_sewa' => $total_tarif_sewa,
        ]);

        $penambahan = PenambahanSewa::create($validatedData);
        $penambahanID = PenambahanSewa::latest()->first();

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $penambahanID->id,
            'kategori_laporan' => 'penambahan',
        ]);

        if ($penambahan && $pemesanan && $pembayaran && $laporan) {
            return redirect(route('pengembalian'))->with('success', 'Berhasil Melakukan Penambahan Hari Sewa Kendaraan!');
        } else {
            return redirect(route('pengembalian'))->with('failed', 'Gagal Melakukan Penambahan Hari Sewa Kendaraan!');
        }
    }
}
