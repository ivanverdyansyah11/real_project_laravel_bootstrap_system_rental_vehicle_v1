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
                <form class="form-search">
                    @csrf
                    <input type="text" class="input-search" placeholder=" ">
                    <label class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/button/search.svg') }}" alt="Searcing Icon"
                            class="img-fluid search-icon">
                        <p>Cari kendaraan..</p>
                    </label>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card-product">
                    <img src="{{ asset('assets/img/default/sample-kendaraan.jpg') }}" alt="Car Thumbnail Image"
                        class="img-fluid product-img">
                    <div class="product-content">
                        <p class="product-name">Honda Brio</p>
                        <div class="wrapper-other d-flex align-items-center justify-content-between">
                            <div class="wrapper-tahun d-flex align-items-center">
                                <img src="{{ asset('assets/img/button/kendaraan.svg') }}" alt="Kendaraan Icon"
                                    class="img-fluid kendaraan-icon">
                                <p class="product-year">2017</p>
                            </div>
                            <h6 class="product-price">Rp. 500.000</h6>
                        </div>
                        <div class="wrapper-button d-flex flex-column">
                            <a href="{{ route('penambahanSewa.edit', 1) }}" class="button-primary w-100">Tambah Sewa</a>
                            <a href="{{ route('penambahanSewa.detail', 1) }}" class="button-primary-blur w-100">Lihat
                                Nota</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PENGGUNA --}}
    <div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="detailPenggunaModal" tabindex="-1" aria-labelledby="detailPenggunaModalLabel"
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
    <div class="modal fade" id="editPenggunaModal" tabindex="-1" aria-labelledby="editPenggunaModalLabel"
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
    <div class="modal modal-delete fade" id="hapusPenggunaModal" tabindex="-1"
        aria-labelledby="hapusPenggunaModalLabel" aria-hidden="true">
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
@endsection
