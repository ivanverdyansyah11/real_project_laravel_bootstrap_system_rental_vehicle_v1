@extends('template.main')

@section('content')
    <div class="content">
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Detail Riwayat Pemesanan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('booking.create.action') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_hari">Total Harian</label>
                                <input type="text" id="waktu_sewa_hari" class="input" autocomplete="off"
                                    value="{{ $pemesanan->total_harian }} hari" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_minggu">Total Mingguan</label>
                                <input type="text" id="waktu_sewa_minggu" class="input" autocomplete="off"
                                    value="{{ $pemesanan->total_mingguan }} minggu" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_bulan">Total Bulanan</label>
                                <input type="text" id="waktu_sewa_bulan" class="input" autocomplete="off"
                                    value="{{ $pemesanan->total_bulanan }} bulan" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_mulai">Tanggal Diambil</label>
                                <input type="text" id="tanggal_mulai" class="input" autocomplete="off"
                                    value="{{ $pemesanan->tanggal_mulai }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_akhir">Tanggal Kembali</label>
                                <input type="text" id="tanggal_akhir" class="input" autocomplete="off"
                                    value="{{ $pemesanan->tanggal_akhir }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="pelanggans_id">Pelanggan</label>
                                <input type="text" id="pelanggans_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->pelanggan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="sopirs_id">Sopir</label>
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->sopir ? $pemesanan->sopir->nama : '-' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <input type="text" id="jenis_kendaraan" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->jenis_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand_kendaraan">Brand Kendaraan</label>
                                <input type="text" id="brand_kendaraan" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->brand_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="seri_kendaraans_id">Tipe Kendaraan</label>
                                <input type="text" id="seri_kendaraan" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->seri_kendaraan->nomor_seri }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="kendaraans_id">Kendaraan</label>
                                <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->kendaraan->nomor_plat }}" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <a href="{{ route('kendaraan.historyReservation', $pemesanan->kendaraan->id) }}"
                                    class="button-reverse">Kembali ke Halaman Riwayat</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
