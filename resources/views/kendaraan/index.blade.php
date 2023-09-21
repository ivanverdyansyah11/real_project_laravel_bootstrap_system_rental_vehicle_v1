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
                <div class="wrapper d-flex gap-2 mt-3 mt-md-0 justify-content-end justify-content-md-start">
                    <a href="{{ route('kendaraan.create') }}" class="button-primary d-none d-md-flex align-items-center">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                        Tambah
                    </a>
                    <div class="wrapper position-relative">
                        <button type="button"
                            class="button-other position-relative button-primary-blur d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/filter.svg') }}" alt="Icon Filter"
                                class="img-fluid button-icon">
                            Lainnya
                            <img src="{{ asset('assets/img/button/arrow-down-primary.svg') }}" alt="Icon Filter"
                                class="img-fluid button-icon" style="margin-left: 6px;">
                        </button>
                        <div class="modal-other d-flex flex-column">
                            <a href="{{ route('kendaraan') }}"
                                class="modal-link {{ Request::is('kendaraan*') ? 'active' : '' }}">Kendaraan</a>
                            <a href="{{ route('jenisKendaraan') }}"
                                class="modal-link {{ Request::is('jenis-kendaraan*') ? 'active' : '' }}">Jenis
                                Kendaraan</a>
                            <a href="{{ route('brandKendaraan') }}"
                                class="modal-link {{ Request::is('brand-kendaraan*') ? 'active' : '' }}">Brand
                                Kendaraan</a>
                            <a href="{{ route('seriKendaraan') }}"
                                class="modal-link {{ Request::is('seri-kendaraan*') ? 'active' : '' }}">Seri
                                Kendaraan</a>
                        </div>
                    </div>
                </div>
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
                            <a href="{{ route('penambahanSewa.edit', 1) }}" class="button-primary w-100">Tambah Sewa</a>
                            <a href="{{ route('penambahanSewa.detail', 1) }}" class="button-primary-blur w-100">Lihat
                                Nota</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
