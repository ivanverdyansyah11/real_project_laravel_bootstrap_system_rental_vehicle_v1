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
                <h5 class="title">Data Kendaraan Booking</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama Pelanggan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Telepon</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->pelanggan->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Alamat</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->pelanggan->alamat }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Plat Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->kendaraan->nomor_plat }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Seri</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->kendaraan->seri_kendaraan->nomor_seri }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nama Sopir</td>
                        <td scope="col-1">:</td>
                        @if ($booking->sopirs_id == null)
                            <td scope="col" class="text-end">Tidak memilih sopir</td>
                        @else
                            <td scope="col" class="text-end">{{ $booking->sopir->nama }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Mulai Booking</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Mulai Berakhir</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $booking->tanggal_akhir }}</td>
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
                <h5 class="subtitle">Laporan Data Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_harian">Total Harian</label>
                            <input type="number" id="total_harian" class="input" autocomplete="off" name="total_harian"
                                readonly value="{{ $booking->total_harian != 0 ? $booking->total_harian : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_mingguan">Total Mingguan</label>
                            <input type="number" id="total_mingguan" class="input" autocomplete="off" readonly
                                name="total_mingguan"
                                value="{{ $booking->total_mingguan != 0 ? $booking->total_mingguan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="input-wrapper">
                            <label for="total_bulanan">Total Bulanan</label>
                            <input type="number" id="total_bulanan" class="input" autocomplete="off" name="total_bulanan"
                                readonly value="{{ $booking->total_bulanan != 0 ? $booking->total_bulanan : '0' }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_mulai">Tanggal Diambil</label>
                            <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                value="{{ $booking->tanggal_mulai }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_akhir">Tanggal Kembali</label>
                            <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
                                value="{{ $booking->tanggal_akhir }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="pelanggans_id">Pelanggan</label>
                            <input type="text" id="pelanggans_id" class="input" autocomplete="off"
                                value="{{ $booking->pelanggan->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="sopirs_id">Sopir</label>
                            @if ($booking->sopirs_id == null)
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="Tidak memilih sopir" readonly>
                            @else
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="{{ $booking->sopir->nama }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="jenis">Jenis Kendaraan</label>
                            <input type="text" id="jenis" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->jenis_kendaraan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="brand">Brand Kendaraan</label>
                            <input type="text" id="brand" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->brand_kendaraan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="seri">Seri Kendaraan</label>
                            <input type="text" id="seri" class="input" autocomplete="off" readonly
                                value="{{ $booking->kendaraan->seri_kendaraan->nomor_seri }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="kendaraans_id">Kendaraan</label>
                            <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                value="{{ $booking->kendaraan->nomor_plat }}" readonly>
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
                        <div class="button-wrapper">
                            <a href="{{ route('laporan.booking') }}" class="button-reverse">Kembali ke Halaman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
