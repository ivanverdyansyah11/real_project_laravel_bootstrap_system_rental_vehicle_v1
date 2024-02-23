{{-- MODAL TAMBAH PENGGUNA --}}
<div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <h3 class="title">Tambah Pengguna Baru</h3>
        <form class="form d-inline-block w-100" method="POST" action="{{ route('pengguna.store') }}">
            @csrf
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama_lengkap" class="input" required
                            autocomplete="off" value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <p class="caption-error mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="input" required
                            autocomplete="off" value="{{ old('email') }}">
                        @error('email')
                            <p class="caption-error mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="input" required
                            autocomplete="off">
                        @error('password')
                            <p class="caption-error mt-2">{{ $message }}</p>
                        @enderror
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
                        <input type="text" id="nama" class="input" disabled data-value="nama_lengkap">
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="input" disabled data-value="email">
                    </div>
                </div>
                <div class="col-12 row-button">
                    <div class="input-wrapper">
                        <label for="role">Role</label>
                        <input type="text" id="role" class="input" disabled data-value="role">
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
        <form class="form d-inline-block w-100" id="editPengguna" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" class="input" required autocomplete="off"
                            data-value="nama_lengkap" name="nama_lengkap">
                        @error('nama_lengkap')
                            <p class="caption-error mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="input" required autocomplete="off"
                            data-value="email" name="email">
                        @error('email')
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
{{-- END MODAL EDIT PENGGUNA --}}

{{-- MODAL HAPUS PENGGUNA --}}
<div class="modal modal-delete fade" id="hapusPenggunaModal" tabindex="-1"
aria-labelledby="hapusPenggunaModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <h3 class="title">Hapus Pengguna</h3>
        <form class="form d-inline-block w-100" method="POST" id="hapusPengguna">
            @csrf
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