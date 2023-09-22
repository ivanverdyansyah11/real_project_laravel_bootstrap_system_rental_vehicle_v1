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
                <button type="button" class="button-primary d-none d-md-flex align-items-center">
                    <img src="{{ asset('assets/img/button/export.svg') }}" alt="Export Icon" class="img-fluid button-icon">
                    Export
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Laporan Kegiatan</div>
                    <div class="col d-none d-lg-inline-block data-header">Pengguna</div>
                    <div class="col d-none d-lg-inline-block data-header">Tanggal</div>
                    <div class="col d-none d-lg-inline-block data-header">Total Harga</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Penyewaan Mobil Honda Brio (Honda)</div>
                    <div class="col data-value data-length data-length-none">Putu Aditya Prayatna</div>
                    <div class="col data-value data-length data-length-none">16/9/23, 15:34</div>
                    <div class="col data-value data-length data-length-none status-true">Rp. 1.500.000</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <a href=""
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </a>
                            <a href=""
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </a>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusLaporanModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 table-row table-border">
                <div class="row table-data gap-4 align-items-center">
                    <div class="col data-value data-length">Penyewaan Mobil New Brio (Honda)</div>
                    <div class="col data-value data-length data-length-none">Putri Dewi Sakara</div>
                    <div class="col data-value data-length data-length-none">16/9/23, 12:34</div>
                    <div class="col data-value data-length data-length-none status-false">Rp. 2.000.000</div>
                    <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                        <div class="wrapper-action d-flex">
                            <a href=""
                                class="button-action button-detail d-flex justify-content-center align-items-center">
                                <div class="detail-icon"></div>
                            </a>
                            <a href=""
                                class="button-action button-edit d-none d-md-flex justify-content-center align-items-center">
                                <div class="edit-icon"></div>
                            </a>
                            <button type="button"
                                class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#hapusLaporanModal">
                                <div class="delete-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL HAPUS LAPORAN --}}
    <div class="modal modal-delete fade" id="hapusLaporanModal" tabindex="-1" aria-labelledby="hapusLaporanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Laporan</h3>
                <form class="form d-inline-block w-100">
                    <p class="caption-description row-button">Konfirmasi Penghapusan Laporan: Apakah Anda yakin ingin
                        menghapus laporan ini?
                        Tindakan ini tidak dapat diurungkan, dan laporan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Laporan</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS LAPORAN --}}
@endsection
