@extends('template.main')

@section('content')
    @php
        use Carbon\Carbon;
        $terakhir_samsat = Carbon::parse($pajak->kendaraan->terakhir_samsat);
        $terakhir_angsuran = Carbon::parse($pajak->kendaraan->terakhir_angsuran);
        $terakhir_ganti_nomor_polisi = Carbon::parse($pajak->kendaraan->terakhir_ganti_nomor_polisi);
    @endphp
    <div class="content">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('failed'))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ session('failed') }}
                    </div>
                @elseif($terakhir_samsat->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak samsat sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_angsuran->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak angsuran sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_ganti_nomor_polisi->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak ganti nomor polisi sudah lewat untuk kendaraan ini
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Detail Riwayat Bayar Pajak</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $pajak->kendaraan->foto_kendaraan) }}"
                                        class="img-fluid" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="stnk_nama">STNK Atas Nama</label>
                                <input type="text" id="stnk_nama" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->stnk_nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_seri">Tipe Kendaraan</label>
                                <input type="text" id="nomor_seri" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->seri_kendaraan->nomor_seri }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <input type="text" id="jenis" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->jenis_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Samsat</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->terakhir_samsat }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Angsuran</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->terakhir_angsuran }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Ganti Nomor Polisi</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $pajak->kendaraan->terakhir_ganti_nomor_polisi }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_pajak">Jenis Pajak</label>
                                <input type="text" id="jenis_pajak" class="input text-capitalize" autocomplete="off"
                                    value="{{ $pajak->jenis_pajak }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="metode_bayar">Metode Pembayaran</label>
                                <input type="text" id="metode_bayar" class="input text-capitalize" autocomplete="off"
                                    value="{{ $pajak->metode_bayar }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="lama_pajak">Jumlah Tahun Pajak</label>
                                <input type="text" id="lama_pajak" class="input text-capitalize" autocomplete="off"
                                    value="{{ $pajak->lama_pajak }} tahun" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="text" id="tanggal_bayar" class="input" autocomplete="off"
                                    name="tanggal_bayar" value="{{ $pajak->tanggal_bayar }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="text" id="jumlah_bayar" class="input" autocomplete="off"
                                    name="jumlah_bayar"
                                    value="Rp. {{ number_format($pajak->jumlah_bayar, 2, ',', '.') }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 row-button">
                            <div class="input-wrapper">
                                <label for="finance">Staff Finance</label>
                                <input type="text" id="finance" class="input" autocomplete="off" name="finance"
                                    value="{{ $pajak->finance }}" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <a href="{{ route('kendaraan.historyTax', $pajak->kendaraan->id) }}"
                                    class="button-reverse">Kembali ke Halaman Riwayat</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
