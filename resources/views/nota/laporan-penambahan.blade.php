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
                <h5 class="title">Data Penambahan Sewa</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama Pelanggan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $penambahan->pelepasan_pemesanan->pemesanan->pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Telepon</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $penambahan->pelepasan_pemesanan->pemesanan->pelanggan->nomor_telepon }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">Nama Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $penambahan->pelepasan_pemesanan->kendaraan->brand_kendaraan->nama }}
                            {{ $penambahan->pelepasan_pemesanan->kendaraan->nama_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Polisi</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $penambahan->pelepasan_pemesanan->kendaraan->nomor_polisi }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Kembali</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $penambahan->pelepasan_pemesanan->tanggal_kembali }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Jumlah Hari</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $penambahan->jumlah_hari }} hari</td>
                    </tr>
                    <tr>
                        <td scope="col">Total Biaya</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $penambahan->total_biaya }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Keterangan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $penambahan->keterangan }}</td>
                    </tr>
                </table>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
