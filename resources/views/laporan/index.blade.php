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
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Data Laporan</h5>
                {{-- <button type="button" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/export.svg') }}" alt="Export Icon" class="img-fluid button-icon">
                    Export
                </button> --}}
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col-md-3 col-lg-4 col-xl-5 data-header">Laporan Kegiatan</div>
                    <div class="col d-none d-lg-inline-block data-header">Pengguna</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal dan Waktu</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($laporans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Laporan!</div>
                    </div>
                </div>
            @else
                @foreach ($laporans as $laporan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            @if ($laporan->kategori_laporan == 'pelanggan')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Pelanggan::where('id', $laporan->relations_id)->first()->nama }} telah
                                    terdaftar menjadi salah satu pelanggan kami</div>
                            @elseif ($laporan->kategori_laporan == 'sopir')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Sopir::where('id', $laporan->relations_id)->first()->nama }} telah
                                    terdaftar menjadi salah satu sopir kami</div>
                            @elseif ($laporan->kategori_laporan == 'kendaraan')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\Kendaraan::where('id', $laporan->relations_id)->first()->stnk_nama }}
                                    telah menyewakan kendaraannya berupa
                                    {{ \App\Models\Kendaraan::where('id', $laporan->relations_id)->first()->nama_kendaraan }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'booking')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pemesanan::where('id', $laporan->relations_id)->with('pelanggan')->first()->kendaraan->nama_kendaraan }}
                                    telah dibooking oleh
                                    {{ \App\Models\Pemesanan::where('id', $laporan->relations_id)->with('pelanggan')->first()->pelanggan->nama }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pemesanan')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\PelepasanPemesanan::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nama_kendaraan }}
                                    telah dipesan oleh
                                    {{ \App\Models\PelepasanPemesanan::where('id', $laporan->relations_id)->with('pemesanan')->first()->pemesanan->pelanggan->nama }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pengembalian')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pengembalian::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first()->pelepasan_pemesanan->kendaraan->nama_kendaraan }}
                                    dikembalikan
                                    {{ \App\Models\Pengembalian::where('id', $laporan->relations_id)->first()->ketepatan_waktu }}
                                    waktu
                                </div>
                            @elseif ($laporan->kategori_laporan == 'penambahan')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    {{ \App\Models\PenambahanSewa::where('id', $laporan->relations_id)->with('pelepasan_pemesanan')->first()->pelepasan_pemesanan->pemesanan->pelanggan->nama }}
                                    menambahkan penyewaan pada kendaraan
                                    {{ \App\Models\PenambahanSewa::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nama_kendaraan }}
                                </div>
                            @elseif ($laporan->kategori_laporan == 'servis')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Servis::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nama_kendaraan }}
                                    telah diservis
                                </div>
                            @elseif ($laporan->kategori_laporan == 'pajak')
                                <div class="col-md-3 col-lg-4 col-xl-5 data-value data-length">
                                    Kendaraan
                                    {{ \App\Models\Pajak::where('id', $laporan->relations_id)->with('kendaraan')->first()->kendaraan->nama_kendaraan }}
                                    telah membayar
                                    {{ \App\Models\Pajak::where('id', $laporan->relations_id)->first()->jenis_pajak }}
                                </div>
                            @endif
                            <div class="col data-value data-length data-length-none">{{ $laporan->pengguna->nama_lengkap }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $laporan->created_at }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href=""
                                        class="button-action button-detail d-flex justify-content-center align-items-center">
                                        <div class="detail-icon"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $laporans->links() }}
        </div>
    </div>
@endsection
