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
                <form class="form d-inline-block w-100" action="{{ route('penambahan.store', $pemesanan->kendaraan->id) }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $pemesanan->kendaraan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kendaraan">Kendaraan</label>
                                    <input type="text" id="kendaraan" class="input" autocomplete="off" disabled
                                        value="{{ $pemesanan->kendaraan->nama_kendaraan }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tarifSewa">Tarif Sewa</label>
                                    <input type="text" id="tarifSewa" class="input" autocomplete="off" disabled
                                        value="{{ $pemesanan->kendaraan->tarif_sewa }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jumlah_hari">Jumlah Hari</label>
                                    <input type="text" id="jumlah_hari" class="input" autocomplete="off"
                                        pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan" name="jumlah_hari">
                                </div>
                                @error('keterangan')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_biaya">Total Biaya</label>
                                    <input type="text" id="total_biaya" class="input" autocomplete="off"
                                        pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan" name="total_biaya">
                                    @error('keterangan')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input" autocomplete="off"
                                        name="keterangan">
                                    @error('keterangan')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="submit" class="button-primary">Tambah Sewa</button>
                                    <a href="{{ route('pengembalian') }}" class="button-reverse">Batal
                                        Tambah</a>
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
            const tarifSewaValue = parseInt(tarifSewa.value);

            const totalTarifWaktu = jumlahHariValue * tarifSewaValue;

            totalBiaya.value = totalTarifWaktu;
        });
    </script>
@endsection
