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
                <button type="button" class="button-primary d-none d-md-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#tambahSeriModal">
                    <img src="{{ asset('assets/img/button/add.svg') }}" alt="Tambah Icon" class="img-fluid button-icon">
                    Tambah
                </button>
            </div>
        </div>
        <div class="row table-default">
            <div class="col-12 table-row table-header">
                <div class="row table-data gap-4">
                    <div class="col data-header">Nomor Seri</div>
                    <div class="col data-header d-none d-lg-inline-block">Nomor Plat</div>
                    <div class="col data-header d-none d-lg-inline-block">Jenis Kendaraan</div>
                    <div class="col data-header d-none d-lg-inline-block">Brand Kendaraan</div>
                    <div class="col-3 col-xl-2 data-header"></div>
                </div>
            </div>
            @if ($series->count() == 0)
                <div class="col-12 table-row table-border">
                    <div class="row table-data gap-4 align-items-center">
                        <div class="col data-value data-length">Tidak Ada Data Nomor Seri Kendaraan!</div>
                    </div>
                </div>
            @else
                @foreach ($series as $seri)
                    <div class="col-12 table-row table-border">
                        <div class="row table-data gap-4 align-items-center">
                            <div class="col data-value data-length">{{ $seri->nomor_seri }}</div>
                            <div class="col data-value data-length data-length-none">{{ $seri->nomor_plat }}</div>
                            <div class="col data-value data-length data-length-none">{{ $seri->jenis_kendaraan->nama }}
                            </div>
                            <div class="col data-value data-length data-length-none">{{ $seri->brand_kendaraan->nama }}
                            </div>
                            <div class="col-3 col-xl-2 data-value d-flex justify-content-end">
                                <div class="wrapper-action d-flex">
                                    <button type="button"
                                        class="button-action button-detail d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#detailSeriModal"
                                        data-id="{{ $seri->id }}">
                                        <div class="detail-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-edit d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editSeriModal"
                                        data-id="{{ $seri->id }}">
                                        <div class="edit-icon"></div>
                                    </button>
                                    <button type="button"
                                        class="button-action button-delete d-none d-md-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#hapusSeriModal"
                                        data-id="{{ $seri->id }}">
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
            {{ $series->links() }}
        </div>
    </div>

    {{-- MODAL TAMBAH SERI KENDARAAN --}}
    <div class="modal fade" id="tambahSeriModal" tabindex="-1" aria-labelledby="tambahSeriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Tambah Nomor Seri Kendaraan</h3>
                <form class="form d-inline-block w-100" method="POST" action="{{ route('seriKendaraan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Nomor Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off" name="nomor_seri"
                                    pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                @error('nomor_seri')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_plat">Nomor Plat</label>
                                <input type="text" id="nomor_plat" class="input" autocomplete="off" name="nomor_plat">
                                @error('nomor_plat')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <select id="jenis" class="input" name="jenis_kendaraans_id">
                                    <option value="-">Pilih jenis kendaraan</option>
                                    @foreach ($jenises as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <select id="brand" class="input" name="brand_kendaraans_id">
                                    <option value="-">Pilih brand kendaraan</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->nama }}</option>
                                    @endforeach
                                </select>
                                @error('brand_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
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
                                <label for="nomor">Nomor Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off"
                                    data-value="nomor_seri" disabled>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_plat">Nomor Plat</label>
                                <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                    data-value="nomor_plat" disabled>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off"
                                    data-value="jenis_kendaraan" disabled>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off"
                                    data-value="brand_kendaraan" disabled>
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
                <form id="editSeri" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Nomor Seri Kendaraan</label>
                                <input type="text" id="nomor" class="input" autocomplete="off"
                                    name="nomor_seri" data-value="nomor_seri" pattern="[0-9]*"
                                    title="Hanya angka 0-9 diperbolehkan">
                                @error('nomor_seri')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_plat">Nomor Plat</label>
                                <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                    name="nomor_plat" data-value="nomor_plat">
                                @error('nomor_plat')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <select id="jenis" class="input" name="jenis_kendaraans_id"
                                    data-value="jenis_kendaraan">
                                </select>
                                @error('jenis_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <select id="brand" class="input" name="brand_kendaraans_id"
                                    data-value="brand_kendaraan">
                                </select>
                                @error('brand_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
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
                <form id="hapusSeri" class="form d-inline-block w-100" method="POST">
                    @csrf
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
        $(document).on('click', '[data-bs-target="#detailSeriModal"]', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '/seri-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nomor_seri"]').val(data[0].nomor_seri);
                    $('[data-value="nomor_plat"]').val(data[0].nomor_plat);
                    $('[data-value="jenis_kendaraan"]').val(data[0].jenis_kendaraan.nama);
                    $('[data-value="brand_kendaraan"]').val(data[0].brand_kendaraan.nama);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#editSeriModal"]', function() {
            let id = $(this).data('id');
            console.log(id);
            $('[data-value="jenis_kendaraan"] option').remove();
            $('[data-value="brand_kendaraan"] option').remove();
            $('#editSeri').attr('action', '/seri-kendaraan/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/seri-kendaraan/detail/' + id,
                success: function(data) {
                    $('[data-value="nomor_seri"]').val(data[0].nomor_seri);
                    $('[data-value="nomor_plat"]').val(data[0].nomor_plat);
                    $('[data-value="jenis_kendaraan"]').append(
                        `<option value="${data[0].jenis_kendaraan.id}">${data[0].jenis_kendaraan.nama}</option>`
                    );
                    $('[data-value="brand_kendaraan"]').append(
                        `<option value="${data[0].brand_kendaraan.id}">${data[0].brand_kendaraan.nama}</option>`
                    );

                    data[1].forEach(jenis => {
                        $('[data-value="jenis_kendaraan"]').append(
                            `<option value="${jenis.id}">${jenis.nama}</option>`
                        );
                    });

                    data[2].forEach(brand => {
                        $('[data-value="brand_kendaraan"]').append(
                            `<option value="${brand.id}">${brand.nama}</option>`
                        );
                    });
                }
            });
        });

        $(document).on('click', '[data-bs-target="#hapusSeriModal"]', function() {
            let id = $(this).data('id');
            $('#hapusSeri').attr('action', '/seri-kendaraan/hapus/' + id);
        });
    </script>
@endsection
