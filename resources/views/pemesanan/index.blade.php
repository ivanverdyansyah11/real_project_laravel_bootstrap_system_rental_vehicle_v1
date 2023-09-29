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
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-md-between align-items-end align-items-md-center">
                <form class="form-search d-flex gap-3" method="POST" action="{{ route('pemesanan.search') }}">
                    @csrf
                    <div class="wrapper-searching position-relative">
                        <input type="text" class="input-search" placeholder=" " name="tanggal_mulai">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari tanggal mulai..</p>
                        </label>
                    </div>
                    <div class="wrapper-searching position-relative">
                        <input type="text" class="input-search" placeholder=" " name="tanggal_akhir">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari tanggal mulai..</p>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Nomor Telepon</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Mulai</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Akhir</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($pemesanans->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Pemesanan!</div>
                    </div>
                </div>
            @else
                @foreach ($pemesanans as $pemesanan)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $pemesanan->pelanggan->nama }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $pemesanan->pelanggan->nomor_telepon ?: '-' }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $pemesanan->tanggal_mulai }}</div>
                            <div class="col data-value data-length data-length-none">{{ $pemesanan->tanggal_akhir }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a class="button-action button-detail d-flex justify-content-center align-items-center">
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
    </div>

    {{-- MODAL HAPUS BOOKING --}}
    <div class="modal modal-delete fade" id="hapusBookingModal" tabindex="-1" aria-labelledby="hapusBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Booking</h3>
                <form id="hapusBooking" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Booking: Apakah Anda yakin ingin
                        menghapus booking ini?
                        Tindakan ini tidak dapat diurungkan, dan booking akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Booking</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS BOOKING --}}

    <script>
        $(document).on('click', '[data-bs-target="#hapusBookingModal"]', function() {
            let id = $(this).data('id');
            $('#hapusBooking').attr('action', '/pemesanan/hapus/' + id);
        });
    </script>
@endsection
