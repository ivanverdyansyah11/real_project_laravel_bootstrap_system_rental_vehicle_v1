{{-- MODAL TAMBAH JENIS KENDARAAN --}}
<div class="modal fade" id="tambahJenisModal" tabindex="-1" aria-labelledby="tambahJenisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Tambah Jenis Kendaraan Baru</h3>
            <form class="form d-inline-block w-100" method="POST" action="{{ route('jenisKendaraan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Jenis Kendaraan</label>
                            <input type="text" id="nama" class="input" required autocomplete="off"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <p class="caption-error mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-wrapper d-flex">
                            <button type="submit" class="button-primary">Tambah Jenis</button>
                            <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END MODAL TAMBAH JENIS KENDARAAN --}}

{{-- MODAL DETAIL JENIS KENDARAAN --}}
<div class="modal fade" id="detailJenisModal" tabindex="-1" aria-labelledby="detailJenisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Detail Jenis Kendaraan</h3>
            <form class="form d-inline-block w-100">
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Jenis Kendaraan</label>
                            <input type="text" id="nama" class="input" autocomplete="off" disabled
                                data-value="nama">
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
{{-- END MODAL DETAIL JENIS KENDARAAN --}}

{{-- MODAL EDIT JENIS KENDARAAN --}}
<div class="modal fade" id="editJenisModal" tabindex="-1" aria-labelledby="editJenisModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Edit Jenis Kendaraan</h3>
            <form id="editJenis" class="form d-inline-block w-100" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Jenis Kendaraan</label>
                            <input type="text" id="nama" class="input" required autocomplete="off"
                                data-value="nama" name="nama">
                            @error('nama')
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
{{-- END MODAL EDIT JENIS KENDARAAN --}}

{{-- MODAL HAPUS JENIS KENDARAAN --}}
<div class="modal modal-delete fade" id="hapusJenisModal" tabindex="-1" aria-labelledby="hapusJenisModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Hapus Jenis Kendaraan</h3>
            <form id="hapusJenis" class="form d-inline-block w-100" method="POST">
                @csrf
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
{{-- END MODAL HAPUS JENIS KENDARAAN --}}