<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pajak;
use App\Models\Pelanggan;
use App\Models\PelepasanPemesanan;
use App\Models\Pemesanan;
use App\Models\PenambahanSewa;
use App\Models\Pengembalian;
use App\Models\Servis;
use App\Models\Sopir;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPelanggan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pelanggan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pelanggan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanSopir()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'sopir')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'sopir')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanKendaraan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'kendaraan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'kendaraan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanBooking()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'booking')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'booking')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPemesanan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pemesanan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pemesanan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPengembalian()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pengembalian')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pengembalian')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPenambahan()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'penambahan')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'penambahan')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanServis()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'servis')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'servis')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function laporanPajak()
    {
        if (auth()->user()->role == 'admin') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pajak')->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        } elseif (auth()->user()->role == 'staff') {
            return view('laporan.index', [
                'title' => 'Laporan',
                'laporans' => Laporan::where('kategori_laporan', 'pajak')->where('penggunas_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(6),
            ]);
        }
    }

    public function nota($id)
    {
        $laporan = Laporan::where('id', $id)->with('pengguna')->first();

        if ($laporan->kategori_laporan == 'pelanggan') {
            return view('nota.laporan-pelanggan', [
                'title' => 'Nota Pelanggan',
                'laporan' => $laporan,
                'pelanggan' => Pelanggan::where('id', $laporan->relations_id)->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'sopir') {
            return view('nota.laporan-sopir', [
                'title' => 'Nota Sopir',
                'laporan' => $laporan,
                'sopir' => Sopir::where('id', $laporan->relations_id)->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'kendaraan') {
            return view('nota.laporan-kendaraan', [
                'title' => 'Nota Kendaraan',
                'laporan' => $laporan,
                'kendaraan' => Kendaraan::where('id', $laporan->relations_id)->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan', 'kilometer_kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'booking') {
            return view('nota.laporan-booking', [
                'title' => 'Nota Booking',
                'laporan' => $laporan,
                'booking' => Pemesanan::where('id', $laporan->relations_id)->with('kendaraan', 'pelanggan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pemesanan') {
            return view('nota.laporan-pemesanan', [
                'title' => 'Nota Pemesanan',
                'laporan' => $laporan,
                'pemesanan' => PelepasanPemesanan::where('id', $laporan->relations_id)->with('kendaraan', 'pemesanan', 'pembayaran_pemesanan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pengembalian') {
            return view('nota.laporan-pengembalian', [
                'title' => 'Nota Pengembalian',
                'laporan' => $laporan,
                'pengembalian' => Pengembalian::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'penambahan') {
            return view('nota.laporan-penambahan', [
                'title' => 'Nota Penambahan',
                'laporan' => $laporan,
                'penambahan' => PenambahanSewa::where('id', $laporan->relations_id)->with('pelepasan_pemesanan', 'kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'servis') {
            return view('nota.laporan-servis', [
                'title' => 'Nota Servis',
                'laporan' => $laporan,
                'servis' => Servis::where('id', $laporan->relations_id)->with('kendaraan')->first(),
            ]);
        } elseif ($laporan->kategori_laporan == 'pajak') {
            return view('nota.laporan-pajak', [
                'title' => 'Nota Pajak',
                'laporan' => $laporan,
                'pajak' => Pajak::where('id', $laporan->relations_id)->with('kendaraan')->first(),
            ]);
        }
    }
}
