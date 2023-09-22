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
                                <p class="product-year">23-09-23, 16.00</p>
                            </div>
                            <h6 class="product-price">6 Hari 8 Jam</h6>
                        </div>
                        <div class="wrapper-button d-flex flex-column">
                            <a href="{{ route('pengembalian.restoration') }}" class="button-primary w-100">Pengembalian</a>
                            <a href="" class="button-primary-blur w-100">Lihat Nota</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
