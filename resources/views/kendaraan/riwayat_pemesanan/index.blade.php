@extends('template.main')

@section('content')
    <div class="content">
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Pelanggan</div>
                    <div class="col data-header">Nomor Plat Kendaraan</div>
                    <div class="col data-header">Tanggal Mulai</div>
                    <div class="col data-header">Tanggal Akhir</div>
                    <div class="col data-header">Status</div>
                    <div class="col-2 col-xl-1 data-header"></div>
                </div>
            </div>
            @if ($pemesanans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Brand Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($pemesanans as $pemesanan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $pemesanan->pelanggan->nama }}</div>
                            <div class="col data-value data-length">{{ $pemesanan->kendaraan->nomor_plat }}</div>
                            <div class="col data-value data-length text-capitalize">{{ $pemesanan->tanggal_mulai }}</div>
                            <div class="col data-value data-length text-capitalize">{{ $pemesanan->tanggal_akhir }}</div>
                            <div class="col data-value data-length text-capitalize">{{ $pemesanan->status }}</div>
                            <div class="col-2 col-xl-1 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('kendaraan.detailHistoryReservation', $pemesanan->id) }}"
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
            {{ $pemesanans->links() }}
        </div>
        <div class="col-12">
            <div class="button-wrapper d-flex">
                <a href="{{ route('kendaraan.detail', $kendaraan->id) }}" class="button-reverse">Kembali ke
                    Halaman Detail</a>
            </div>
        </div>
    </div>
@endsection
