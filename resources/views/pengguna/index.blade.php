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
                <h5 class="subtitle">Data Pengguna</h5>
                <button type="button" class="button-primary d-flex align-items-center">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Button Tambah Icon"
                        class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row">
            <div class="row table-default p-0">
                <div class="col-12 table-row table-header">
                    <div class="row table-data gap-4">
                        <div class="col data-header">Nama Lengkap</div>
                        <div class="col data-header">Email</div>
                        <div class="col data-header">Role</div>
                        <div class="col-3 col-xl-2 data-header"></div>
                    </div>
                </div>
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Anak Agung Aditya Prayatna</div>
                        <div class="col data-value data-length">adityaprayatna@gmail.com</div>
                        <div class="col data-value data-length">Admin</div>
                        <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                            <div class="wrapper-action d-flex">
                                <button type="button"
                                    class="button-action button-detail d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#detailSectionModal">
                                    <div class="detail-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#editSectionModal">
                                    <div class="edit-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#deleteSectionModal">
                                    <div class="delete-icon"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Putri Dewi Sakara</div>
                        <div class="col data-value data-length">dewisakara@gmail.com</div>
                        <div class="col data-value data-length">Staff</div>
                        <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                            <div class="wrapper-action d-flex">
                                <button type="button"
                                    class="button-action button-detail d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#detailSectionModal">
                                    <div class="detail-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#editSectionModal">
                                    <div class="edit-icon"></div>
                                </button>
                                <button type="button"
                                    class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#deleteSectionModal">
                                    <div class="delete-icon"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
