<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\KelengkapanPemesanan;
use App\Models\Laporan;
use App\Models\Pelanggan;
use App\Models\PelepasanPemesanan;
use App\Models\PembayaranPemesanan;
use App\Models\Pemesanan;
use App\Models\Sopir;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'bookings' => Pemesanan::where('status', 'booking')->orderBy('tanggal_mulai', 'ASC')->paginate(6),
        ]);
    }

    public function searchBooking($id)
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'bookings' => Pemesanan::where('status', 'booking')->where('kendaraans_id', $id)->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $bookings = Pemesanan::where('tanggal_mulai', '>=', $request->tanggal_mulai)->where('tanggal_akhir', '<=', $request->tanggal_akhir)->paginate(6);

        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'bookings' => $bookings,
        ]);
    }

    public function release($id)
    {
        return view('pemesanan.release', [
            'title' => 'Pemesanan',
            'pemesanan' => Pemesanan::where('id', $id)->first(),
            'sopirs' => Sopir::where('status', 'ada')->where('kelengkapan_ktp', 'lengkap')->where('kelengkapan_sim', 'lengkap')->where('kelengkapan_nomor_telepon', 'lengkap')->get(),
        ]);
    }

    public function releaseAction($id, Request $request)
    {
        $pemesanan = Pemesanan::where('id', $id)->with('pelanggan', 'kendaraan')->first();

        if ($request->sarung_jok == '' || $request->karpet == '' || $request->kondisi_kendaraan == '' || $request->ban_serep == '' || $request->jenis_pembayaran == '') {
            return redirect(route('pemesanan.release', $id))->with('failed', 'Isi Form Input Pelepasan & Pembayaran Kendaraan Terlebih Dahulu!');
        }

        return $request;

        $validatedData = $request->validate([
            'foto_dokumen' => 'required|image',
            'foto_kendaraan' => 'required|image',
            'foto_pelanggan' => 'required|image',
            'kilometer_keluar' => 'required|string',
            'bensin_keluar' => 'required|string',
            'tanggal_diambil' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'sarung_jok' => 'required|string',
            'karpet' => 'required|string',
            'kondisi_kendaraan' => 'required|string',
            'ban_serep' => 'required|string',
        ]);

        $validatedDataPembayaran = $request->validate([
            'foto_pembayaran' => 'required|image',
            'total_harian' => 'required|string',
            'total_mingguan' => 'required|string',
            'total_bulanan' => 'required|string',
            'waktu_sewa' => 'required|string',
            'total_tarif_sewa' => 'required|string',
            'jenis_pembayaran' => 'required|string',
            'total_bayar' => 'nullable|string',
            'metode_bayar' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        if (is_string($validatedData['kilometer_keluar'])) {
            $validatedData['kilometer_keluar'] = (int)$validatedData['kilometer_keluar'];
        }

        if (is_string($validatedData['bensin_keluar'])) {
            $validatedData['bensin_keluar'] = (int)$validatedData['bensin_keluar'];
        }

        $validatedData['pemesanans_id'] = $pemesanan->id;
        $validatedData['kendaraans_id'] = $pemesanan->kendaraans_id;


        if (!empty($validatedData['foto_dokumen'])) {
            $image = $request->file('foto_dokumen');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-dokumen-images/'), $imageName);
            $validatedData['foto_dokumen'] = $imageName;
        }

        if (!empty($validatedData['foto_kendaraan'])) {
            $image = $request->file('foto_kendaraan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        }

        if (!empty($validatedData['foto_pelanggan'])) {
            $image = $request->file('foto_pelanggan');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pemesanan-pelanggan-images/'), $imageName);
            $validatedData['foto_pelanggan'] = $imageName;
        }

        $validatedDataPembayaran['kendaraans_id'] = $pemesanan->kendaraans_id;

        $pelepasanPemesananID = PelepasanPemesanan::latest()->first();
        if ($pelepasanPemesananID) {
            $validatedDataPembayaran['pelepasan_pemesanans_id'] = $pelepasanPemesananID->id + 1;
        } else {
            $validatedDataPembayaran['pelepasan_pemesanans_id'] = 1;
        }

        if ($request->sopirs_id == "-") {
            $validatedDataPembayaran['sopirs_id'] = null;
        } else {
            $validatedDataPembayaran['sopirs_id'] = $request->sopirs_id;
            Sopir::where('id', $validatedDataPembayaran['sopirs_id'])->first()->update([
                'status' => 'tidak ada',
            ]);
        }

        if ($request->metode_bayar == "-") {
            $validatedDataPembayaran['metode_bayar'] = null;
        }

        if (!empty($validatedDataPembayaran['foto_pembayaran'])) {
            $image = $request->file('foto_pembayaran');
            $imageName = date("Ymdhis") . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/img/pembayaran-pemesanan-images/'), $imageName);
            $validatedDataPembayaran['foto_pembayaran'] = $imageName;
        }

        $pelepasanPemesanan = PelepasanPemesanan::create($validatedData);
        $pembayaranPemesanan = PembayaranPemesanan::create($validatedDataPembayaran);
        $kendaraan = Kendaraan::where('id', $validatedData['kendaraans_id'])->first()->update([
            'kilometer_saat_ini' => $validatedData['kilometer_keluar'],
            'status' => 'dipesan',
        ]);

        $laporan = Laporan::create([
            'penggunas_id' => auth()->user()->id,
            'relations_id' => $validatedDataPembayaran['pelepasan_pemesanans_id'],
            'kategori_laporan' => 'pemesanan',
        ]);

        $pemesanan = $pemesanan->update([
            'total_harian' => $validatedDataPembayaran['total_harian'],
            'total_mingguan' => $validatedDataPembayaran['total_mingguan'],
            'total_bulanan' => $validatedDataPembayaran['total_bulanan'],
            'tanggal_mulai' => $validatedData['tanggal_diambil'],
            'tanggal_akhir' => $validatedData['tanggal_kembali'],
            'status' => 'selesai booking',
        ]);

        if ($pelepasanPemesanan && $pembayaranPemesanan && $kendaraan && $laporan && $pemesanan) {
            return redirect(route('pemesanan'))->with('success', 'Berhasil Melakukan Pelepasan Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Melakukan Pelepasan Kendaraan!');
        }
    }
}
