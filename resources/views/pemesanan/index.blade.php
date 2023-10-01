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
                        <p class="mb-2">Tanggal mulai</p>
                        <input type="date" class="input" name="tanggal_mulai" required
                            @if (isset($tanggal_mulai)) value="{{ $tanggal_mulai }}" @endif>
                    </div>
                    <div class="wrapper-searching position-relative">
                        <p class="mb-2">Tanggal berakhir</p>
                        <input type="date" class="input" name="tanggal_akhir" required
                            @if (isset($tanggal_akhir)) value="{{ $tanggal_akhir }}" @endif>
                    </div>
                    <button type="submit" class="button-searching-tanggal position-absolute" style="top: -100px;">
                    </button>
                </form>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Kendaraan</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Mulai</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal Akhir</div>
                    <div class="col d-none d-lg-inline-block data-header">Status Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($bookings->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Kendaraan Dibooking!</div>
                    </div>
                </div>
            @else
                @foreach ($bookings as $booking)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $booking->pelanggan->nama }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $booking->kendaraan->nomor_plat }}</div>
                            <div class="col data-value data-length data-length-none">{{ $booking->tanggal_mulai }}</div>
                            <div class="col data-value data-length data-length-none">{{ $booking->tanggal_akhir }}</div>
                            <div
                                class="col data-value data-length data-length-none {{ $booking->kendaraan->status == 'dipesan' ? 'status-false' : 'status-true' }}">
                                {{ $booking->kendaraan->status == 'dipesan' ? 'Sudah Dipesan' : 'Ready' }}
                            </div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-approve d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailBookingModal"
                                        data-id="{{ $booking->id }}">
                                        <div class="approve-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editBookingModal"
                                        data-id="{{ $booking->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusBookingModal"
                                        data-id="{{ $booking->id }}">
                                        <div class="delete-icon"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            {{ $bookings->links() }}
        </div>
    </div>

    {{-- MODAL PEMESANAN KENDARAAN --}}
    <div class="modal fade" id="detailBookingModal" tabindex="-1" aria-labelledby="detailBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Booking Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama_penyewa">Nama Penyewa</label>
                                <input type="text" class="input" id="nama_penyewa" data-value="nama_penyewa" disabled>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama_kendaraan">Nama Kendaraan</label>
                                <input type="text" class="input" id="nama_kendaraan" data-value="nama_kendaraan"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="text" class="input" id="tanggal_mulai" data-value="tanggal_mulai" disabled>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="text" class="input" id="tanggal_akhir" data-value="tanggal_akhir"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <a href="" class="button-primary button-pemesanan">Pesan Kendaraan</a>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Pesan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL PEMESANAN KENDARAAN --}}

    {{-- MODAL EDIT BOOKING KENDARAAN --}}
    <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Booking Kendaraan</h3>
                <form id="editBooking" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" class="input" id="tanggal_mulai" name="tanggal_mulai"
                                    data-value="tanggal_mulai">
                                @error('tanggal_mulai')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" class="input" id="tanggal_akhir" name="tanggal_akhir"
                                    data-value="tanggal_akhir">
                                @error('tanggal_akhir')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL EDIT BOOKING KENDARAAN --}}

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
        $(document).on('click', '[data-bs-target="#detailBookingModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/booking/detail/' + id,
                success: function(data) {
                    $('.button-pemesanan').attr('href', '/pemesanan/release/' + data.id);
                    $('[data-value="nama_penyewa"]').val(data.pelanggan.nama);
                    $('[data-value="nama_kendaraan"]').val(data.kendaraan.nama_kendaraan);
                    $('[data-value="tanggal_mulai"]').val(data.tanggal_mulai);
                    $('[data-value="tanggal_akhir"]').val(data.tanggal_akhir);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editBookingModal"]', function() {
            let id = $(this).data('id');
            $('#editBooking').attr('action', '/booking/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/booking/detail/' + id,
                success: function(data) {
                    $('[data-value="tanggal_mulai"]').val(data.tanggal_mulai);
                    $('[data-value="tanggal_akhir"]').val(data.tanggal_akhir);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusBookingModal"]', function() {
            let id = $(this).data('id');
            $('#hapusBooking').attr('action', '/booking/hapus/' + id);
        });
    </script>
@endsection
