@extends('template.main')

@section('content')
    <div class="content">
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nomor Plat Kendaraan</div>
                    <div class="col data-header">Jenis Pajak</div>
                    <div class="col data-header">Tanggal Bayar</div>
                    <div class="col data-header">Jumlah Bayar</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($pajaks->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Bayar Pajak Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($pajaks as $pajak)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $pajak->kendaraan->nomor_plat }}</div>
                            <div class="col data-value data-length text-capitalize">{{ $pajak->jenis_pajak }}</div>
                            <div class="col data-value data-length">{{ $pajak->tanggal_bayar }}</div>
                            <div class="col data-value data-length">Rp.
                                {{ number_format($pajak->jumlah_bayar, 2, ',', '.') }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('kendaraan.detailHistoryTax', $pajak->id) }}"
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
            {{ $pajaks->links() }}
        </div>
        <div class="col-12">
            <div class="button-wrapper d-flex">
                <a href="{{ route('kendaraan.detail', $pajak->kendaraan->id) }}" class="button-reverse">Kembali ke
                    Halaman Detail</a>
            </div>
        </div>
    </div>
@endsection
