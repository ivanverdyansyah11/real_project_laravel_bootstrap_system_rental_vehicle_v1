@extends('template.main')

@section('content')
    <div class="report-nota row justify-content-center my-5">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <div class="nota-paper mx-3 mx-md-0">
                <div class="wrapper d-flex justify-content-between align-items-end">
                    <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        class="img-fluid login-brand d-none d-md-inline-block" draggable="false" width="240">
                    <p class="paragraph">Petugas: {{ $laporan->pengguna->nama_lengkap }}</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="title">Data Pengembalian Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Nama Pelanggan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pemesanan->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Telepon</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pemesanan->pelanggan->nomor_telepon }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Nama Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->kendaraan->brand_kendaraan->nama }}
                                    {{ $pemesanan->kendaraan->nama_kendaraan }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Nomor Polisi</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->kendaraan->nomor_polisi }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kilometer Keluar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->kilometer_keluar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Bensin Keluar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->bensin_keluar }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Tanggal Diambil</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->tanggal_diambil }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Tanggal Kembali</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->tanggal_kembali }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="title">Data Pembayaran Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sopir</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pembayaran_pemesanan->sopir->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Waktu Sewa</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pembayaran_pemesanan->waktu_sewa }} hari
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Jenis Pembayaran</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pemesanan->pembayaran_pemesanan->jenis_pembayaran }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Total Tarif Sewa</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">
                                    {{ $pemesanan->pembayaran_pemesanan->total_tarif_sewa }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Total Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pembayaran_pemesanan->total_bayar }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Metode Bayar</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pembayaran_pemesanan->metode_bayar }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Keterangan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->pembayaran_pemesanan->keterangan }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5 class="title">Data Kelengkapan Pelepasan Kendaraan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <td scope="col">Sarung Jok</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->sarung_jok }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Karpet</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->karpet }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Kondisi Kendaraan</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->kondisi_kendaraan }}</td>
                            </tr>
                            <tr>
                                <td scope="col">Ban Serep</td>
                                <td scope="col-1">:</td>
                                <td scope="col" class="text-end">{{ $pemesanan->ban_serep ?: 'kosong' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
