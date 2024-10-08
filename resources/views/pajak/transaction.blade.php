@extends('template.main')

@section('content')
    @php
        use Carbon\Carbon;
        $terakhir_samsat = Carbon::parse($kendaraan->terakhir_samsat);
        $terakhir_angsuran = Carbon::parse($kendaraan->terakhir_angsuran);
        $terakhir_ganti_nomor_polisi = Carbon::parse($kendaraan->terakhir_ganti_nomor_polisi);
    @endphp
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
                @elseif($terakhir_samsat->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak samsat sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_angsuran->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak angsuran sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_ganti_nomor_polisi->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak ganti nomor polisi sudah lewat untuk kendaraan ini
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Bayar Pajak</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST"
                    action="{{ route('pajak.transaction.action', $kendaraan->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="stnk_nama">STNK Atas Nama</label>
                                <input type="text" id="stnk_nama" class="input" autocomplete="off"
                                    value="{{ $kendaraan->stnk_nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_seri">Tipe Kendaraan</label>
                                <input type="text" id="nomor_seri" class="input" autocomplete="off"
                                    value="{{ $kendaraan->seri_kendaraan->nomor_seri }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <input type="text" id="jenis" class="input" autocomplete="off"
                                    value="{{ $kendaraan->jenis_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Samsat</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $kendaraan->terakhir_samsat }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Angsuran</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $kendaraan->terakhir_angsuran }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Jatuh Tempo Pajak Ganti Nomor Polisi</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $kendaraan->terakhir_ganti_nomor_polisi }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_pajak">Jenis Pajak</label>
                                <select id="jenis_pajak" class="input" name="jenis_pajak" required>
                                    <option value="">Pilih jenis pajak kendaraan</option>
                                    <option value="samsat" {{ old('jenis_pajak') == 'samsat' ? 'selected' : '' }}>Samsat
                                    </option>
                                    <option value="angsuran" {{ old('jenis_pajak') == 'angsuran' ? 'selected' : '' }}>
                                        Angsuran</option>
                                    <option value="ganti nomor polisi"
                                        {{ old('jenis_pajak') == 'ganti nomor polisi' ? 'selected' : '' }}>Ganti Nomor
                                        Polisi</option>
                                </select>
                                @error('jenis_pajak')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="metode_bayar">Metode Pembayaran</label>
                                <select id="metode_bayar" class="input" name="metode_bayar" required>
                                    <option value="">Pilih metode pembayaran</option>
                                    <option value="cash" {{ old('metode_bayar') == 'cash' ? 'selected' : '' }}>Cash
                                    </option>
                                    <option value="transfer bank"
                                        {{ old('metode_bayar') == 'transfer bank' ? 'selected' : '' }}>Transfer Bank
                                    </option>
                                    <option value="internet banking"
                                        {{ old('metode_bayar') == 'internet banking' ? 'selected' : '' }}>Internet Banking
                                        (E-Banking)</option>
                                    <option value="mobile banking"
                                        {{ old('metode_bayar') == 'mobile banking' ? 'selected' : '' }}>Mobile Banking
                                    </option>
                                    <option value="virtual account"
                                        {{ old('metode_bayar') == 'virtual account' ? 'selected' : '' }}>Virtual Account
                                        (VA)
                                    </option>
                                    <option value="online credit card"
                                        {{ old('metode_bayar') == 'online credit card' ? 'selected' : '' }}>Online Credit
                                        Card
                                    </option>
                                    <option value="rekening bersama"
                                        {{ old('metode_bayar') == 'rekening bersama' ? 'selected' : '' }}>Rekening Bersama
                                        (Rekber)</option>
                                    <option value="payPal" {{ old('metode_bayar') == 'payPal' ? 'selected' : '' }}>
                                        PayPal</option>
                                    <option value="e-money" {{ old('metode_bayar') == 'e-money' ? 'selected' : '' }}>
                                        e-Money</option>
                                </select>
                                @error('metode_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="lama_pajak">Jumlah Tahun Pajak</label>
                                <select id="lama_pajak" class="input" name="lama_pajak" required>
                                    <option value="">Pilih jumlah tahun pajak</option>
                                    <option value="1" {{ old('1') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('2') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('3') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('4') == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('5') == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('6') == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('7') == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ old('8') == '8' ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ old('9') == '9' ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ old('10') == '10' ? 'selected' : '' }}>10</option>
                                </select>
                                @error('metode_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="date" id="tanggal_bayar" class="input" autocomplete="off"
                                    name="tanggal_bayar" value="{{ old('tanggal_bayar') }}" required>
                                @error('tanggal_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="input-wrapper">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="text" id="jumlah_bayar" class="input" autocomplete="off"
                                    name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required>
                                @error('jumlah_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 row-button">
                            <div class="input-wrapper">
                                <label for="finance">Staff Finance</label>
                                <input type="text" id="finance" class="input" autocomplete="off" name="finance"
                                    value="{{ old('finance') }}" required>
                                @error('finance')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Bayar Pajak</button>
                                <a href="{{ route('pajak') }}" class="button-reverse">Batal
                                    Bayar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#jenis_pajak").select2({
            theme: "bootstrap-5",
        });

        $("#metode_bayar").select2({
            theme: "bootstrap-5",
        });

        $("#lama_pajak").select2({
            theme: "bootstrap-5",
        });

        let jumlahBayar = document.getElementById('jumlah_bayar');
        jumlahBayar.value = formatRupiah(jumlahBayar.value, 'Rp. ');
        jumlahBayar.addEventListener('keyup', function(e) {
            jumlahBayar.value = formatRupiah(this.value, 'Rp. ');
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
