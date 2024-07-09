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
                                            name="foto_pembayaran" value="{{ old('foto_pembayaran') }}" style="opacity: 0;"
                                            required>
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
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar Sebelumnya</label>
                                        <input type="text" id="total_bayar" class="input" autocomplete="off"
                                            value="{{ $pembayaran->total_bayar ?: '0' }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                        <input type="text" id="total_tarif_sewa" class="input" autocomplete="off"
                                            value="{{ $pembayaran->total_tarif_sewa }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar_sisa">Total Bayar Sisa</label>
                                        <input type="text" id="total_bayar_sisa" class="input" autocomplete="off"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="input-wrapper">
                                        <p class="label">Sarung Jok</p>
                                        <div class="wrapper d-flex gap-4 align-items-center">
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="ada_jok" name="sarung_jok" value="ada"
                                                    {{ old('sarung_jok') == 'ada' ? 'checked' : '' }} />
                                                <label for="ada_jok">Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="tidak_ada_jok" name="sarung_jok" value="tidak ada"
                                                    {{ old('sarung_jok') == 'tidak_ada' ? 'checked' : '' }} />
                                                <label for="tidak_ada_jok">Tidak Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="kosong_jok" name="sarung_jok" value="kosong"
                                                    {{ old('sarung_jok') == 'kosong' ? 'checked' : '' }} />
                                                <label for="kosong_jok">Kosong</label>
                                            </div>
                                        </div>
                                        @error('sarung_jok')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="input-wrapper">
                                        <p class="label">Karpet</p>
                                        <div class="wrapper d-flex gap-4 align-items-center">
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="ada_karpet" name="karpet" value="ada"
                                                    {{ old('karpet') == 'ada' ? 'checked' : '' }} />
                                                <label for="ada_karpet">Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="tidak_ada_karpet" name="karpet" value="tidak ada"
                                                    {{ old('karpet') == 'tidak_ada' ? 'checked' : '' }} />
                                                <label for="tidak_ada_karpet">Tidak Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="kosong_karpet" name="karpet" value="kosong"
                                                    {{ old('karpet') == 'kosong' ? 'checked' : '' }} />
                                                <label for="kosong_karpet">Kosong</label>
                                            </div>
                                        </div>
                                        @error('karpet')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="input-wrapper">
                                        <p class="label">Kondisi Kendaraan</p>
                                        <div class="wrapper d-flex gap-4 align-items-center">
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="baik" name="kondisi_kendaraan"
                                                    value="baik"
                                                    {{ old('kondisi_kendaraan') == 'baik' ? 'checked' : '' }} />
                                                <label for="baik">Baik</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="rusak_ringan" name="kondisi_kendaraan"
                                                    value="rusak ringan"
                                                    {{ old('kondisi_kendaraan') == 'rusak_ringan' ? 'checked' : '' }} />
                                                <label for="rusak_ringan">Rusak Ringan</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="rusak_berat" name="kondisi_kendaraan"
                                                    value="rusak berat"
                                                    {{ old('kondisi_kendaraan') == 'rusak_berat' ? 'checked' : '' }} />
                                                <label for="rusak_berat">Rusak Berat</label>
                                            </div>
                                        </div>
                                        @error('kondisi_kendaraan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="input-wrapper">
                                        <p class="label">Ban Serep</p>
                                        <div class="wrapper d-flex gap-4 align-items-center">
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="ada_ban" name="ban_serep" value="ada"
                                                    {{ old('ban_serep') == 'ada' ? 'checked' : '' }} />
                                                <label for="ada_ban">Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="tidak_ada_ban" name="ban_serep"
                                                    value="tidak ada"
                                                    {{ old('ban_serep') == 'tidak_ada' ? 'checked' : '' }} />
                                                <label for="tidak_ada_ban">Tidak Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="kosong_ban" name="ban_serep" value="kosong"
                                                    {{ old('ban_serep') == 'kosong' ? 'checked' : '' }} />
                                                <label for="kosong_ban">Kosong</label>
                                            </div>
                                        </div>
                                        @error('ban_serep')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_kembali">Kilometer Kembali (Km)</label>
                                        <input type="number" id="kilometer_kembali" name="kilometer_kembali"
                                            class="input" autocomplete="off" value="{{ old('kilometer_kembali') }}"
                                            required>
                                        @error('kilometer_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_kembali">Bensin Kembali (Strip Bar)</label>
                                        <input type="number" id="bensin_kembali" name="bensin_kembali" class="input"
                                            autocomplete="off" value="{{ old('bensin_kembali') }}" required>
                                        @error('bensin_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="waktu_pengembalian">Waktu Pengembalian</label>
                                        <input type="time" id="waktu_pengembalian" class="input" autocomplete="off"
                                            name="waktu_pengembalian" value="{{ old('waktu_pengembalian') }}" required>
                                        @error('waktu_pengembalian')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="ketepatan_waktu">Ketepatan Waktu</label>
                                        <select id="ketepatan_waktu" name="ketepatan_waktu" class="input" required>
                                            <option value="">Pilih ketepatan pengembalian</option>
                                            <option value="tepat"
                                                {{ old('ketepatan_waktu') == 'tepat' ? 'selected' : '' }}>Tepat</option>
                                            <option value="tidak tepat"
                                                {{ old('ketepatan_waktu') == 'tidak tepat' ? 'selected' : '' }}>Tidak Tepat
                                            </option>
                                        </select>
                                        @error('ketepatan_waktu')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="terlambat">Terlambat</label>
                                        <select name="terlambat" id="terlambat" class="input">
                                            <option value="">Pilih keterlambatan jam</option>
                                            <option value="1" {{ old('1') == '1' ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2" {{ old('2') == '2' ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3" {{ old('3') == '3' ? 'selected' : '' }}>
                                                3</option>
                                        </select>
                                        @error('terlambat')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="biaya_tambahan">Biaya Tambahan</label>
                                        <input type="text" id="biaya_tambahan" name="biaya_tambahan" class="input"
                                            autocomplete="off" value="0">
                                        @error('biaya_tambahan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_kembali">Pengembalian Tanggal</label>
                                        <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="input"
                                            autocomplete="off" value="{{ old('tanggal_kembali') }}" required>
                                        @error('tanggal_kembali')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar_saat_ini">Total Bayar</label>
                                        <input type="text" id="total_bayar_saat_ini" class="input"
                                            autocomplete="off" name="total_bayar" value="0" required>
                                        @error('total_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_kembalian">Total Kembalian</label>
                                        <input type="hidden" id="total_kembalian_dulu"
                                            value="{{ $pembayaran->total_kembalian }}">
                                        <input type="text" id="total_kembalian" class="input" autocomplete="off"
                                            name="total_kembalian" value="0" readonly required>
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
                                            <option value="">Pilih jenis pembayaran</option>
                                            <option value="lunas"
                                                {{ old('jenis_pembayaran') == 'lunas' ? 'selected' : '' }}>Lunas
                                            </option>
                                            <option value="dp"
                                                {{ old('jenis_pembayaran') == 'dp' ? 'selected' : '' }}>
                                                DP
                                            </option>
                                            <option value="belum bayar"
                                                {{ old('jenis_pembayaran') == 'belum bayar' ? 'selected' : '' }}>Belum
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
                                            <option value="-">Pilih metode pembayaran</option>
                                            <option value="cash" {{ old('metode_bayar') == 'cash' ? 'selected' : '' }}>
                                                Cash
                                            </option>
                                            <option value="transfer bank"
                                                {{ old('metode_bayar') == 'transfer bank' ? 'selected' : '' }}>Transfer
                                                Bank
                                            </option>
                                            <option value="internet banking"
                                                {{ old('metode_bayar') == 'internet banking' ? 'selected' : '' }}>Internet
                                                Banking
                                                (E-Banking)</option>
                                            <option value="mobile banking"
                                                {{ old('metode_bayar') == 'mobile banking' ? 'selected' : '' }}>Mobile
                                                Banking
                                            </option>
                                            <option value="virtual account"
                                                {{ old('metode_bayar') == 'virtual account' ? 'selected' : '' }}>Virtual
                                                Account
                                                (VA)
                                            </option>
                                            <option value="online credit card"
                                                {{ old('metode_bayar') == 'online credit card' ? 'selected' : '' }}>Online
                                                Credit
                                                Card
                                            </option>
                                            <option value="rekening bersama"
                                                {{ old('metode_bayar') == 'rekening bersama' ? 'selected' : '' }}>Rekening
                                                Bersama
                                                (Rekber)</option>
                                            <option value="payPal"
                                                {{ old('metode_bayar') == 'payPal' ? 'selected' : '' }}>
                                                PayPal</option>
                                            <option value="e-money"
                                                {{ old('metode_bayar') == 'e-money' ? 'selected' : '' }}>
                                                e-Money</option>
                                        </select>
                                        @error('metode_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 row-button">
                                    <div class="input-wrapper">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan" class="input"
                                            autocomplete="off" value="{{ old('keterangan') }}">
                                        @error('keterangan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <button type="submit" class="button-primary">Simpan Pengembalian</button>
                                        <a href="{{ route('pengembalian') }}" class="button-reverse">Kembali</a>
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

        const totalBayarSisa = document.querySelector('#total_bayar_sisa');
        const totalTarifSewa = document.querySelector('#total_tarif_sewa');
        const totalBayar = document.querySelector('#total_bayar');
        const totalBayarSaatIni = document.querySelector('#total_bayar_saat_ini');
        const totalKembalian = document.querySelector('#total_kembalian');
        const totalKembalianDulu = document.querySelector('#total_kembalian_dulu');
        const biayaTambahan = document.querySelector('#biaya_tambahan');

        if (parseInt(totalBayar.value) < parseInt(totalTarifSewa.value)) {
            let totalBayarValue = parseInt(totalBayar.value)
            let totalTarifSewaValue = parseInt(totalTarifSewa.value)
            totalBayarSisaValue = totalTarifSewaValue - totalBayarValue
            totalBayarSisa.value = totalBayarSisaValue
        } else {
            totalBayarSisa.value = 0
        }

        totalBayarSaatIni.addEventListener('keyup', function() {
            const biayaTambahan = document.querySelector('#biaya_tambahan');
            let totalTarifSewaValue = $('#total_tarif_sewa').val().replace('Rp. ', '');
            totalTarifSewaValue = parseInt(totalTarifSewaValue.replace(/\./g, ''));
            let totalBayarValue = $('#total_bayar').val().replace('Rp. ', '');
            totalBayarValue = parseInt(totalBayarValue.replace(/\./g, ''));

            let totalBayarSaatIniValue = $('#total_bayar_saat_ini').val().replace('Rp. ', '');
            totalBayarSaatIniValue = parseInt(totalBayarSaatIniValue.replace(/\./g, ''));
            let biayaTambahanValue = $('#biaya_tambahan').val().replace('Rp. ', '');
            biayaTambahanValue = parseInt(biayaTambahanValue.replace(/\./g, ''));

            let totalKembalianValue;
            let totalBayarSisaValue = totalTarifSewaValue - totalBayarValue

            let totalKeseluruhan = totalBayarSisaValue + biayaTambahanValue

            if (totalKeseluruhan < totalBayarSaatIniValue) {
                totalKembalianValue = totalBayarSaatIniValue - totalKeseluruhan;
            } else {
                totalKembalianValue = 0;
            }

            totalKembalian.value = formatRupiah(totalKembalianValue, 'Rp. ');

            function formatRupiah(angka, prefix) {
                angka = angka.toString();
                let number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
            }
        });

        biayaTambahan.addEventListener('change', function() {
            totalBayarSaatIni.value = 0;
            totalKembalian.value = 0;
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

        totalBayar.value = formatRupiah(totalBayar.value, 'Rp. ');
        totalTarifSewa.value = formatRupiah(totalTarifSewa.value, 'Rp. ');
        totalBayarSisa.value = formatRupiah(totalBayarSisa.value, 'Rp. ');
        biayaTambahan.addEventListener('keyup', function(e) {
            biayaTambahan.value = formatRupiah(this.value, 'Rp. ');
        });
        totalBayarSaatIni.addEventListener('keyup', function(e) {
            totalBayarSaatIni.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
