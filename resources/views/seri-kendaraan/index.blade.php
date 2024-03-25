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
                <form class="form-search d-inline-block" method="POST" action="{{ route('tipeKendaraan.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari seri..</p>
                        </label>
                    </div>
                </form>
                @if ($jenises->count() == 0 || $brands->count() == 0)
                    <form action="{{ route('tipeKendaraan.check') }}" method="POST">
                        @csrf
                        <button type="submit" class="button-primary d-none d-md-flex align-items-center">
                            <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon"
                                class="img-fluid button-icon">
                            Tambah
                        </button>
                    </form>
                @else
                    <a href="{{ route('tipeKendaraan.create') }}"
                        class="button-primary d-none d-md-flex align-items-center">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                        Tambah
                    </a>
                @endif
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Tipe Kendaraan</div>
                    <div class="col data-header d-none d-lg-inline-block">Jenis Kendaraan</div>
                    <div class="col data-header d-none d-lg-inline-block">Brand Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($series->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Tipe Kendaraan Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($series as $seri)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $seri->nomor_seri }}</div>
                            <div class="col data-value data-length data-length-none">
                                {{ $seri->jenis_kendaraan ? $seri->jenis_kendaraan->nama : 'Belum memilih jenis kendaraan' }}
                            </div>
                            <div class="col data-value data-length data-length-none">
                                {{ $seri->brand_kendaraan ? $seri->brand_kendaraan->nama : 'Belum memilih brand kendaraan' }}
                            </div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <a href="{{ route('tipeKendaraan.detail', $seri->id) }}"
                                        class="button-action button-detail d-flex justify-content-center align-items-center">
                                        <div class="detail-icon"></div>
                                    </a>
                                    <a href="{{ route('tipeKendaraan.edit', $seri->id) }}"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                        <div class="edit-icon"></div>
                                    </a>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusSeriModal"
                                        data-id="{{ $seri->id }}">
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
            {{ $series->links() }}
        </div>
    </div>

    @include('partials.tipe-kendaraan')
    <script>
        $(document).on('click', '[data-bs-target="#hapusSeriModal"]', function() {
            let id = $(this).data('id');
            $('#hapusSeri').attr('action', '/tipe-kendaraan/hapus/' + id);
        });
    </script>
@endsection
