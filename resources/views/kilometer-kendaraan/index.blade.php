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
                <h5 class="subtitle">Data Kilometer Kendaraan</h5>
                <div class="wrapper d-flex gap-2 mt-3 mt-md-0 align-items-center">
                    <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#tambahKilometerModal">
                        <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                        Tambah
                    </button>
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
                            <a href="{{ route('kilometerKendaraan') }}"
                                class="modal-link {{ Request::is('kilometer-kendaraan*') ? 'active' : '' }}">Kilometer
                                Kendaraan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Kategori Kilometer Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Kilometer 5.000</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button"
                                class="button-action button-detail d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#detailKilometerModal">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#editKilometerModal">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusKilometerModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Kilometer 10.000</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button"
                                class="button-action button-detail d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#detailKilometerModal">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#editKilometerModal">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusKilometerModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH KILOMETER KENDARAAN --}}
    <div class="modal fade" id="tambahKilometerModal" tabindex="-1" aria-labelledby="tambahKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Kilometer Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Kategori</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH KILOMETER KENDARAAN --}}

    {{-- MODAL DETAIL KILOMETER KENDARAAN --}}
    <div class="modal fade" id="detailKilometerModal" tabindex="-1" aria-labelledby="detailKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Kilometer Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="button-reverse" data-bs-dismiss="modal">Tutup Modal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL DETAIL KILOMETER KENDARAAN --}}

    {{-- MODAL EDIT KILOMETER KENDARAAN --}}
    <div class="modal fade" id="editKilometerModal" tabindex="-1" aria-labelledby="editKilometerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Kilometer Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="nama">Kategori Kilometer</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL EDIT KILOMETER KENDARAAN --}}

    {{-- MODAL HAPUS KILOMETER KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusKilometerModal" tabindex="-1"
        aria-labelledby="hapusKilometerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Kilometer Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Kategori Kilometer Kendaraan: Apakah
                        Anda yakin
                        ingin
                        menghapus kategori kilometer kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan kategori kilometer kendaraan akan dihapus secara permanen
                        dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Kategori</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS KILOMETER KENDARAAN --}}

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
