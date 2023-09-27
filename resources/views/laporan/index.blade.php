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
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Data Laporan</h5>
                {{-- <button type="button" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/export.svg') }}" alt="Export Icon" class="img-fluid button-icon">
                    Export
                </button> --}}
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Laporan Kegiatan</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Penyewaan Mobil Honda Brio (Honda)</div>
                    <div class="col data-value data-length data-length-none">16/9/23, 15:34</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <a href=""
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
