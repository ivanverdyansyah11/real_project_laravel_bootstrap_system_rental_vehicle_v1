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
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
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
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
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
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
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
                                        <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                            value="{{ $pemesanan->pelanggan->nama }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                            value="{{ $pemesanan->kendaraan->nomor_plat }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_keluar">Kilometer Keluar</label>
                                        <input type="number" id="kilometer_keluar" class="input" autocomplete="off"
                                            name="kilometer_keluar" value="{{ old('kilometer_keluar') }}">
                                        @error('kilometer_keluar')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="bensin_keluar">Bensin Keluar</label>
                                        <input type="number" id="bensin_keluar" class="input" autocomplete="off"
                                            name="bensin_keluar" value="{{ old('bensin_keluar') }}">
                                        @error('bensin_keluar')
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
                                <div class="col-md-6">
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
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        <div class="input-wrapper">
                            <div class="input-line position-relative mb-2">
                                <div class="line"></div>
                                <p>Menentukan Pelepasan Kendaraan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif_sewa_hari">Tarif Sewa Kendaran Harian</label>
                                <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                    pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_hari }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif_sewa_minggu">Tarif Sewa Kendaran Mingguan</label>
                                <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                    pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_minggu }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif_sewa_bulan">Tarif Sewa Kendaran Bulanan</label>
                                <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                    pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan"
                                    value="{{ $pemesanan->kendaraan->tarif_sewa_bulan }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_hari">Total Harian</label>
                                <input type="number" id="waktu_sewa_hari" class="input" autocomplete="off"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_minggu">Total Mingguan</label>
                                <input type="number" id="waktu_sewa_minggu" class="input" autocomplete="off"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa_bulan">Total Bulanan</label>
                                <input type="number" id="waktu_sewa_bulan" class="input" autocomplete="off"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_diambil">Tanggal Diambil</label>
                                <input type="date" id="tanggal_diambil" class="input" autocomplete="off"
                                    name="tanggal_diambil">
                                @error('tanggal_diambil')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="date" id="tanggal_kembali" class="input" autocomplete="off"
                                    name="tanggal_kembali" disabled>
                                @error('tanggal_kembali')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
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
                                            name="waktu_sewa" pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                        @error('waktu_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                        <input type="number" id="total_tarif_sewa" class="input" autocomplete="off"
                                            name="total_tarif_sewa">
                                        @error('total_tarif_sewa')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
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
                                        <label for="total_bayar">Total Bayar</label>
                                        <input type="number" id="total_bayar" class="input" autocomplete="off"
                                            name="total_bayar" value="{{ old('total_bayar') }}" disabled>
                                        @error('total_bayar')
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
                                        <label for="sopirs_id">Penyewaan Sopir</label>
                                        <select id="sopirs_id" class="input" name="sopirs_id"
                                            value="{{ old('sopirs_id') }}">
                                            <option value="-">Pilih penyewaan sopir</option>
                                            @foreach ($sopirs as $sopir)
                                                <option value="{{ $sopir->id }}">{{ $sopir->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('sopirs_id')
                                            <p class="caption-error mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 row-button">
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
        const inputTanggalDiambil = document.querySelector('#tanggal_diambil');
        const inputTanggalKembali = document.querySelector('#tanggal_kembali');
        const jenisPembayaran = document.querySelector('#jenis_pembayaran');
        const totalBayar = document.querySelector('#total_bayar');

        let waktuSewaHarian = document.querySelector('#waktu_sewa_hari');
        let waktuSewaMingguan = document.querySelector('#waktu_sewa_minggu');
        let waktuSewaBulanan = document.querySelector('#waktu_sewa_bulan');
        let tarifSewaHarian = parseInt(document.querySelector('#tarif_sewa_hari').value);
        let tarifSewaMingguan = parseInt(document.querySelector('#tarif_sewa_minggu').value);
        let tarifSewaBulanan = parseInt(document.querySelector('#tarif_sewa_bulan').value);
        let tarifSewa = document.querySelector('#total_tarif_sewa');
        const waktuSewa = document.querySelector('#waktu_sewa');

        jenisPembayaran.addEventListener('change', function() {
            if (jenisPembayaran.value == "-" || jenisPembayaran.value == "belum bayar") {
                totalBayar.setAttribute("disabled", "disabled");
            } else {
                totalBayar.removeAttribute("disabled");
            }
        });

        inputTanggalDiambil.addEventListener('change', function() {
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;
            let totalTarifSewa;

            let tanggalMulai = moment(inputTanggalDiambil.value);
            jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
            jumlahBulan = parseInt(waktuSewaBulanan.value);
            tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;
            let tanggalMulaiSewa = moment(inputTanggalDiambil.value);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');

            waktuSewa.value = totalWaktuSewa;
        });

        waktuSewaHarian.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_diambil').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;
            let totalTarifSewa;

            if (waktuSewaHarian.value == '') {
                waktuSewaHarian.value = '0';
            }

            let tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaMingguan.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                totalTarifSewa = totalTarifSewaMinggu + totalTarifSewaHari + totalTarifSewaBulan;

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                totalTarifSewa = totalTarifSewaMinggu + totalTarifSewaHari;

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                totalTarifSewa = totalTarifSewaBulan + totalTarifSewaHari;

            } else {
                jumlahHari = parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
                totalTarifSewa = tarifSewaHarian * parseInt(waktuSewaHarian.value);
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;
            tarifSewa.value = totalTarifSewa;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');

            waktuSewa.value = totalWaktuSewa;
        });

        waktuSewaMingguan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_diambil').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;
            let totalTarifSewa;

            if (waktuSewaMingguan.value == '') {
                waktuSewaMingguan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                totalTarifSewa = totalTarifSewaMinggu + totalTarifSewaHari + totalTarifSewaBulan;

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                totalTarifSewa = totalTarifSewaHari + totalTarifSewaMinggu;

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                totalTarifSewa = totalTarifSewaBulan + totalTarifSewaMinggu;

            } else {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
                totalTarifSewa = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;
            tarifSewa.value = totalTarifSewa;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');

            waktuSewa.value = totalWaktuSewa;
        });

        waktuSewaBulanan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_diambil').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;
            let totalTarifSewa;

            if (waktuSewaBulanan.value == '') {
                waktuSewaBulanan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                totalTarifSewa = totalTarifSewaMinggu + totalTarifSewaHari + totalTarifSewaBulan;

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                let totalTarifSewaMinggu = tarifSewaMingguan * parseInt(waktuSewaMingguan.value);
                totalTarifSewa = totalTarifSewaBulan + totalTarifSewaMinggu;

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

                let totalTarifSewaBulan = tarifSewaBulanan * jumlahBulan;
                let totalTarifSewaHari = tarifSewaHarian * parseInt(waktuSewaHarian.value);
                totalTarifSewa = totalTarifSewaBulan + totalTarifSewaHari;

            } else {
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahBulan, 'months');

                totalTarifSewa = tarifSewaBulanan * jumlahBulan;
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;
            tarifSewa.value = totalTarifSewa;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');

            waktuSewa.value = totalWaktuSewa;
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

        buttonCreateTransaction.addEventListener('click', function() {
            inputCreateTransaction.click();
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

        inputCreateTransaction.addEventListener('change', function() {
            tagCreateTransaction.src = URL.createObjectURL(inputCreateTransaction.files[0]);
        });
    </script>
@endsection
