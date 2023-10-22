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
                <h5 class="subtitle">Edit Pemesanan Kendaraan</h5>
                <a href="{{ route('laporan.pemesanan.print', $laporan->id) }}"
                    class="button-primary d-flex gap-2 align-items-center">
                    <div class="export-icon"></div>
                    Print Pelepasan
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('pemesanan.update', $pemesanan->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_dokumen ? asset('assets/img/pemesanan-dokumen-images/' . $pelepasan_pemesanan->foto_dokumen) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-document" alt="Dokumen Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-document"
                                            name="foto_dokumen" value="{{ old('foto_dokumen') }}" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-document">Pilih Foto
                                            Dokumen</button>
                                    </div>
                                </div>
                                @error('foto_dokumen')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_kendaraan ? asset('assets/img/pemesanan-kendaraan-images/' . $pelepasan_pemesanan->foto_kendaraan) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-vehicle" alt="Kendaraan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-vehicle"
                                            name="foto_kendaraan" value="{{ old('foto_kendaraan') }}" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-vehicle">Pilih Foto
                                            Kendaraan</button>
                                    </div>
                                </div>
                                @error('foto_kendaraan')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->foto_pelanggan ? asset('assets/img/pemesanan-pelanggan-images/' . $pelepasan_pemesanan->foto_pelanggan) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-customer" alt="Pelanggan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-customer"
                                            name="foto_pelanggan" value="{{ old('foto_pelanggan') }}" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-customer">Pilih Foto
                                            Pelanggan</button>
                                    </div>
                                </div>
                                @error('foto_pelanggan')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nama_penyewa">Nama Pelanggan</label>
                                        @if ($pemesanan->pelanggan)
                                            <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                                value="{{ $pemesanan->pelanggan->nama }}" disabled>
                                        @else
                                            <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                                value="Belum memilih pelanggan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        @if ($pemesanan->kendaraan)
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                                value="{{ $pemesanan->kendaraan->nomor_plat }}" disabled>
                                        @else
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                                value="Belum memilih kendaraan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_keluar">Kilometer Keluar (Km)</label>
                                        <input type="number" id="kilometer_keluar" class="input" autocomplete="off"
                                            name="kilometer_keluar" value="{{ $pelepasan_pemesanan->kilometer_keluar }}"
                                            required>
                                        @error('kilometer_keluar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_keluar">Bensin Keluar (Liter)</label>
                                        <input type="number" id="bensin_keluar" class="input" autocomplete="off"
                                            name="bensin_keluar" value="{{ $pelepasan_pemesanan->bensin_keluar }}"
                                            required>
                                        @error('bensin_keluar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="sarung_jok">Sarung Jok</label>
                                        <select id="sarung_jok" class="input" name="sarung_jok" required>
                                            <option value="ada"
                                                {{ $pelepasan_pemesanan->sarung_jok == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ $pelepasan_pemesanan->sarung_jok == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="kosong"
                                                {{ $pelepasan_pemesanan->sarung_jok == 'kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                        @error('sarung_jok')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="karpet">Karpet</label>
                                        <select id="karpet" class="input" name="karpet" required>
                                            <option value="ada"
                                                {{ $pelepasan_pemesanan->karpet == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ $pelepasan_pemesanan->karpet == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="kosong"
                                                {{ $pelepasan_pemesanan->karpet == 'kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                        @error('karpet')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                        <select id="kondisi_kendaraan" class="input" name="kondisi_kendaraan" required>
                                            <option value="baik"
                                                {{ $pelepasan_pemesanan->kondisi_kendaraan == 'baik' ? 'selected' : '' }}>
                                                Baik</option>
                                            <option value="rusak ringan"
                                                {{ $pelepasan_pemesanan->kondisi_kendaraan == 'rusak ringan' ? 'selected' : '' }}>
                                                Rusak
                                                Ringan</option>
                                        </select>
                                        @error('kondisi_kendaraan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                        <label for="ban_serep">Ban Serep</label>
                                        <select id="ban_serep" class="input" name="ban_serep" required>
                                            <option value="ada"
                                                {{ $pelepasan_pemesanan->ban_serep == 'ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="tidak ada"
                                                {{ $pelepasan_pemesanan->ban_serep == 'tidak ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="kosong"
                                                {{ $pelepasan_pemesanan->ban_serep == 'kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                        @error('ban_serep')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        <div class="input-wrapper">
                            <div class="input-line position-relative mb-2">
                                <div class="line"></div>
                                <p>Pembayaran Pelepasan Kendaraan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran ? asset('assets/img/pembayaran-pemesanan-images/' . $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-transaction"
                                            name="foto_pembayaran" value="{{ old('foto_pembayaran') }}"
                                            style="opacity: 0;">
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
                                        <label for="waktu_sewa">Waktu Sewa (Hari)</label>
                                        <input type="number" id="waktu_sewa" class="input" autocomplete="off"
                                            name="waktu_sewa"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->waktu_sewa }}" required
                                            readonly>
                                        @error('waktu_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                        <input type="number" id="total_tarif_sewa" class="input" autocomplete="off"
                                            name="total_tarif_sewa"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_tarif_sewa }}"
                                            required readonly>
                                        @error('total_tarif_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="number" id="total_bayar" class="input" autocomplete="off"
                                            name="total_bayar"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar ? $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar : '' }}">
                                        @error('total_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_kembalian">Total Kembalian</label>
                                        <input type="number" id="total_kembalian" class="input" autocomplete="off"
                                            name="total_kembalian"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_kembalian }}"
                                            readonly>
                                        @error('total_kembalian')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                        <select id="jenis_pembayaran" class="input" name="jenis_pembayaran"
                                            value="{{ old('jenis_pembayaran') }}" required>
                                            <option value="lunas"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran == 'lunas' ? 'selected' : '' }}>
                                                Lunas
                                            </option>
                                            <option value="dp"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran == 'dp' ? 'selected' : '' }}>
                                                DP
                                            </option>
                                            <option value="belum bayar"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran == 'belum bayar' ? 'selected' : '' }}>
                                                Belum
                                                Bayar</option>
                                        </select>
                                        @error('jenis_pembayaran')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="metode_bayar">Metode Pembayaran</label>
                                        <select id="metode_bayar" class="input" name="metode_bayar">
                                            <option value="-"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == '-' ? 'selected' : '' }}>
                                                Pilih metode pembayaran</option>
                                            <option value="transfer bank"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'transfer bank' ? 'selected' : '' }}>
                                                Transfer
                                                Bank
                                            </option>
                                            <option value="internet banking"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'internet banking' ? 'selected' : '' }}>
                                                Internet
                                                Banking
                                                (E-Banking)</option>
                                            <option value="mobile banking"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'mobile banking' ? 'selected' : '' }}>
                                                Mobile
                                                Banking
                                            </option>
                                            <option value="virtual account"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'virtual account' ? 'selected' : '' }}>
                                                Virtual
                                                Account
                                                (VA)
                                            </option>
                                            <option value="online credit card"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'online credit card' ? 'selected' : '' }}>
                                                Online
                                                Credit
                                                Card
                                            </option>
                                            <option value="rekening bersama"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'rekening bersama' ? 'selected' : '' }}>
                                                Rekening
                                                Bersama
                                                (Rekber)</option>
                                            <option value="payPal"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'payPal' ? 'selected' : '' }}>
                                                PayPal</option>
                                            <option value="e-money"
                                                {{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar == 'e-money' ? 'selected' : '' }}>
                                                e-Money</option>
                                        </select>
                                        @error('metode_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="sopirs_id">Penyewaan Sopir</label>
                                        @if ($pemesanan->sopir)
                                            <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                                value="{{ $pemesanan->sopir->nama }}" readonly>
                                        @else
                                            <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                                value="Tidak Memilih Sopir" readonly>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 row-button">
                                    <div class="input-wrapper">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" id="keterangan" class="input" autocomplete="off"
                                            name="keterangan"
                                            value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->keterangan }}">
                                        @error('keterangan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <button type="submit" class="button-primary">Simpan Pembayaran</button>
                                        <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                            Pemesanan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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

        const totalTarifSewa = document.querySelector('#total_tarif_sewa');
        const totalBayar = document.querySelector('#total_bayar');

        totalBayar.addEventListener('change', function() {

            let totalTarifSewaValue = parseInt(totalTarifSewa.value)
            let totalBayarValue = parseInt(totalBayar.value)
            let totalKembalianValue;

            if (totalTarifSewaValue < totalBayarValue) {
                totalKembalianValue = totalBayarValue - totalTarifSewaValue;
            } else {
                totalKembalianValue = 0;
            }

            document.getElementById('total_kembalian').value = totalKembalianValue;
        });

        const tagCreateDocument = document.querySelector('.tag-create-document');
        const inputCreateDocument = document.querySelector('.input-create-document');
        const buttonCreateDocument = document.querySelector('.button-create-document');

        const tagCreateVehicle = document.querySelector('.tag-create-vehicle');
        const inputCreateVehicle = document.querySelector('.input-create-vehicle');
        const buttonCreateVehicle = document.querySelector('.button-create-vehicle');

        const tagCreateCustomer = document.querySelector('.tag-create-customer');
        const inputCreateCustomer = document.querySelector('.input-create-customer');
        const buttonCreateCustomer = document.querySelector('.button-create-customer');

        const tagCreateTransaction = document.querySelector('.tag-create-transaction');
        const inputCreateTransaction = document.querySelector('.input-create-transaction');
        const buttonCreateTransaction = document.querySelector('.button-create-transaction');

        buttonCreateDocument.addEventListener('click', function() {
            inputCreateDocument.click();
        });

        inputCreateDocument.addEventListener('change', function() {
            tagCreateDocument.src = URL.createObjectURL(inputCreateDocument.files[0]);
        });

        buttonCreateVehicle.addEventListener('click', function() {
            inputCreateVehicle.click();
        });

        inputCreateVehicle.addEventListener('change', function() {
            tagCreateVehicle.src = URL.createObjectURL(inputCreateVehicle.files[0]);
        });

        buttonCreateCustomer.addEventListener('click', function() {
            inputCreateCustomer.click();
        });

        inputCreateCustomer.addEventListener('change', function() {
            tagCreateCustomer.src = URL.createObjectURL(inputCreateCustomer.files[0]);
        });

        buttonCreateTransaction.addEventListener('click', function() {
            inputCreateTransaction.click();
        });

        inputCreateTransaction.addEventListener('change', function() {
            tagCreateTransaction.src = URL.createObjectURL(inputCreateTransaction.files[0]);
        });
    </script>
@endsection
