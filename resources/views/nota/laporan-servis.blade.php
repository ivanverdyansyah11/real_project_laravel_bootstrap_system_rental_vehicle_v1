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
                <h5 class="title">Data Servis Kendaraan</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $servis->kendaraan->brand_kendaraan->nama }}
                            {{ $servis->kendaraan->nama_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Polisi</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $servis->kendaraan->nomor_polisi }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Servis</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->tanggal_servis }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Kategori Kilometer Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $servis->kendaraan->kilometer_kendaraan->jumlah }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Kilometer Sebelum Diservis</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->kilometer_sebelum }} km</td>
                    </tr>
                    <tr>
                        <td scope="col">Kilometer Setelah Diservis</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->kilometer_setelah }} km</td>
                    </tr>
                    <tr>
                        <td scope="col">Air Accu</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->air_accu }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Air Waiper</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->air_waiper }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Ban</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->ban }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Oli</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->oli }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Total Bayar</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->total_bayar }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Keterangan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $servis->keterangan }}</td>
                    </tr>
                </table>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
