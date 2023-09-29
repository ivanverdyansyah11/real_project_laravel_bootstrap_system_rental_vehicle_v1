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
                <h5 class="title">Data Sopir</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->nama }}</td>
                    </tr>
                    <tr>
                        <td scope="col">NIK</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->nik }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Telepon</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor KTP</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->nomor_ktp }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor SIM</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->nomor_sim }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Alamat</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $sopir->alamat }}</td>
                    </tr>
                </table>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
