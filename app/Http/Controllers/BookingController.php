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

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('status', 'ready')->orWhere('status', 'booking')
            ->where('nama_kendaraan', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_polisi', 'like', '%' . $request->search . '%')
            ->orWhere('kilometer_saat_ini', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_hari', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_minggu', 'like', '%' . $request->search . '%')
            ->orWhere('tarif_sewa_bulan', 'like', '%' . $request->search . '%')
            ->orWhere('tahun_pembuatan', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pembelian', 'like', '%' . $request->search . '%')
            ->orWhere('warna', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_rangka', 'like', '%' . $request->search . '%')
            ->orWhere('nomor_mesin', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('booking.index', [
            'title' => 'Pemesanan',
            'kendaraans' => $kendaraans,
            'pelanggans' => Pelanggan::where('status', 'ada')->where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_kk', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->get(),
        ]);
    }

    function booking(Request $request)
    {
        if ($request->pelanggans_id == '-') {
            return redirect(route('booking'))->with('failed', 'Isi Form Input Pelanggan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'pelanggans_id' => 'required|string',
            'kendaraans_id' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        $validatedData['status'] = 'booking';

        if (is_string($validatedData['pelanggans_id'])) {
            $validatedData['pelanggans_id'] = (int)$validatedData['pelanggans_id'];
        }

        if (is_string($validatedData['kendaraans_id'])) {
            $validatedData['kendaraans_id'] = (int)$validatedData['kendaraans_id'];
        }

        $pemesanan = Pemesanan::create($validatedData);
        $pemesananID = Pemesanan::latest()->first();
        $kendaraan = Kendaraan::where('id', $validatedData['kendaraans_id'])->first()->update([
            'status' => 'booking',
        ]);

        $pelanggan = Pelanggan::where('id', $validatedData['pelanggans_id'])->first()->update([
            'status' => 'tidak ada',
        ]);

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $pemesananID->id,
            'kategori_laporan' => 'booking',
        ]);

        if ($pemesanan && $kendaraan && $pelanggan && $laporan) {
            return redirect(route('booking'))->with('success', 'Berhasil Booking Kendaraan!');
        } else {
            return redirect(route('booking'))->with('failed', 'Gagal Booking Kendaraan!');
        }
    }

    function detail($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->with('pelanggan', 'kendaraan')->first();
        return response()->json($pemesanan);
    }

    function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        $pemesanan = Pemesanan::where('id', $id)->first()->update($validatedData);

        if ($pemesanan) {
            return redirect(route('pemesanan'))->with('success', 'Berhasil Update Booking Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Update Booking Kendaraan!');
        }
    }

    public function delete($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->first();
        $pemesananCount = Pemesanan::where('kendaraans_id', $pemesanan->kendaraans_id)->count();

        $pelanggan = Pelanggan::where('id', $pemesanan->pelanggans_id)->first()->update([
            'status' => 'ada',
        ]);

        $laporan = Laporan::where('relations_id', $pemesanan->id)->where('kategori_laporan', 'booking')->first();
        $laporan = $laporan->delete();

        if ($pemesananCount == 1) {
            Kendaraan::where('id', $pemesanan->kendaraans_id)->first()->update([
                'status' => 'ready',
            ]);
        }

        $pemesanan = $pemesanan->delete();


        if ($pemesanan && $pelanggan && $laporan) {
            return redirect(route('pemesanan'))->with('success', 'Berhasil Hapus Booking Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Hapus Booking Kendaraan!');
        }
    }
}
