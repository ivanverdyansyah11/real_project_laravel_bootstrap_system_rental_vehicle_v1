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
                <form class="form-search d-inline-block" method="POST" action="{{ route('booking.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari kendaraan..</p>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if ($kendaraans->count() == 0)
                <div class="col-12 text-center mt-5">
                    <p style="font-size: 0.913rem;">Tidak Ada Data Kendaraan!</p>
                </div>
            @else
                @foreach ($kendaraans as $kendaraan)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card-product">
                            <div class="wrapper-img d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                    alt="Car Thumbnail Image" class="img-fluid product-img">
                            </div>
                            <div class="product-content">
                                <div class="wrapper d-flex align-items-center justify-content-between">
                                    <p class="product-name">{{ $kendaraan->nomor_plat }}</p>
                                    <p class="status-true text-capitalize">{{ $kendaraan->status }}</p>
                                </div>
                                <div class="wrapper-other d-flex align-items-center justify-content-between">
                                    <div class="wrapper-tahun d-flex align-items-center">
                                        <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                            class="img-fluid kendaraan-icon">
                                        <p class="product-year">{{ $kendaraan->tahun_pembuatan }}</p>
                                    </div>
                                    <h6 class="product-price">Rp. {{ $kendaraan->tarif_sewa_hari }}</h6>
                                </div>
                                <div class="wrapper-button d-flex flex-column">
                                    @if (\App\Models\Pelanggan::where('status', 'ada')->count() == 0)
                                        <form action="{{ route('booking.check') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="button-primary w-100">Booking</button>
                                        </form>
                                    @else
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#bookingKendaraanModal" data-id="{{ $kendaraan->id }}"
                                            class="button-primary w-100">Booking</button>
                                    @endif
                                    @if ($kendaraan->status == 'booking')
                                        <a href="{{ route('pemesanan.search.booking', $kendaraan->id) }}"
                                            class="button-primary-blur w-100">Lihat Penyewa</a>
                                    @else
                                        <button type="button" class="button-primary-blur w-100">Belum Dibooking</button>
                                    @endif
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
    </div>

    {{-- MODAL BOOKING KENDARAAN --}}
    <div class="modal fade" id="bookingKendaraanModal" tabindex="-1" aria-labelledby="bookingKendaraanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Booking Kendaraan</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('booking') }}">
                    @csrf
                    <input type="hidden" data-value="kendaraans_id" name="kendaraans_id">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Pelanggan</label>
                                <select id="nama" class="input" name="pelanggans_id">
                                    <option value="-">Pilih nama pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pelanggans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" class="input" id="tanggal_mulai" name="tanggal_mulai">
                                @error('tanggal_mulai')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" class="input" id="tanggal_akhir" name="tanggal_akhir">
                                @error('tanggal_akhir')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Booking Kendaraan</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL BOOKING KENDARAAN --}}

    <script>
        $(document).on('click', '[data-bs-target="#bookingKendaraanModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/kendaraan/getDetail/' + id,
                success: function(data) {
                    $('[data-value="kendaraans_id"]').val(data.id);
                }
            });
        });
    </script>
@endsection
