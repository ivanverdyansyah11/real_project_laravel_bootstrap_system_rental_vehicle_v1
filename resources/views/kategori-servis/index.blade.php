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
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-md-between align-items-end align-items-md-center">
                <h5 class="subtitle">Data Kategori Servis</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahKategoriServisModal"
                    class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nama</div>
                    <div class="col d-none d-lg-inline-block data-header">Diservis</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Servis Lengkap</div>
                    <div class="col data-value data-length data-length-none">Air Accu, Air Waiper, Ban, Oli</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#detailKategoriServisModal"
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editKategoriServisModal"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusKategoriServisModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Servis Oli</div>
                    <div class="col data-value data-length data-length-none">Oli</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#detailKategoriServisModal"
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editKategoriServisModal"
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </button>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusKategoriServisModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH KATEGORI SERVIS --}}
    <div class="modal fade" id="tambahKategoriServisModal" tabindex="-1" aria-labelledby="tambahKategoriServisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Kategori Servis</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Servis</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <div class="input-line position-relative mb-2">
                                    <div class="line"></div>
                                    <p>List Diservis</p>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_accu">
                                            <label for="air_accu">Air Accu</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_waiper">
                                            <label for="air_waiper">Air Waiper</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="ban">
                                            <label for="ban">Ban</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="oli">
                                            <label for="oli">Oli</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Servis</button>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH KATEGORI SERVIS --}}

    {{-- MODAL DETAIL KATEGORI SERVIS --}}
    <div class="modal fade" id="detailKategoriServisModal" tabindex="-1"
        aria-labelledby="detailKategoriServisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Detail Kategori Servis</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Servis</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <div class="input-line position-relative mb-2">
                                    <div class="line"></div>
                                    <p>List Diservis</p>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_accu">
                                            <label for="air_accu">Air Accu</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_waiper">
                                            <label for="air_waiper">Air Waiper</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="ban">
                                            <label for="ban">Ban</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="oli">
                                            <label for="oli">Oli</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Tutup
                                    Modal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL DETAIL KATEGORI SERVIS --}}

    {{-- MODAL EDIT KATEGORI SERVIS --}}
    <div class="modal fade" id="editKategoriServisModal" tabindex="-1" aria-labelledby="editKategoriServisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Edit Kategori Servis</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama Servis</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <div class="input-line position-relative mb-2">
                                    <div class="line"></div>
                                    <p>List Diservis</p>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_accu">
                                            <label for="air_accu">Air Accu</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="air_waiper">
                                            <label for="air_waiper">Air Waiper</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="ban">
                                            <label for="ban">Ban</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-checkbox d-flex align-items-center">
                                            <input type="checkbox" id="oli">
                                            <label for="oli">Oli</label>
                                        </div>
                                    </div>
                                </div>
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
    {{-- END MODAL EDIT KATEGORI SERVIS --}}

    {{-- MODAL HAPUS KATEGORI SERVIS --}}
    <div class="modal modal-delete fade" id="hapusKategoriServisModal" tabindex="-1"
        aria-labelledby="hapusKategoriServisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Jenis Kendaraan</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Jenis Kendaraan: Apakah Anda yakin
                        ingin
                        menghapus jenis kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan jenis kendaraan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Jenis</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS KATEGORI SERVIS --}}

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });
    </script>
@endsection
