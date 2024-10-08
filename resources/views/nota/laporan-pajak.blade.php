@extends('template.main')

@section('content')
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
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Laporan Data Pajak</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="input-wrapper">
                            <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Kendaraan</p>
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
                                value="{{ $pajak->kendaraan->stnk_nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="nomor_seri">Tipe Kendaraan</label>
                            <input type="text" id="nomor_seri" class="input" autocomplete="off"
                                value="{{ $pajak->kendaraan->seri_kendaraan->nomor_seri }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jenis">Jenis Kendaraan</label>
                            <input type="text" id="jenis" class="input" autocomplete="off"
                                value="{{ $pajak->kendaraan->jenis_kendaraan->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="brand">Brand Kendaraan</label>
                            <input type="text" id="brand" class="input" autocomplete="off"
                                value="{{ $pajak->kendaraan->brand_kendaraan->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jenis_pajak">Jenis Pajak</label>
                            <input type="text" class="input" id="jenis_pajak" value="{{ $pajak->jenis_pajak }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="metode_bayar">Metode Pembayaran</label>
                            <input type="text" class="input" id="metode_bayar" value="{{ $pajak->metode_bayar }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_bayar">Tanggal Bayar</label>
                            <input type="date" id="tanggal_bayar" class="input" autocomplete="off" name="tanggal_bayar"
                                value="{{ $pajak->tanggal_bayar }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <input type="text" id="jumlah_bayar" class="input" autocomplete="off" name="jumlah_bayar"
                                value="Rp. {{ number_format($pajak->jumlah_bayar, 2, ",", ".") }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="finance">Staff Finance</label>
                            <input type="text" id="finance" class="input" autocomplete="off" readonly
                                value="{{ $pajak->finance }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="penggunas_id">Pengguna Menambahkan</label>
                            <input type="text" id="penggunas_id" class="input" autocomplete="off" readonly
                                value="{{ $laporan->pengguna->nama_lengkap }}">
                        </div>
                    </div>
                    <div class="col-md-4 row-button">
                        <div class="input-wrapper">
                            <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                            <input type="text" id="tanggal_dibuat" class="input" autocomplete="off" readonly
                                value="{{ $laporan->created_at }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-wrapper d-flex">
                            <a href="{{ route('laporan.pajak') }}" class="button-reverse">Kembali ke Halaman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
