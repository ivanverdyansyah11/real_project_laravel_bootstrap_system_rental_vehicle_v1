{{-- MODAL TAMBAH BRAND KENDARAAN --}}
<div class="modal fade" id="tambahBrandModal" tabindex="-1" aria-labelledby="tambahBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Tambah Brand Kendaraan Baru</h3>
            <form class="form d-inline-block w-100" method="POST" action="{{ route('brandKendaraan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Brand Kendaraan</label>
                            <input type="text" id="nama" class="input" required autocomplete="off"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <p class="caption-error mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-wrapper d-flex">
                            <button type="submit" class="button-primary">Tambah Brand</button>
                            <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END MODAL TAMBAH BRAND KENDARAAN --}}

{{-- MODAL DETAIL BRAND KENDARAAN --}}
<div class="modal fade" id="detailBrandModal" tabindex="-1" aria-labelledby="detailBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Detail Brand Kendaraan</h3>
            <form class="form d-inline-block w-100">
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Brand Kendaraan</label>
                            <input type="text" id="nama" class="input" autocomplete="off"
                                data-value="nama" disabled>
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
{{-- END MODAL DETAIL BRAND KENDARAAN --}}

{{-- MODAL EDIT BRAND KENDARAAN --}}
<div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Edit Brand Kendaraan</h3>
            <form id="editBrand" class="form d-inline-block w-100" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 row-button">
                        <div class="input-wrapper">
                            <label for="nama">Nama Brand Kendaraan</label>
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
{{-- END MODAL EDIT BRAND KENDARAAN --}}

{{-- MODAL HAPUS BRAND KENDARAAN --}}
<div class="modal modal-delete fade" id="hapusBrandModal" tabindex="-1" aria-labelledby="hapusBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="title">Hapus Brand Kendaraan</h3>
            <form id="hapusBrand" class="form d-inline-block w-100" method="POST">
                @csrf
                <p class="caption-description row-button">Konfirmasi Penghapusan Brand Kendaraan: Apakah Anda yakin
                    ingin
                    menghapus brand kendaraan ini?
                    Tindakan ini tidak dapat diurungkan, dan brand kendaraan akan dihapus secara permanen dari sistem.
                </p>
                <div class="button-wrapper d-flex">
                    <button type="submit" class="button-primary">Hapus Brand</button>
                    <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END MODAL HAPUS BRAND KENDARAAN --}}