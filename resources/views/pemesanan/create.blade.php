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
                <h5 class="subtitle">Booking Kendaraan</h5>
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
                                <input type="number" id="waktu_sewa_hari" class="input" autocomplete="off" value="0">
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
                                <label for="tanggal_mulai">Tanggal Diambil</label>
                                <input type="date" id="tanggal_mulai" class="input" autocomplete="off"
                                    name="tanggal_mulai">
                                @error('tanggal_mulai')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_akhir">Tanggal Kembali</label>
                                <input type="date" id="tanggal_akhir" class="input" autocomplete="off"
                                    name="tanggal_akhir">
                                @error('tanggal_akhir')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="pelanggans_id">Pelanggan</label>
                                <select id="pelanggans_id" class="input" name="pelanggans_id">
                                    <option value="-">Pilih nama pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pelanggans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="sopirs_id">Sopir</label>
                                <select id="sopirs_id" class="input" name="sopirs_id">
                                    <option value="-">Pilih nama sopir</option>
                                    @foreach ($sopirs as $sopir)
                                        <option value="{{ $sopir->id }}">{{ $sopir->nama }}</option>
                                    @endforeach
                                </select>
                                @error('sopirs_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <select id="jenis_kendaraan" class="input">
                                    @foreach ($jenises as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand_kendaraan">Brand Kendaraan</label>
                                <select id="brand_kendaraan" class="input">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label for="kendaraans_id">Kendaraan</label>
                                <select id="kendaraans_id" class="input" name="kendaraans_id">
                                    <option value="-">Pilih kendaraan!</option>
                                    @foreach ($kendaraans as $kendaraan)
                                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->nomor_plat }}</option>
                                    @endforeach
                                </select>
                                @error('kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 row-button">
                            <div class="input-wrapper">
                                <label for="seri">Seri Kendaraan</label>
                                <input type="text" id="seri" class="input" autocomplete="off" disabled
                                    placeholder="Pilih kendaraan terlebih dahulu!" data-value="seri_kendaraan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Booking Kendaraan</button>
                                <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                    Booking</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        $("#jenis_kendaraan").change(function() {
            let idJenis = $(this).val();
            let idBrand = $("#brand_kendaraan").val();
            $('#kendaraans_id option').remove();
            $.ajax({
                type: 'get',
                url: '/booking/kendaraan/' + idJenis + '/' + idBrand,
                success: function(data) {
                    if (data.length == 0) {
                        $('#kendaraans_id').append(
                            `<option value="-">Data kendaraan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#kendaraans_id').append(
                            `<option value="-">Pilih kendaraan!</option>`
                        );
                        data.forEach(kendaraan => {
                            $('#kendaraans_id').append(
                                `<option value="${kendaraan.id}">${kendaraan.nomor_plat}</option>`
                            );
                        });
                    }
                }
            });
        });

        $("#brand_kendaraan").change(function() {
            let idBrand = $(this).val();
            let idJenis = $("#jenis_kendaraan").val();
            $('#kendaraans_id option').remove();
            $.ajax({
                type: 'get',
                url: '/booking/kendaraan/' + idJenis + '/' + idBrand,
                success: function(data) {
                    if (data.length == 0) {
                        $('#kendaraans_id').append(
                            `<option value="-">Data kendaraan tidak ditemukan!</option>`
                        );
                    } else {
                        $('#kendaraans_id').append(
                            `<option value="-">Pilih kendaraan!</option>`
                        );
                        data.forEach(kendaraan => {
                            $('#kendaraans_id').append(
                                `<option value="${kendaraan.id}">${kendaraan.nomor_plat}</option>`
                            );
                        });
                    }
                }
            });
        });

        $("#kendaraans_id").change(function() {
            let id = $(this).val();
            $.ajax({
                type: 'get',
                url: '/booking/kendaraan/' + id,
                success: function(data) {
                    $('[data-value="seri_kendaraan"]').val(data.seri_kendaraan.nomor_seri);
                }
            });
        });

        const inputTanggalDiambil = document.querySelector('#tanggal_mulai');
        const inputTanggalKembali = document.querySelector('#tanggal_akhir');

        let waktuSewaHarian = document.querySelector('#waktu_sewa_hari');
        let waktuSewaMingguan = document.querySelector('#waktu_sewa_minggu');
        let waktuSewaBulanan = document.querySelector('#waktu_sewa_bulan');

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
        });

        waktuSewaHarian.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaHarian.value == '') {
                waktuSewaHarian.value = '0';
            }

            let tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaMingguan.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahHari = parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        waktuSewaMingguan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaMingguan.value == '') {
                waktuSewaMingguan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaHarian.value) + parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');

            } else if (waktuSewaBulanan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days');
            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });

        waktuSewaBulanan.addEventListener('change', function() {
            let tanggalDiambilValue = document.querySelector('#tanggal_mulai').value;
            let jumlahHari;
            let jumlahBulan;
            let tanggalAkhir;

            if (waktuSewaBulanan.value == '') {
                waktuSewaBulanan.value = '0';
            }

            tanggalMulai = moment(tanggalDiambilValue);
            if (waktuSewaHarian.value && waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7 + parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaMingguan.value) {
                jumlahHari = parseInt(waktuSewaMingguan.value) * 7;
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else if (waktuSewaHarian.value) {
                jumlahHari = parseInt(waktuSewaHarian.value);
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahHari, 'days').add(jumlahBulan, 'months');

            } else {
                jumlahBulan = parseInt(waktuSewaBulanan.value);
                tanggalAkhir = tanggalMulai.add(jumlahBulan, 'months');

            }

            let tahun = tanggalAkhir.format('YYYY');
            let bulan = tanggalAkhir.format('MM');
            let tanggal = tanggalAkhir.format('DD');

            inputTanggalKembali.value = `${tahun}-${bulan}-${tanggal}`;

            let tanggalMulaiSewa = moment(tanggalDiambilValue);
            let tanggalKembaliSewa = moment(inputTanggalKembali.value);
            let totalWaktuSewa = tanggalKembaliSewa.diff(tanggalMulaiSewa, 'days');
        });
    </script>
@endsection
