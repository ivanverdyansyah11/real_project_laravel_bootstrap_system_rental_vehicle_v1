@extends('template.main')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dashboard mb-4" role="alert">
                    <a href="{{ route('penambahanSewa') }}" class="link-alert d-inline-block">Lihat Kendaraan Disewa</a>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Stok Kendaraan</p>
                        <h4 class="caption-value">23</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/stok.svg') }}" class="img-fluid dashboard-img"
                            alt="Stok Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Keluar</p>
                        <h4 class="caption-value">07</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                            alt="Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Masuk</p>
                        <h4 class="caption-value">23</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                            alt="Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 d-flex flex-column mb-4 mb-lg-0">
                <div
                    class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between mb-4 mb-4">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/oli.svg') }}" class="img-fluid dashboard-img"
                                alt="Oli Icon" width="18">
                        </div>
                        <a href="" class="link-dashboard">Lihat Kendaraan</a>
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Pergantian Oli</p>
                        <h4 class="caption-value">04 <span>Kendaraan</span></h4>
                    </div>
                </div>
                <div class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/servis.svg') }}" class="img-fluid dashboard-img"
                                alt="Servis Icon" width="18">
                        </div>
                        <a href="" class="link-dashboard">Lihat Kendaraan</a>
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Waktu Service</p>
                        <h4 class="caption-value">04 <span>Kendaraan</span></h4>
                    </div>
                </div>
            </div>
            <div class="col">
                hello world
            </div>
        </div>
    </div>
@endsection
