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
                <h5 class="subtitle">Tambah Sewa Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" action="{{ route('penambahan.store', $pemesanan->id) }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ $pemesanan->kendaraan ? asset('assets/img/kendaraan-images/' . $pemesanan->kendaraan->foto_kendaraan) : asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        @if ($pemesanan->kendaraan)
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off" disabled
                                                value="{{ $pemesanan->kendaraan->nomor_plat }}">
                                        @else
                                            <input type="text" id="nomor_plat" class="input" autocomplete="off" disabled
                                                value="Belum memilih kendaraan">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarifSewa">Tarif Sewa</label>
                                        @if ($pemesanan->kendaraan)
                                            <input type="text" id="tarifSewa" class="input" autocomplete="off" disabled
                                                value="{{ $pemesanan->kendaraan->tarif_sewa_hari }}">
                                        @else
                                            <input type="text" id="tarifSewa" class="input" autocomplete="off" disabled
                                                value="Belum memilih kendaraan">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jumlah_hari">Jumlah Hari</label>
                                        <select name="jumlah_hari" id="jumlah_hari" class="input" required>
                                            <option value="">Pilih jumlah hari</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    @error('jumlah_hari')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="total_biaya">Total Biaya</label>
                                        <input type="text" id="total_biaya" class="input" autocomplete="off"
                                            name="total_biaya" value="{{ old('total_biaya') }}" required>
                                        @error('total_biaya')
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
                                        <button type="submit" class="button-primary">Tambah Sewa</button>
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
        const jumlahHari = document.querySelector('#jumlah_hari');
        const tarifSewa = document.querySelector('#tarifSewa');
        const totalBiaya = document.querySelector('#total_biaya');

        jumlahHari.addEventListener('change', function() {
            const jumlahHariValue = parseInt(jumlahHari.value);

            let tarifSewaValue = $('#tarifSewa').val().replace('Rp. ', '');
            tarifSewaValue = parseInt(tarifSewaValue.replace(/\./g, ''));

            let totalTarifWaktu = parseInt(jumlahHariValue * tarifSewaValue);
            console.log(totalTarifWaktu);

            totalBiaya.value = formatRupiah(totalTarifWaktu, 'Rp. ');

            function formatRupiah(angka, prefix) {
                let number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
            }
        });

        tarifSewa.value = formatRupiah(tarifSewa.value, 'Rp. ');

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
