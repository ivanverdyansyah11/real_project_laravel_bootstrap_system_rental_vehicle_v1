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
                <h5 class="title">Data Pelanggan</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">NIK</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->nik }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Telepon</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor KTP</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->nomor_ktp }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor KK</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->nomor_kk }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Alamat</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pelanggan->alamat }}</td>
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
                <h5 class="subtitle">Laporan Data Pelanggan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_ktp ? asset('assets/img/ktp-images/' . $pelanggan->foto_ktp) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-ktp" alt="KTP Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelanggan->foto_kk ? asset('assets/img/kk-images/' . $pelanggan->foto_kk) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-kk" alt="KK Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->nik }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" id="nomor_telepon" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->nomor_telepon }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_ktp">Nomor KTP</label>
                                    <input type="text" id="nomor_ktp" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->nomor_ktp }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_kk">Nomor KK</label>
                                    <input type="text" id="nomor_kk" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->nomor_kk }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_ktp">Data KTP</label>
                                    <input type="text" id="data_ktp" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->data_ktp }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="data_kk">Data KK</label>
                                    <input type="text" id="data_kk" class="input" autocomplete="off" disabled
                                        value="{{ $pelanggan->data_kk }}">
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="data_nomor_telepon">Data Nomor Telepon</label>
                                    <input type="text" id="data_nomor_telepon" class="input" autocomplete="off"
                                        disabled value="{{ $pelanggan->data_nomor_telepon }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('laporan.pelanggan') }}" class="button-reverse">Kembali ke
                                        Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
