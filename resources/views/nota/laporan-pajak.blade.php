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
                <h5 class="title">Data Pajak Kendaraan</h5>
                <table class="table table-bordered">
                    <tr>
                        <td scope="col">Nama Kendaraan</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $pajak->kendaraan->brand_kendaraan->nama }}
                            {{ $pajak->kendaraan->nama_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Nomor Polisi</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">
                            {{ $pajak->kendaraan->nomor_polisi }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Jenis Pajak</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pajak->jenis_pajak }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Tanggal Bayar</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pajak->tanggal_bayar }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Metode Bayar</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pajak->metode_bayar }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Jumlah Bayar</td>
                        <td scope="col-1">:</td>
                        <td scope="col" class="text-end">{{ $pajak->jumlah_bayar }}</td>
                    </tr>
                </table>
                <p class="copyright">Diproduksi oleh Nusa Kendala Rental Kendaraan</p>
            </div>
        </div>
    </div>
@endsection
