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
                <h5 class="subtitle">Konfirmasi Pengembalian Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST"
                    action="{{ route('pengembalian.restoration.action', $pemesanan->kendaraan->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-transaction"
                                            name="foto_pembayaran" value="{{ old('foto_pembayaran') }}" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-transaction">Pilih Foto
                                            Pembayaran</button>
                                    </div>
                                </div>
                                @error('foto_pembayaran')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jenis_pembayaran_sebelumnya">Jenis Pembayaran Sebelumnya</label>
                                        <input type="text" id="jenis_pembayaran_sebelumnya" class="input"
                                            autocomplete="off" value="{{ $pembayaran->jenis_pembayaran }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar Sebelumnya</label>
                                        <input type="text" id="total_bayar" class="input" autocomplete="off"
                                            value="{{ $pembayaran->total_bayar ?: '0' }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label>Tanggal Kembali</label>
                                        <input type="date" class="input" autocomplete="off"
                                            value="{{ $pemesanan->tanggal_kembali }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                        <input type="text" id="total_tarif_sewa" class="input" autocomplete="off"
                                            value="{{ $pembayaran->total_tarif_sewa }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                        <select id="jenis_pembayaran" class="input" name="jenis_pembayaran"
                                            value="{{ old('jenis_pembayaran') }}">
                                            <option value="-">Pilih jenis pembayaran</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="dp">DP</option>
                                            <option value="belum bayar">Belum Bayar</option>
                                        </select>
                                        @error('jenis_pembayaran')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="metode_bayar">Metode Pembayaran</label>
                                        <select id="metode_bayar" class="input" name="metode_bayar"
                                            value="{{ old('metode_bayar') }}">
                                            <option value="-">Pilih metode pembayaran</option>
                                            <option value="transfer bank">Transfer Bank</option>
                                            <option value="internet banking">Internet Banking (E-Banking)</option>
                                            <option value="mobile banking">Mobile Banking</option>
                                            <option value="virtual account">Virtual Account (VA)</option>
                                            <option value="online credit card">Online Credit Card</option>
                                            <option value="rekening bersama">Rekening Bersama (Rekber)</option>
                                            <option value="payPal">PayPal</option>
                                            <option value="e-money">e-Money</option>
                                        </select>
                                        @error('metode_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_kembali">Pengembalian Tanggal</label>
                                        <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="input"
                                            autocomplete="off">
                                        @error('tanggal_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="number" id="total_bayar" class="input" autocomplete="off"
                                            name="total_bayar" value="{{ old('total_bayar') }}">
                                        @error('total_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_kembali">Kilometer Kembali</label>
                                        <input type="number" id="kilometer_kembali" name="kilometer_kembali"
                                            class="input" autocomplete="off">
                                        @error('kilometer_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_kembali">Bensin Kembali</label>
                                        <input type="number" id="bensin_kembali" name="bensin_kembali" class="input"
                                            autocomplete="off">
                                        @error('bensin_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="ketepatan_waktu">Ketepatan Waktu</label>
                                        <select id="ketepatan_waktu" name="ketepatan_waktu" class="input">
                                            <option value="-">Pilih ketepatan pengembalian</option>
                                            <option value="tepat">Tepat</option>
                                            <option value="tidak tepat">Tidak Tepat</option>
                                        </select>
                                        @error('ketepatan_waktu')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="terlambat">Terlambat (Max 3 Jam)</label>
                                        <input type="number" id="terlambat" name="terlambat" class="input"
                                            autocomplete="off">
                                        @error('terlambat')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="sarung_jok">Sarung Jok</label>
                                        <select id="sarung_jok" class="input" name="sarung_jok"
                                            value="{{ old('sarung_jok') }}">
                                            <option value="-">Pilih kelengkapan sarung jok</option>
                                            <option value="ada">Ada</option>
                                            <option value="tidak ada">Tidak Ada</option>
                                            <option value="kosong">Kosong</option>
                                        </select>
                                        @error('sarung_jok')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="karpet">Karpet</label>
                                        <select id="karpet" class="input" name="karpet"
                                            value="{{ old('karpet') }}">
                                            <option value="-">Pilih kelengkapan karpet</option>
                                            <option value="ada">Ada</option>
                                            <option value="tidak ada">Tidak Ada</option>
                                            <option value="kosong">Kosong</option>
                                        </select>
                                        @error('karpet')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                        <select id="kondisi_kendaraan" class="input" name="kondisi_kendaraan"
                                            value="{{ old('kondisi_kendaraan') }}">
                                            <option value="-">Pilih kondisi kendaraan</option>
                                            <option value="baik">Baik</option>
                                            <option value="rusak ringan">Rusak Ringan</option>
                                            <option value="rusak berat">Rusak Berat</option>
                                        </select>
                                        @error('kondisi_kendaraan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="ban_serep">Ban Serep</label>
                                        <select id="ban_serep" class="input" name="ban_serep"
                                            value="{{ old('ban_serep') }}">
                                            <option value="-">Pilih ban serep</option>
                                            <option value="ada">Ada</option>
                                            <option value="tidak ada">Tidak Ada</option>
                                            <option value="kosong">Kosong</option>
                                        </select>
                                        @error('ban_serep')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="biaya_tambahan">Biaya Tambahan</label>
                                        <input type="number" id="biaya_tambahan" name="biaya_tambahan" class="input"
                                            autocomplete="off">
                                        @error('biaya_tambahan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 row-button">
                                    <div class="input-wrapper">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan" class="input"
                                            autocomplete="off">
                                        @error('keterangan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <button type="submit" class="button-primary">Simpan Pengembalian</button>
                                        <a href="{{ route('pengembalian') }}" class="button-reverse">Batal
                                            Pengembalian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#sarung_jok").select2({
            theme: "bootstrap-5",
        });

        $("#karpet").select2({
            theme: "bootstrap-5",
        });

        $("#kondisi_kendaraan").select2({
            theme: "bootstrap-5",
        });

        $("#ban_serep").select2({
            theme: "bootstrap-5",
        });

        $("#jenis_pembayaran").select2({
            theme: "bootstrap-5",
        });

        $("#metode_bayar").select2({
            theme: "bootstrap-5",
        });

        $("#ketepatan_waktu").select2({
            theme: "bootstrap-5",
        });

        const tagCreateTransaction = document.querySelector('.tag-create-transaction');
        const inputCreateTransaction = document.querySelector('.input-create-transaction');
        const buttonCreateTransaction = document.querySelector('.button-create-transaction');

        buttonCreateTransaction.addEventListener('click', function() {
            inputCreateTransaction.click();
        });

        inputCreateTransaction.addEventListener('change', function() {
            tagCreateTransaction.src = URL.createObjectURL(inputCreateTransaction.files[0]);
        });
    </script>
@endsection
