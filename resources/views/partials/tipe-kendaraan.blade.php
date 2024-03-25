{{-- MODAL HAPUS SERI KENDARAAN --}}
<div class="modal modal-delete fade" id="hapusSeriModal" tabindex="-1" aria-labelledby="hapusSeriModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <h3 class="title">Hapus Tipe Kendaraan</h3>
        <form id="hapusSeri" class="form d-inline-block w-100" method="POST">
            @csrf
            <p class="caption-description row-button">Konfirmasi Penghapusan Tipe Kendaraan: Apakah Anda
                yakin
                ingin
                menghapus tipe kendaraan ini?
                Tindakan ini tidak dapat diurungkan, dan tipe kendaraan akan dihapus secara permanen dari
                sistem.
            </p>
            <div class="button-wrapper d-flex">
                <button type="submit" class="button-primary">Hapus Tipe</button>
                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
            </div>
        </form>
    </div>
</div>
</div>
{{-- END MODAL HAPUS SERI KENDARAAN --}}