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
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Detail Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_mulai">Tanggal Diambil</label>
                            <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                value="{{ $pemesanan->tanggal_mulai }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-wrapper">
                            <label for="tanggal_akhir">Tanggal Kembali</label>
                            <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
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
                            @if ($pemesanan->sopirs_id == null)
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="Tidak memilih sopir" disabled>
                            @else
                                <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                    value="{{ $pemesanan->sopir->nama }}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-wrapper">
                            <label for="kendaraans_id">Kendaraan</label>
                            <input type="text" id="kendaraans_id" class="input" autocomplete="off"
                                value="{{ $pemesanan->kendaraan->nomor_plat }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 row-button">
                        <div class="input-wrapper">
                            <label for="seri">Seri Kendaraan</label>
                            <input type="text" id="seri" class="input" autocomplete="off" disabled
                                value="{{ $pemesanan->kendaraan->seri_kendaraan->nomor_seri }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-wrapper d-flex">
                            <a href="{{ route('pemesanan.release', $pemesanan->id) }}" class="button-primary">Pesan
                                Kendaraan</a>
                            <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
