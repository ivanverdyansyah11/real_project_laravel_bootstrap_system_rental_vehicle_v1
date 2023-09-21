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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card-product">
                    <img src="{{ asset('assets/img/default/sample-kendaraan.jpg') }}" alt="Car Thumbnail Image"
                        class="img-fluid product-img">
                    <div class="product-content">
                        <p class="product-name">Honda Brio</p>
                        <div class="wrapper-other d-flex align-items-center justify-content-between">
                            <div class="wrapper-tahun d-flex align-items-center">
                                <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                    class="img-fluid kendaraan-icon">
                                <p class="product-year">2017</p>
                            </div>
                            <h6 class="product-price">Rp. 500.000</h6>
                        </div>
                        <div class="wrapper-button d-flex flex-column">
                            <a href="{{ route('pemesanan.booking') }}" class="button-primary w-100">Pemesanan</a>
                            <button type="button" class="button-primary-blur w-100" data-bs-toggle="modal"
                                data-bs-target="#hapusBookingModal">Hapus Booking</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL HAPUS BOOKING --}}
    <div class="modal modal-delete fade" id="hapusBookingModal" tabindex="-1" aria-labelledby="hapusBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Booking</h3>
                <form class="form d-inline-block w-100">
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
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
