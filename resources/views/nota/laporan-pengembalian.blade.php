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
                <div class="row">
                    <div class="col-12">
                        <h5 class="title">Data Pengembalian Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Nama Pelanggan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->pemesanan->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Telepon</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->pemesanan->pelanggan->nomor_telepon }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Plat</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->kendaraan->nomor_plat }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Jenis Pembayaran</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->jenis_pembayaran }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Total Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    Rp. {{ $pengembalian->total_bayar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Metode Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->metode_bayar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Tanggal Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->tanggal_kembali }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kilometer Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->kilometer_kembali }} km</td>
                            </tr>
                            <tr>
                                <td scope="col">Bensin Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->bensin_kembali }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Ketepatan Waktu</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->ketepatan_waktu }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Terlambat</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->terlambat ?: '-' }} hari</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5 class="title">Data Kelengkapan Pengembalian Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sarung Jok</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->sarung_jok }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Karpet</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->karpet }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kondisi Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->kondisi_kendaraan }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Ban Serep</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->ban_serep }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5 class="title">Data Kelengkapan Pelepasan Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sarung Jok</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->sarung_jok }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Karpet</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->karpet }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kondisi Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pengembalian->pelepasan_pemesanan->kondisi_kendaraan }}</td>
                            </tr>
                            @if ($pengembalian->pelepasan_pemesanan->ban_serep)
                                <tr>
                                    <td scope="col">Ban Serep</td>
                                    <td scope="col-1">:</td>
                                    <td scope="col" class="text-end">{{ $pengembalian->pelepasan_pemesanan->ban_serep }}
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
