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
                <h5 class="subtitle">Data Jenis Kendaraan</h5>
                <div class="wrapper d-flex gap-2 mt-3 mt-md-0 align-items-center">
                    <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#tambahJenisModal">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row table-default p-0">
                <div class="col-12 table-row table-header">
                    <div class="row table-data gap-4">
                        <div class="col data-header">Nama Jenis Kendaraan</div>
                        <div class="col-3 col-xl-2 data-header"></div>
                    </div>
                </div>
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Kendaraan Roda 2</div>
                        <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                            <div class="wrapper-action d-flex">
                                <button type="button"
                                    class="button-action button-detail d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#detailJenisModal">
                                    <div class="detail-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#editJenisModal">
                                    <div class="edit-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#hapusJenisModal">
                                    <div class="delete-icon"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Kendaraan Roda 4 </div>
                        <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                            <div class="wrapper-action d-flex">
                                <button type="button"
                                    class="button-action button-detail d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#detailJenisModal">
                                    <div class="detail-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#editJenisModal">
                                    <div class="edit-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#hapusJenisModal">
                                    <div class="delete-icon"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PENGGUNA --}}
    <div class="modal fade" id="tambahJenisModal" tabindex="-1" aria-labelledby="tambahJenisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Pengguna Baru</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="role">Role</label>
                                <select id="role" class="input">
                                    <option value="-">Pilih role pengguna</option>
                                    <option value="staff">Staff</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Pengguna</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH PENGGUNA --}}

    {{-- MODAL DETAIL PENGGUNA --}}
    <div class="modal fade" id="detailJenisModal" tabindex="-1" aria-labelledby="detailJenisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Pengguna</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="role">Role</label>
                                <select id="role" class="input">
                                    <option value="-">Pilih role pengguna</option>
                                    <option value="staff">Staff</option>
                                    <option value="owner">Owner</option>
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
    {{-- END MODAL DETAIL PENGGUNA --}}

    {{-- MODAL EDIT PENGGUNA --}}
    <div class="modal fade" id="editJenisModal" tabindex="-1" aria-labelledby="editJenisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Pengguna</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="role">Role</label>
                                <select id="role" class="input">
                                    <option value="-">Pilih role pengguna</option>
                                    <option value="staff">Staff</option>
                                    <option value="owner">Owner</option>
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
    {{-- END MODAL EDIT PENGGUNA --}}

    {{-- MODAL HAPUS PENGGUNA --}}
    <div class="modal modal-delete fade" id="hapusJenisModal" tabindex="-1" aria-labelledby="hapusJenisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Pengguna</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Pengguna: Apakah Anda yakin ingin
                        menghapus pengguna ini?
                        Tindakan ini tidak dapat diurungkan, dan pengguna akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Pengguna</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS PENGGUNA --}}

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
