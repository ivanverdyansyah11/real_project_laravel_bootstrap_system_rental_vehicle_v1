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

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'kendaraans' => Kendaraan::where('status', 'booking')->with('jenis_kendaraan', 'brand_kendaraan')->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('status', 'booking')
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

        return view('pemesanan.index', [
            'title' => 'Pemesanan',
            'kendaraans' => $kendaraans,
        ]);
    }

    function booking(Request $request)
    {
        if ($request->pelanggans_id == '-') {
            return redirect(route('kendaraan'))->with('failed', 'Isi Form Input Pelanggan Terlebih Dahulu!');
        }

        $validatedData = $request->validate([
            'pelanggans_id' => 'required|integer',
            'kendaraans_id' => 'required|integer',
            'tanggal_booking' => 'required|date',
        ]);

        $pemesananID = Pemesanan::latest()->first();
        if ($pemesananID) {
            $validatedDataPemesanan['pemesanans_id'] = $pemesananID->id + 1;
        } else {
            $validatedDataPemesanan['pemesanans_id'] = 1;
        }

        $validatedDataPemesanan['jenis_kendaraan'] = 'lengkap';
        $validatedDataPemesanan['nama_pemesan'] = 'lengkap';

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
            return redirect(route('pemesanan'))->with('success', 'Berhasil Tambah Pemesanan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Tambah Pemesanan!');
        }
    }

    public function release($id)
    {
        return view('pemesanan.release', [
            'title' => 'Pemesanan',
            'pemesanan' => Pemesanan::where('kendaraans_id', $id)->first(),
            'jenis_kendaraan' => JenisKendaraan::where('nama', "Kendaraan Beroda 4")->first(),
            'sopirs' => Sopir::all(),
        ]);
    }

    public function releaseAction($id, Request $request)
    {
        $pemesanan = Pemesanan::where('kendaraans_id', $id)->with('pelanggan', 'kendaraan')->first();

        $jenis_kendaraan = JenisKendaraan::where('nama', "Kendaraan Beroda 4")->first();
        if ($pemesanan->kendaraan->jenis_kendaraans_id == $jenis_kendaraan->id) {
            if ($request->sarung_jok == '-' || $request->karpet == '-' || $request->kondisi_kendaraan == '-' || $request->ban_serep == '-' || $request->jenis_pembayaran == '-' || $request->metode_pembayaran == '-') {
                return redirect(route('pemesanan'))->with('failed', 'Isi Form Input Kelengkapan Pelepasan & Pembayaran Kendaraan Terlebih Dahulu!');
            }
        } else {
            if ($request->sarung_jok == '-' || $request->karpet == '-' || $request->kondisi_kendaraan == '-' || $request->jenis_pembayaran == '-' || $request->metode_pembayaran == '-') {
                return redirect(route('pemesanan'))->with('failed', 'Isi Form Input Kelengkapan Pelepasan & Pembayaran Kendaraan Terlebih Dahulu!');
            }
        }

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
        ]);

        $validatedDataPembayaran = $request->validate([
            'foto_pembayaran' => 'required|image',
            'waktu_sewa' => 'required|string',
            'total_tarif_sewa' => 'required|string',
            'jenis_pembayaran' => 'required|string',
            'total_bayar' => 'nullable|string',
            'metode_bayar' => 'nullable|string',
            'keterangan' => 'nullable|text',
        ]);

        if (is_string($validatedData['kilometer_keluar'])) {
            $validatedData['kilometer_keluar'] = (int)$validatedData['kilometer_keluar'];
        }

        if (is_string($validatedData['bensin_keluar'])) {
            $validatedData['bensin_keluar'] = (int)$validatedData['bensin_keluar'];
        }

        if ($pemesanan->kendaraan->jenis_kendaraans_id == $jenis_kendaraan->id) {
            $validatedData['ban_serep'] = $request->ban_serep;
        }

        $validatedData['pemesanans_id'] = $pemesanan->pelanggans_id;
        $validatedData['kendaraans_id'] = $pemesanan->kendaraans_id;


        if (!empty($validatedData['foto_dokumen'])) {
            $image = $request->file('foto_dokumen');
            $imageName = $validatedData['tanggal_diambil'] . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/pemesanan-dokumen-images/'), $imageName);
            $validatedData['foto_dokumen'] = $imageName;
        }

        if (!empty($validatedData['foto_kendaraan'])) {
            $image = $request->file('foto_kendaraan');
            $imageName = $pemesanan->kendaraan->nama_kendaraan . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/pemesanan-kendaraan-images/'), $imageName);
            $validatedData['foto_kendaraan'] = $imageName;
        }

        if (!empty($validatedData['foto_pelanggan'])) {
            $image = $request->file('foto_pelanggan');
            $imageName = $pemesanan->pelanggan->nama . '-foto' . '.' . $image->getClientOriginalExtension();;
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

        if (!empty($validatedData['foto_pembayaran'])) {
            $image = $request->file('foto_pembayaran');
            $imageName = $pemesanan->pelanggan->nama . '-foto' . '.' . $image->getClientOriginalExtension();;
            $image->move(public_path('assets/img/pembayaran-pemesanan-images/'), $imageName);
            $validatedData['foto_pembayaran'] = $imageName;
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

        if ($pelepasanPemesanan && $pembayaranPemesanan && $kendaraan && $laporan) {
            return redirect(route('laporan'))->with('success', 'Berhasil Melakukan Pelepasan Kendaraan!');
        } else {
            return redirect(route('pemesanan'))->with('failed', 'Gagal Melakukan Pelepasan Kendaraan!');
        }
    }

    public function delete($id)
    {
        $pemesanan = Pemesanan::where('kendaraans_id', $id)->first();

        $pelanggan = Pelanggan::where('id', $pemesanan->pelanggans_id)->first()->update([
            'status' => 'ada',
        ]);

        $laporan = Laporan::where('relations_id', $pemesanan->id)->where('kategori_laporan', 'booking')->first();
        $laporan = $laporan->delete();

        $pemesanan = $pemesanan->delete();

        $kendaraan = Kendaraan::where('id', $id)->first()->update([
            'status' => 'ready',
        ]);

        if ($kendaraan && $pemesanan && $pelanggan && $laporan) {
            return redirect(route('kendaraan'))->with('success', 'Berhasil Hapus Pemesanan Kendaraan!');
        } else {
            return redirect(route('kendaraan'))->with('failed', 'Gagal Hapus Pemesanan Kendaraan!');
        }
    }
}
