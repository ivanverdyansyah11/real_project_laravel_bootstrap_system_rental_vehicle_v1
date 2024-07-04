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
            <div class="col-12 d-flex justify-content-between align-items-center gap-2">
                <form class="form-search d-inline-block" method="POST" action="{{ route('brandKendaraan.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari brand..</p>
                        </label>
                    </div>
                </form>
                <button type="button" class="button-primary d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#tambahBrandModal">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Brand Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($brands->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Brand Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($brands as $brand)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $brand->nama }}</div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-detail d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailBrandModal"
                                        data-id="{{ $brand->id }}">
                                        <div class="detail-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editBrandModal"
                                        data-id="{{ $brand->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusBrandModal"
                                        data-id="{{ $brand->id }}">
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
            {{ $brands->links() }}
        </div>
    </div>

    @include('partials.brand-kendaraan')
    <script>
        $(document).on('click', '[data-bs-target="#detailBrandModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/brand-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editBrandModal"]', function() {
            let id = $(this).data('id');
            $('#editBrand').attr('action', '/brand-kendaraan/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/brand-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusBrandModal"]', function() {
            let id = $(this).data('id');
            $('#hapusBrand').attr('action', '/brand-kendaraan/hapus/' + id);
        });
    </script>
@endsection
