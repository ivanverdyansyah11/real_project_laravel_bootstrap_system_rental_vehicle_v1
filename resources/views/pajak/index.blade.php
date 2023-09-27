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
                <form class="form-search d-inline-block" method="POST" action="{{ route('pajak.search') }}">
                    @csrf
                    <input type="text" class="input-search" placeholder=" " name="search">
                    <label class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                            class="img-fluid search-icon">
                        <p>Cari kendaraan..</p>
                    </label>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($kendaraans as $kendaraan)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card-product">
                        <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                            alt="Car Thumbnail Image" class="img-fluid product-img">
                        <div class="product-content">
                            <p class="product-name">{{ $kendaraan->brand_kendaraan->nama }}
                                {{ $kendaraan->nama_kendaraan }}</p>
                            <div class="wrapper-other d-flex align-items-center justify-content-between">
                                <div class="wrapper-tahun d-flex align-items-center">
                                    <p class="product-year">No. Seri: {{ $kendaraan->seri_kendaraan->nomor_seri }}</p>
                                </div>
                            </div>
                            <div class="wrapper-button d-flex">
                                <a href="{{ route('pajak.transaction', $kendaraan->id) }}"
                                    class="button-primary w-100">Bayar Pajak</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
