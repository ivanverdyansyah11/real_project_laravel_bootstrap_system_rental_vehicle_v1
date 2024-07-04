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
                <form class="form-search d-inline-block" method="POST" action="{{ route('pengguna.search') }}">
                    @csrf
                    <div class="wrapper-search">
                        <input type="text" class="input-search" placeholder=" " name="search">
                        <label class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                                class="img-fluid search-icon">
                            <p>Cari pengguna..</p>
                        </label>
                    </div>
                </form>
                @if (auth()->user()->role == 'admin')
                    <button type="button" class="button-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#tambahPenggunaModal">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Button Tambah Icon"
                            class="img-fluid button-icon">
                        Tambah
                    </button>
                @endif
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama Lengkap</div>
                    <div class="col d-none d-lg-inline-block data-header">Email</div>
                    <div class="col d-none d-lg-inline-block data-header">Role</div>
                    @if (auth()->user()->role == 'admin')
                        <div class="col-3 col-xl-2 data-header"></div>
                    @endif
                </div>
            </div>
            @if ($penggunas->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length"></div>
                    </div>
                </div>
            @else
                @foreach ($penggunas as $pengguna)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $pengguna->nama_lengkap }}</div>
                            <div class="col data-value data-length data-length-none">{{ $pengguna->email }}</div>
                            <div class="col data-value data-length data-length-none text-capitalize">
                                {{ $pengguna->role }}</div>
                            @if (auth()->user()->role == 'admin')
                                <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                    <div class="wrapper-action d-flex">
                                        <button type="button"
                                            class="button-action button-detail d-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#detailPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="detail-icon"></div>
                                        </button>
                                        <button type="button"
                                            class="button-action button-edit d-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#editPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="edit-icon"></div>
                                        </button>
                                        <button type="button"
                                            class="button-action button-delete d-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#hapusPenggunaModal"
                                            data-id="{{ $pengguna->id }}">
                                            <div class="delete-icon"></div>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end mt-4">
                {{ $penggunas->links() }}
            </div>
        </div>
    </div>

    @include('partials.pengguna')
    <script>
        $(document).on('click', '[data-bs-target="#detailPenggunaModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/pengguna/detail/' + id,
                success: function(data) {
                    $('[data-value="nama_lengkap"]').val(data.nama_lengkap);
                    $('[data-value="email"]').val(data.email);
                    $('[data-value="role"]').val(data.role);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editPenggunaModal"]', function() {
            let id = $(this).data('id');
            $('[data-value="role"] option').remove();
            $('#editPengguna').attr('action', '/pengguna/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/pengguna/detail/' + id,
                success: function(data) {
                    $('[data-value="nama_lengkap"]').val(data.nama_lengkap);
                    $('[data-value="email"]').val(data.email);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusPenggunaModal"]', function() {
            let id = $(this).data('id');
            $('#hapusPengguna').attr('action', '/pengguna/hapus/' + id);
        });
    </script>
@endsection
