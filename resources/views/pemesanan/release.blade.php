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
                <h5 class="subtitle">Pemesanan Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('pemesanan.release.action', $pemesanan->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                                            name="kilometer_keluar" value="{{ old('kilometer_keluar') }}" required>
                                        @error('kilometer_keluar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_keluar">Bensin Keluar (Strip Bar)</label>
                                        <input type="number" id="bensin_keluar" class="input" autocomplete="off"
                                            name="bensin_keluar" value="{{ old('bensin_keluar') }}" required>
                                        @error('bensin_keluar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
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
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <p class="label">Karpet</p>
                                        <div class="wrapper d-flex gap-4 align-items-center">
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="ada_karpet" name="karpet" value="ada"
                                                    {{ old('karpet') == 'ada' ? 'checked' : '' }} />
                                                <label for="ada_karpet">Ada</label>
                                            </div>
                                            <div class="wrapper-checkbox d-flex gap-1 align-items-center">
                                                <input type="radio" id="tidak_ada_karpet" name="karpet"
                                                    value="tidak ada"
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
                                <div class="col-md-6 mb-4">
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
                                <div class="col-md-6 mb-4">
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
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-transaction"
                                            name="foto_pembayaran" value="{{ old('foto_pembayaran') }}"
                                            style="opacity: 0;" required>
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
                                        <label for="waktu_sewa">Waktu Sewa (Hari)</label>
                                        <input min="0" type="number" id="waktu_sewa" class="input"
                                            autocomplete="off" name="waktu_sewa" value="{{ $waktu_sewa }}" required
                                            readonly>
                                        @error('waktu_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                        <input type="text" id="total_tarif_sewa" class="input" autocomplete="off"
                                            name="total_tarif_sewa" value="{{ $total_tarif_sewa }}" required readonly>
                                        @error('total_tarif_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-wrapper">
                                        <label for="waktu_diambil">Waktu Diambil</label>
                                        <input type="time" id="waktu_diambil" class="input" autocomplete="off"
                                            name="waktu_diambil" value="{{ old('waktu_diambil') }}" required>
                                        @error('waktu_diambil')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="text" id="total_bayar" class="input" autocomplete="off"
                                            name="total_bayar" value="{{ old('total_bayar') }}">
                                        @error('total_bayar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_kembalian">Total Kembalian</label>
                                        <input type="text" id="total_kembalian" class="input" autocomplete="off"
                                            name="total_kembalian" value="{{ old('total_kembalian') }}" readonly>
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
                                                {{ old('jenis_pembayaran') == 'dp' ? 'selected' : '' }}>DP
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
                                            name="keterangan" value="{{ old('keterangan') }}">
                                        @error('keterangan')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex">
                                        <button type="submit" class="button-primary">Pemesanan Kendaraan</button>
                                        <a href="{{ route('pemesanan') }}" class="button-reverse">Kembali</a>
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

        let totalTarifSewa = document.querySelector('#total_tarif_sewa');
        let totalBayar = document.querySelector('#total_bayar');

        totalBayar.addEventListener('keyup', function() {
            let totalTarifSewaValue = $('#total_tarif_sewa').val().replace('Rp. ', '');
            totalTarifSewaValue = parseInt(totalTarifSewaValue.replace(/\./g, ''));
            let totalBayarValue = $('#total_bayar').val().replace('Rp. ', '');
            totalBayarValue = parseInt(totalBayarValue.replace(/\./g, ''));

            let totalKembalian;

            if (totalTarifSewaValue < totalBayarValue) {
                totalKembalian = totalBayarValue - totalTarifSewaValue;
            } else {
                totalKembalian = 0;
            }

            document.getElementById('total_kembalian').value = formatRupiah(totalKembalian, 'Rp. ');

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

        const tagCreateTransaction = document.querySelector('.tag-create-transaction');
        const inputCreateTransaction = document.querySelector('.input-create-transaction');
        const buttonCreateTransaction = document.querySelector('.button-create-transaction');

        buttonCreateTransaction.addEventListener('click', function() {
            inputCreateTransaction.click();
        });

        inputCreateTransaction.addEventListener('change', function() {
            tagCreateTransaction.src = URL.createObjectURL(inputCreateTransaction.files[0]);
        });

        totalTarifSewa.value = formatRupiah(totalTarifSewa.value, 'Rp. ');

        totalBayar.value = formatRupiah(totalBayar.value, 'Rp. ');
        totalBayar.addEventListener('keyup', function(e) {
            totalBayar.value = formatRupiah(this.value, 'Rp. ');
        });

        let totalKembalian = document.getElementById('total_kembalian')
        totalKembalian.value = formatRupiah(totalKembalian.value, 'Rp. ');
        totalKembalian.addEventListener('keyup', function(e) {
            totalKembalian.value = formatRupiah(this.value, 'Rp. ');
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
