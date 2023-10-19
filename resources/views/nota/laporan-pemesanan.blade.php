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
                <h5 class="subtitle">Laporan Data Pemesanan Kendaraan</h5>
            </div>
        </div>
        <form action="{{ route('laporan.pemesanan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-end">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Nota</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pemesanan->foto_nota ? asset('assets/img/nota-images/' . $pemesanan->foto_nota) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-nota" alt="Nota Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-nota" name="foto_nota"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-nota">Pilih Foto
                                            Nota</button>
                                    </div>
                                </div>
                                @error('foto_nota')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Nota TTD</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pemesanan->foto_nota_ttd ? asset('assets/img/nota-ttd-images/' . $pemesanan->foto_nota_ttd) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-nota-ttd" alt="Nota Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-nota-ttd"
                                            name="foto_nota_ttd" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-nota-ttd">Pilih Foto
                                            Nota TTD</button>
                                    </div>
                                </div>
                                @error('foto_nota_ttd')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-3 col-xl-2 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Dokumen</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/pemesanan-dokumen-images/' . $pemesanan->foto_dokumen) }}"
                                        class="img-fluid tag-create-document" alt="Dokumen Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-3 col-xl-2 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Kendaraan</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/pemesanan-kendaraan-images/' . $pemesanan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-vehicle" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-3 col-xl-2 mb-5">
                            <div class="input-wrapper">
                                <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Pelanggan</p>
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/pemesanan-pelanggan-images/' . $pemesanan->foto_pelanggan) }}"
                                        class="img-fluid tag-create-customer" alt="Pelanggan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nama_penyewa">Nama Pelanggan</label>
                                        <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                            value="{{ $pemesanan->pemesanan->pelanggan->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kendaraan->nomor_plat }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_keluar">Kilometer Keluar</label>
                                        <input type="number" id="kilometer_keluar" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kilometer_keluar }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_keluar">Bensin Keluar</label>
                                        <input type="number" id="bensin_keluar" class="input" autocomplete="off"
                                            value="{{ $pemesanan->bensin_keluar }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="sarung_jok">Sarung Jok</label>
                                        <input type="text" id="sarung_jok" class="input"
                                            value="{{ $pemesanan->sarung_jok }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="karpet">Karpet</label>
                                        <input type="text" id="karpet" class="input"
                                            value="{{ $pemesanan->karpet }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                        <input type="text" id="kondisi_kendaraan" class="input"
                                            value="{{ $pemesanan->kondisi_kendaraan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                        <label for="ban_serep">Ban Serep</label>
                                        <input type="text" id="ban_serep" class="input"
                                            value="{{ $pemesanan->ban_serep }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_hari">Tarif Sewa Kendaran Harian</label>
                                        <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kendaraan->tarif_sewa_hari }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_minggu">Tarif Sewa Kendaran Mingguan</label>
                                        <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kendaraan->tarif_sewa_minggu }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_bulan">Tarif Sewa Kendaran Bulanan</label>
                                        <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kendaraan->tarif_sewa_bulan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_diambil">Tanggal Diambil</label>
                                        <input type="date" id="tanggal_diambil" class="input" autocomplete="off"
                                            readonly value="{{ $pemesanan->tanggal_diambil }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <input type="date" id="tanggal_kembali" class="input" autocomplete="off"
                                            readonly value="{{ $pemesanan->tanggal_kembali }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="penggunas_id">Pengguna Menambahkan</label>
                                        <input type="text" id="penggunas_id" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->pengguna->nama_lengkap }}">
                                    </div>
                                </div>
                                <div class="col-md-6 row-button">
                                    <div class="input-wrapper">
                                        <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                        <input type="text" id="tanggal_dibuat" class="input" autocomplete="off"
                                            readonly value="{{ $laporan->created_at }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex gap-2">
                                        <button type="submit" class="button-primary">Simpan Perubahan</button>
                                        <a href="{{ route('laporan.pemesanan') }}" class="button-reverse">Kembali ke
                                            Halaman</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const tagCreateNota = document.querySelector('.tag-create-nota');
        const inputCreateNota = document.querySelector('.input-create-nota');
        const buttonCreateNota = document.querySelector('.button-create-nota');

        const tagCreateNotaTTD = document.querySelector('.tag-create-nota-ttd');
        const inputCreateNotaTTD = document.querySelector('.input-create-nota-ttd');
        const buttonCreateNotaTTD = document.querySelector('.button-create-nota-ttd');

        buttonCreateNota.addEventListener('click', function() {
            inputCreateNota.click();
        });

        inputCreateNota.addEventListener('change', function() {
            tagCreateNota.src = URL.createObjectURL(inputCreateNota.files[0]);
        });

        buttonCreateNotaTTD.addEventListener('click', function() {
            inputCreateNotaTTD.click();
        });

        inputCreateNotaTTD.addEventListener('change', function() {
            tagCreateNotaTTD.src = URL.createObjectURL(inputCreateNotaTTD.files[0]);
        });
    </script>
@endsection
