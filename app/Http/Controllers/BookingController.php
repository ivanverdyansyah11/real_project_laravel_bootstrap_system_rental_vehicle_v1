<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index', [
            'title' => 'Booking',
            'kendaraans' => Kendaraan::where('status', 'ready')->orWhere('status', 'booking')->paginate(6),
            'pelanggans' => Pelanggan::where('status', 'ada')->where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_kk', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->get(),
        ]);
    }

    // public function search(Request $request)
    // {
    //     $kendaraans = Kendaraan::where('status', 'booking')
    //         ->where('nama_kendaraan', 'like', '%' . $request->search . '%')
    //         ->orWhere('nomor_polisi', 'like', '%' . $request->search . '%')
    //         ->orWhere('kilometer_saat_ini', 'like', '%' . $request->search . '%')
    //         ->orWhere('tarif_sewa_hari', 'like', '%' . $request->search . '%')
    //         ->orWhere('tarif_sewa_minggu', 'like', '%' . $request->search . '%')
    //         ->orWhere('tarif_sewa_bulan', 'like', '%' . $request->search . '%')
    //         ->orWhere('tahun_pembuatan', 'like', '%' . $request->search . '%')
    //         ->orWhere('tanggal_pembelian', 'like', '%' . $request->search . '%')
    //         ->orWhere('warna', 'like', '%' . $request->search . '%')
    //         ->orWhere('nomor_rangka', 'like', '%' . $request->search . '%')
    //         ->orWhere('nomor_mesin', 'like', '%' . $request->search . '%')
    //         ->paginate(6);

    //     return view('pemesanan.index', [
    //         'title' => 'Pemesanan',
    //         'kendaraans' => $kendaraans,
    //     ]);
    // }

    function booking(Request $request)
    {
        if ($request->pelanggans_id == '-') {
            return redirect(route('kendaraan'))->with('failed', 'Isi Form Input Pelanggan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'pelanggans_id' => 'required|string',
            'kendaraans_id' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        if (is_string($validatedData['pelanggans_id'])) {
            $validatedData['pelanggans_id'] = (int)$validatedData['pelanggans_id'];
        }

        if (is_string($validatedData['kendaraans_id'])) {
            $validatedData['kendaraans_id'] = (int)$validatedData['kendaraans_id'];
        }

        $pemesanan = Pemesanan::create($validatedData);
        $pemesananID = Pemesanan::latest()->first();

        $pelanggan = Pelanggan::where('id', $validatedData['pelanggans_id'])->first()->update([
            'status' => 'tidak ada',
        ]);

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $pemesananID->id,
            'kategori_laporan' => 'booking',
        ]);

        if ($pemesanan && $pelanggan && $laporan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Tambah Pemesanan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Tambah Pemesanan!');
        }
    }
}
