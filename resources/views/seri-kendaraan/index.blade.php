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
                <h5 class="subtitle">Data Seri Kendaraan</h5>
                <div class="wrapper d-flex gap-2 mt-3 mt-md-0 align-items-center">
                    <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#tambahSeriModal">
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
                    <div class="col data-header">Nomor Seri</div>
                    <div class="col data-header d-none d-lg-inline-block">Jenis Kendaraan</div>
                    <div class="col data-header d-none d-lg-inline-block">Brand Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">13668935</div>
                    <div class="col data-value data-length data-length-none">Kendaraan Roda 4</div>
                    <div class="col data-value data-length data-length-none">Hyundai</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button"
                                class="button-action button-detail d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#detailSeriModal">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#editSeriModal">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusSeriModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">45646571</div>
                    <div class="col data-value data-length data-length-none">Kendaraan Roda 4</div>
                    <div class="col data-value data-length data-length-none">Toyota</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button"
                                class="button-action button-detail d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#detailSeriModal">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#editSeriModal">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusSeriModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH SERI KENDARAAN --}}
    <div class="modal fade" id="tambahSeriModal" tabindex="-1" aria-labelledby="tambahSeriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Nomor Seri Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Nomor Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <select id="jenis" class="input">
                                    <option value="-">Pilih jenis kendaraan</option>
                                    <option value="kendaraan_roda_2">Kendaraan Roda 2</option>
                                    <option value="kendaraan_roda_4">Kendaraan Roda 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <select id="brand" class="input">
                                    <option value="-">Pilih brand kendaraan</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Honda">Honda</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Nomor Seri</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH SERI KENDARAAN --}}

    {{-- MODAL DETAIL SERI KENDARAAN --}}
    <div class="modal fade" id="detailSeriModal" tabindex="-1" aria-labelledby="detailSeriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Nomor Seri Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Brand Kendaraan</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <select id="jenis" class="input">
                                    <option value="-">Pilih jenis kendaraan</option>
                                    <option value="kendaraan_roda_2">Kendaraan Roda 2</option>
                                    <option value="kendaraan_roda_4">Kendaraan Roda 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <select id="brand" class="input">
                                    <option value="-">Pilih brand kendaraan</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Honda">Honda</option>
                                </select>
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
    {{-- END MODAL DETAIL SERI KENDARAAN --}}

    {{-- MODAL EDIT SERI KENDARAAN --}}
    <div class="modal fade" id="editSeriModal" tabindex="-1" aria-labelledby="editSeriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Nomor Seri Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Brand Kendaraan</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <select id="jenis" class="input">
                                    <option value="-">Pilih jenis kendaraan</option>
                                    <option value="kendaraan_roda_2">Kendaraan Roda 2</option>
                                    <option value="kendaraan_roda_4">Kendaraan Roda 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <select id="brand" class="input">
                                    <option value="-">Pilih brand kendaraan</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Honda">Honda</option>
                                </select>
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
    {{-- END MODAL EDIT SERI KENDARAAN --}}

    {{-- MODAL HAPUS SERI KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusSeriModal" tabindex="-1" aria-labelledby="hapusSeriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Nomor Seri Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Nomor Seri Kendaraan: Apakah Anda
                        yakin
                        ingin
                        menghapus nomor seri kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan nomor seri kendaraan akan dihapus secara permanen dari
                        sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Nomor Seri</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS SERI KENDARAAN --}}

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
