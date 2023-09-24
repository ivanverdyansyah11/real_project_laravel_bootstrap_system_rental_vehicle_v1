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
                <form class="form-search d-inline-block">
                    @csrf
                    <input type="text" class="input-search" placeholder=" ">
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
        @foreach ($kendaraans as $kendaraan)
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card-product">
                        <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                            alt="Car Thumbnail Image" class="img-fluid product-img">
                        <div class="product-content">
                            <p class="product-name">{{ $kendaraan->brand_kendaraan->nama }}
                                {{ $kendaraan->nama_kendaraan }}</p>
                            <div class="wrapper-other d-flex align-items-center justify-content-between">
                                <div class="wrapper-tahun d-flex align-items-center">
                                    <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                        class="img-fluid kendaraan-icon">
                                    <p class="product-year">{{ $kendaraan->tanggal_pembelian }}</p>
                                </div>
                                <h6 class="product-price">Rp. {{ $kendaraan->tarif_sewa }}</h6>
                            </div>
                            <div class="wrapper-button d-flex">
                                <button type="button" class="button-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#bookingKendaraanModal" data-id="{{ $kendaraan->id }}">Booking</button>
                                <a href="{{ route('kendaraan.detail', $kendaraan->id) }}"
                                    class="button-primary-blur w-100">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL DETAIL BOOKING KENDARAAN --}}
            <div class="modal fade" id="bookingKendaraanModal" tabindex="-1" aria-labelledby="bookingKendaraanModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h3 class="title">Booking Kendaraan</h3>
                        <form class="form d-inline-block w-100" method="POST" action="{{ route('kendaraan.booking') }}">
                            @csrf
                            <input type="hidden" name="kendaraans_id" value="{{ $kendaraan->id }}">
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
        @endforeach
    </div>

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
