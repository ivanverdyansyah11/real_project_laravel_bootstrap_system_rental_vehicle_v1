@extends('template.main')

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
@endsection
