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
                <h5 class="subtitle">Laporan Data Pengembalian Kendaraan</h5>
                <a href="{{ route('laporan.pengembalian.print', $laporan->id) }}"
                    class="button-primary d-flex gap-2 align-items-center">
                    <div class="export-icon"></div>
                    Print Pemesanan
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Pembayaran</p>
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ asset('assets/img/pengembalian-pemesanan-images/' . $pengembalian->foto_pembayaran) }}"
                                    class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran_sebelumnya">Jenis Pembayaran Sebelumnya</label>
                                    <input type="text" id="jenis_pembayaran_sebelumnya" class="input" autocomplete="off"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar Sebelumnya</label>
                                    <input type="text" id="total_bayar" class="input" autocomplete="off"
                                        value="Rp. {{ $pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->total_bayar ? number_format($pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->total_bayar, 2, ',', '.') : '0' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" class="input"
                                        value="{{ $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir_awal ? $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir_awal : $pengembalian->pelepasan_pemesanan->pemesanan->tanggal_akhir }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                    <input type="text" id="total_tarif_sewa" class="input"
                                        value="Rp. {{ number_format($pengembalian->pelepasan_pemesanan->pembayaran_pemesanan->total_tarif_sewa, 2, ',', '.') }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <input type="text" id="jenis_pembayaran" class="input"
                                        value="{{ $pengembalian->jenis_pembayaran }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="metode_bayar">Metode Pembayaran</label>
                                    <input type="text" id="metode_bayar" class="input"
                                        value="{{ $pengembalian->metode_bayar }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_kembali">Pengembalian Tanggal</label>
                                    <input type="date" id="tanggal_kembali" class="input"
                                        value="{{ $pengembalian->tanggal_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="text" id="total_bayar" class="input"
                                        value="Rp. {{ number_format($pengembalian->total_bayar, 2, ',', '.') }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer">Kilometer Awal (Km)</label>
                                    <input type="number" id="kilometer" class="input" autocomplete="off"
                                        value="{{ $pengembalian->pelepasan_pemesanan->kendaraan->kilometer }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer_kembali">Kilometer Kembali (Km)</label>
                                    <input type="number" id="kilometer_kembali" class="input"
                                        value="{{ $pengembalian->kilometer_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="bensin_awal">Bensin Awal (Bar)</label>
                                    <input type="text" id="bensin_awal" class="input"
                                        value="{{ $pengembalian->pelepasan_pemesanan->bensin_keluar }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="bensin_kembali">Bensin Kembali (Bar)</label>
                                    <input type="text" id="bensin_kembali" class="input"
                                        value="{{ $pengembalian->bensin_kembali }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="ketepatan_waktu">Ketepatan Waktu</label>
                                    <input type="text" id="ketepatan_waktu" class="input"
                                        value="{{ $pengembalian->ketepatan_waktu }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="terlambat">Terlambat (Max 3 Jam)</label>
                                    <input type="number" id="terlambat" class="input"
                                        value="{{ $pengembalian->terlambat ? $pengembalian->terlambat : '-' }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="sarung_jok">Sarung Jok</label>
                                    <input type="text" id="sarung_jok" class="input"
                                        value="{{ $pengembalian->sarung_jok }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="karpet">Karpet</label>
                                    <input type="text" id="karpet" class="input"
                                        value="{{ $pengembalian->karpet }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                    <input type="text" id="kondisi_kendaraan" class="input"
                                        value="{{ $pengembalian->kondisi_kendaraan }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label for="ban_serep">Ban Serep</label>
                                    <input type="text" id="ban_serep" class="input"
                                        value="{{ $pengembalian->ban_serep }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="biaya_tambahan">Biaya Tambahan</label>
                                    <input type="text" id="biaya_tambahan" class="input"
                                        value="Rp. {{ $pengembalian->biaya_tambahan ? number_format($pengembalian->biaya_tambahan, 2, ',', '.') : '0' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input"
                                        value="{{ $pengembalian->keterangan ? $pengembalian->keterangan : '-' }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="penggunas_id">Pengguna Menambahkan</label>
                                    <input type="text" id="penggunas_id" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->pengguna->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                    <input type="text" id="tanggal_dibuat" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->created_at }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('laporan.pengembalian') }}" class="button-reverse">Kembali ke
                                        Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
