<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\Pajak;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PajakController extends Controller
{
    public function index()
    {
        return view('pajak.index', [
            'title' => 'Pajak',
            'kendaraans' => Kendaraan::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $kendaraans = Kendaraan::where('nomor_plat', 'like', '%' . $request->search . '%')
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

        return view('pajak.index', [
            'title' => 'Pajak',
            'kendaraans' => $kendaraans,
        ]);
    }

    public function updateTax()
    {
        return view('dashboard.kendaraan_perbarui_pajak.index', [
            'title' => 'Kendaraan Belum Perbarui Pajak',
            'kendaraans' => Kendaraan::where(function ($query) {
                $query->where('terakhir_samsat', '>', Carbon::now()->subDays(14))
                    ->orWhere('terakhir_angsuran', '>', Carbon::now()->subDays(14))
                    ->orWhere('terakhir_ganti_nomor_polisi', '>', Carbon::now()->subDays(14));
            })->whereDate('terakhir_samsat', '>=', Carbon::now())
                ->whereDate('terakhir_angsuran', '>=', Carbon::now())
                ->whereDate('terakhir_ganti_nomor_polisi', '>=', Carbon::now())
                ->paginate(6),
        ]);
    }

    public function transaction($id)
    {
        return view('pajak.transaction', [
            'title' => 'Pajak',
            'kendaraan' => Kendaraan::where('id', $id)->with('jenis_kendaraan', 'brand_kendaraan', 'seri_kendaraan')->first(),
        ]);
    }

    public function transactionAction($id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'jenis_pajak' => 'required|string',
                'tanggal_bayar' => 'required|date',
                'lama_pajak' => 'required|string',
                'metode_bayar' => 'required|string',
                'jumlah_bayar' => 'required|string',
                'finance' => 'required|string',
            ]);

            $validatedData['jumlah_bayar'] = str_replace('Rp. ', '', $validatedData['jumlah_bayar']);
            $validatedData['jumlah_bayar'] = (int) str_replace('.', '', $validatedData['jumlah_bayar']);
            $validatedData['kendaraans_id'] = $id;

            $kendaraan = Kendaraan::where('id', $validatedData['kendaraans_id'])->first();
            if ($validatedData['jenis_pajak'] == 'samsat') {
                $kendaraan->update(['terakhir_samsat' => Carbon::parse($kendaraan->terakhir_samsat)->addYears($validatedData['lama_pajak'])]);
            } elseif ($validatedData['jenis_pajak'] == 'angsuran') {
                $kendaraan->update(['terakhir_angsuran' => Carbon::parse($kendaraan->terakhir_angsuran)->addYears($validatedData['lama_pajak'])]);
            } elseif ($validatedData['jenis_pajak'] == 'ganti nomor polisi') {
                $kendaraan->update(['terakhir_ganti_nomor_polisi' => Carbon::parse($kendaraan->terakhir_ganti_nomor_polisi)->addYears($validatedData['lama_pajak'])]);
            }
            Pajak::create($validatedData);
            $pajakID = Pajak::latest()->first();
            Laporan::create([
                'penggunas_id' => auth()->user()->id,
                'relations_id' => $pajakID->id,
                'kategori_laporan' => 'pajak',
            ]);
            return redirect(route('pajak'))->with('success', 'Berhasil Tambah Bayar Pajak Kendaraan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('pajak'))->with('failed', 'Gagal Tambah Bayar Pajak Kendaraan!');
        }
    }
}
