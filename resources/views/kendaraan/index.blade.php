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
                <form class="form-search d-inline-block" method="POST" action="{{ route('kendaraan.search') }}">
                    @csrf
                    <input type="text" class="input-search" placeholder=" " name="search">
                    <label class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                            class="img-fluid search-icon">
                        <p>Cari kendaraan..</p>
                    </label>
                </form>
                <a href="{{ route('kendaraan.create') }}" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </a>
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
                                <p class="product-name">{{ $kendaraan->nama_kendaraan }}</p>
                                <div class="wrapper-other d-flex align-items-center justify-content-between">
                                    <div class="wrapper-tahun d-flex align-items-center">
                                        <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                            class="img-fluid kendaraan-icon">
                                        <p class="product-year">{{ $kendaraan->tahun_pembuatan }}</p>
                                    </div>
                                    <h6 class="product-price">Rp. {{ $kendaraan->tarif_sewa_hari }}</h6>
                                </div>
                                <div class="wrapper-button d-flex">
                                    <button type="button" class="button-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#bookingKendaraanModal"
                                        data-id="{{ $kendaraan->id }}">Booking</button>
                                    <a href="{{ route('kendaraan.detail', $kendaraan->id) }}"
                                        class="button-primary-blur w-100">Detail</a>
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

    {{-- MODAL DETAIL BOOKING KENDARAAN --}}
    <div class="modal fade" id="bookingKendaraanModal" tabindex="-1" aria-labelledby="bookingKendaraanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Booking Kendaraan</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('pemesanan.booking') }}">
                    @csrf
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
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <select id="jenis_kendaraan" class="input" name="jenis_kendaraans_id">
                                    <option value="-">Pilih jenis kendaraan</option>
                                    @foreach ($jenises as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="tanggal_booking">Tanggal Booking</label>
                                <input type="date" class="input" id="tanggal_booking" name="tanggal_booking">
                                @error('tanggal_booking')
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
    {{-- END MODAL DETAIL BOOKING KENDARAAN --}}

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
