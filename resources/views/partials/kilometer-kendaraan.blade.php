{{-- MODAL TAMBAH KILOMETER KENDARAAN --}}
<div class="modal fade" id="tambahKilometerModal" tabindex="-1" aria-labelledby="tambahKilometerModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <h3 class="title">Tambah Kategori Kilometer</h3>
        <form class="form d-inline-block w-100" method="POST" action="{{ route('kilometerKendaraan.store') }}">
            @csrf
            <div class="row">
                <div class="col-12 row-button">
                    <div class="input-wrapper">
                        <label for="nama">Kategori Kilometer</label>
                        <input type="number" id="nama" class="input" required autocomplete="off"
                            name="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <p class="caption-error mt-2">{{ $message }}</p>
                        @enderror
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
        <h3 class="title">Detail Kategori Kilometer</h3>
        <form class="form d-inline-block w-100">
            <div class="row">
                <div class="col-12 row-button">
                    <div class="input-wrapper">
                        <label for="nama">Kategori Kilometer</label>
                        <input type="number" id="nama" class="input" autocomplete="off" disabled
                            data-value="jumlah">
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
        <h3 class="title">Edit Kategori Kilometer</h3>
        <form id="editKilometer" class="form d-inline-block w-100" method="POST">
            @csrf
            @csrf
            <div class="row">
                <div class="col-12 row-button">
                    <div class="input-wrapper">
                        <label for="nama">Kategori Kilometer</label>
                        <input type="number" id="nama" class="input" required autocomplete="off"
                            data-value="jumlah" name="jumlah">
                        @error('jumlah')
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
{{-- END MODAL EDIT KILOMETER KENDARAAN --}}

{{-- MODAL HAPUS KILOMETER KENDARAAN --}}
<div class="modal modal-delete fade" id="hapusKilometerModal" tabindex="-1"
aria-labelledby="hapusKilometerModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <h3 class="title">Hapus Kategori Kilometer</h3>
        <form id="hapusKilometer" class="form d-inline-block w-100" method="POST">
            @csrf
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