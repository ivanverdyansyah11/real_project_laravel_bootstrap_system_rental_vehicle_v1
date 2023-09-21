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
                <h5 class="subtitle">Data Pelanggan</h5>
                <a href="{{ route('pelanggan.create') }}" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Button Tambah Icon"
                        class="img-fluid button-icon">
                    Tambah
                </a>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Nomor Telepon</div>
                    <div class="col d-none d-lg-inline-block data-header">Alamat</div>
                    <div class="col d-none d-lg-inline-block data-header">Kelengkapan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Anak Agung Aditya Prayatna</div>
                    <div class="col data-value data-length data-length-none">08123456789</div>
                    <div class="col data-value data-length data-length-none">Jl. Ahmad Yani</div>
                    <div class="col data-value data-length data-length-none status-true">Lengkap</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <a href="{{ route('pelanggan.detail') }}"
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </a>
                            <a href="{{ route('pelanggan.edit') }}"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </a>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusPelangganModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Dimas Praguna Putra</div>
                    <div class="col data-value data-length data-length-none">08987654321</div>
                    <div class="col data-value data-length data-length-none">Jl. Gatsu Barat</div>
                    <div class="col data-value data-length data-length-none status-false">Belum Lengkap</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <a href="{{ route('pelanggan.detail') }}"
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </a>
                            <a href="{{ route('pelanggan.edit') }}"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </a>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusPelangganModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL HAPUS PELANGGAN --}}
    <div class="modal modal-delete fade" id="hapusPelangganModal" tabindex="-1" aria-labelledby="hapusPelangganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Pelanggan</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Pelanggan: Apakah Anda yakin ingin
                        menghapus pelanggan ini?
                        Tindakan ini tidak dapat diurungkan, dan pelanggan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Pelanggan</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS PELANGGAN --}}
@endsection
