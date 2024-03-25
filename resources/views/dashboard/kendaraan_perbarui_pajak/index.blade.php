@extends('template.main')

@section('content')
    <div class="content">
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nomor Plat Kendaraan</div>
                    <div class="col data-header">Terakhir Bayar Samsat</div>
                    <div class="col data-header">Terakhir Bayar Angsuran</div>
                    <div class="col data-header">Terakhir Bayar Ganti Nomor Polisi</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($kendaraans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($kendaraans as $kendaraan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $kendaraan->nomor_plat }}</div>
                            <div class="col data-value data-length">{{ $kendaraan->terakhir_samsat }}</div>
                            <div class="col data-value data-length">{{ $kendaraan->terakhir_angsuran }}</div>
                            <div class="col data-value data-length">{{ $kendaraan->terakhir_ganti_nomor_polisi }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('kendaraan.detail', $kendaraan->id) }}"
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
            {{ $kendaraans->links() }}
        </div>
        <div class="col-12">
            <div class="button-wrapper d-flex">
                <a href="{{ route('dashboard') }}" class="button-reverse">Kembali ke
                    Halaman Dashboard</a>
            </div>
        </div>
    </div>
@endsection
