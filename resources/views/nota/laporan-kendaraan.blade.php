{{-- @extends('template.main')

@section('content')
    <div class="report-nota row justify-content-center my-5">
        <div class="col-md-9 col-lg-7 col-xl-6">
            <div class="nota-paper mx-3 mx-md-0">
                <div class="wrapper d-flex justify-content-between align-items-end">
                    <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        class="img-fluid login-brand d-none d-md-inline-block" draggable="false" width="240">
                    <p class="paragraph">Petugas: {{ $laporan->pengguna->nama_lengkap }}</p>
                </div>
                <h5 class="title">Data Kendaraan</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Jenis Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->jenis_kendaraan->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Brand Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->brand_kendaraan->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Seri Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->seri_kendaraan->nomor_seri }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Plat</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->nomor_plat }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Kategori Kilometer Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">Kilometer {{ $kendaraan->kilometer_kendaraan->jumlah }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nama Pada STNK</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->stnk_nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Kilometer Diservis</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->kilometer }} km</td>
                    </tr>
                    <tr>
                        <td scope="col">Kilometer Saat Ini</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->kilometer_saat_ini }} km</td>
                    </tr>
                    <tr>
                        <td scope="col">Tarif Sewa Hari</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">Rp. {{ $kendaraan->tarif_sewa_hari }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tarif Sewa Minggu</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">Rp. {{ $kendaraan->tarif_sewa_minggu }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tarif Sewa Bulan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">Rp. {{ $kendaraan->tarif_sewa_bulan }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tahun Pembuatan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->tahun_pembuatan }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Pembelian</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->tanggal_pembelian }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Warna</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->warna }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Rangka</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->nomor_rangka }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Mesin</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $kendaraan->nomor_mesin }}</td>
                    </tr>
                </table>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection --}}

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
                <h5 class="subtitle">Laporan Data Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="stnk_nama">STNK Atas Nama</label>
                                        <input type="text" id="stnk_nama" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->stnk_nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->nomor_plat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jenis">Jenis Kendaraan</label>
                                        <input type="text" id="jenis" class="input" autocomplete="off"
                                            value="{{ $kendaraan->jenis_kendaraan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="brand">Brand Kendaraan</label>
                                        <input type="text" id="brand" class="input" autocomplete="off"
                                            value="{{ $kendaraan->brand_kendaraan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="seri">Nomor Seri</label>
                                        <input type="text" id="seri" class="input" autocomplete="off"
                                            value="{{ $kendaraan->seri_kendaraan->nomor_seri }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer">Kategori Kilometer</label>
                                        <input type="text" id="kilometer" class="input" autocomplete="off"
                                            value="{{ $kendaraan->kilometer_kendaraan->jumlah }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer">Kilometer</label>
                                        <input type="text" id="kilometer" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->kilometer_saat_ini }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_hari">Tarif Sewa Harian</label>
                                        <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_hari }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_minggu">Tarif Sewa Mingguan</label>
                                        <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_minggu }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_bulan">Tarif Sewa Bulanan</label>
                                        <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tarif_sewa_bulan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tahun_pembuatan">Tahun Pembuatan</label>
                                        <input type="text" id="tahun_pembuatan" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tahun_pembuatan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_pembelian">Tanggal Pembelian</label>
                                        <input type="text" id="tanggal_pembelian" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->tanggal_pembelian }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="warna">Warna</label>
                                        <input type="text" id="warna" class="input" autocomplete="off" readonly
                                            value="{{ $kendaraan->warna }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_rangka">Nomor Rangka</label>
                                        <input type="text" id="nomor_rangka" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->nomor_rangka }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_mesin">Nomor Mesin</label>
                                        <input type="text" id="nomor_mesin" class="input" autocomplete="off"
                                            readonly value="{{ $kendaraan->nomor_mesin }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="penggunas_id">Pengguna Menambahkan</label>
                                        <input type="text" id="penggunas_id" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->pengguna->nama_lengkap }}">
                                    </div>
                                </div>
                                <div class="col-md-6 row-button">
                                    <div class="input-wrapper">
                                        <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                        <input type="text" id="tanggal_dibuat" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->created_at }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <a href="{{ route('laporan.kendaraan') }}" class="button-reverse">Kembali ke
                                            Halaman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
