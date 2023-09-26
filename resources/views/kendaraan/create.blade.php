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
                <h5 class="subtitle">Tambah Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST" action="{{ route('kendaraan.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-image"
                                            name="foto_kendaraan" style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create">Pilih Foto
                                            Kendaraan</button>
                                    </div>
                                </div>
                                @error('foto_kendaraan')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="stnk_nama">STNK Atas Nama</label>
                                    <input type="text" id="stnk_nama" class="input" autocomplete="off" name="stnk_nama">
                                    @error('stnk_nama')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nama_kendaraan">Nama Kendaraan</label>
                                    <input type="text" id="nama_kendaraan" class="input" autocomplete="off"
                                        name="nama_kendaraan">
                                    @error('nama_kendaraan')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis">Jenis Kendaraan</label>
                                    <input type="text" id="jenis" class="input" autocomplete="off"
                                        value="Pilih nomor seri terlebih dahulu!" disabled data-value="jenis_kendaraan">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="brand">Brand Kendaraan</label>
                                    <input type="text" id="brand" class="input" autocomplete="off"
                                        value="Pilih nomor seri terlebih dahulu!" disabled data-value="brand_kendaraan">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="seriData">Nomor Seri</label>
                                    <select id="seriData" class="input" name="seri_kendaraans_id" data-target="#seriData">
                                        <option value="-">Pilih nomor seri kendaraan</option>
                                        @foreach ($series as $seri)
                                            <option value="{{ $seri->id }}">{{ $seri->nomor_seri }}</option>
                                        @endforeach
                                    </select>
                                    @error('seri_kendaraans_id')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometerData">Kategori Kilometer</label>
                                    <select class="input" name="kategori_kilometer_kendaraans_id" id="kilometerData">
                                        <option value="-">Pilih kategori kilometer kendaraan</option>
                                        @foreach ($kilometers as $kilometer)
                                            <option value="{{ $kilometer->id }}">{{ $kilometer->jumlah }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_kilometer_kendaraans_id')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_polisi">Nomor Polisi</label>
                                    <input type="text" id="nomor_polisi" class="input" autocomplete="off"
                                        name="nomor_polisi" pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                    @error('nomor_polisi')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer">Kilometer</label>
                                    <input type="text" id="kilometer" class="input" autocomplete="off"
                                        name="kilometer" pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                    @error('kilometer')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tarif_sewa">Tarif Sewa</label>
                                    <input type="text" id="tarif_sewa" class="input" autocomplete="off"
                                        name="tarif_sewa" pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                    @error('tarif_sewa')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tahun_pembuatan">Tahun Pembuatan</label>
                                    <input type="text" id="tahun_pembuatan" class="input" autocomplete="off"
                                        name="tahun_pembuatan" minlength="0" maxlength="4" pattern="[0-9]*"
                                        title="Hanya angka 0-9 diperbolehkan">
                                    @error('tahun_pembuatan')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_pembelian">Tanggal Pembelian</label>
                                    <input type="date" id="tanggal_pembelian" class="input" autocomplete="off"
                                        name="tanggal_pembelian">
                                    @error('tanggal_pembelian')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="warna">Warna</label>
                                    <input type="text" id="warna" class="input" autocomplete="off"
                                        name="warna">
                                    @error('warna')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_rangka">Nomor Rangka</label>
                                    <input type="text" id="nomor_rangka" class="input" autocomplete="off"
                                        name="nomor_rangka" pattern="[0-9]*" title="Hanya angka 0-9 diperbolehkan">
                                    @error('nomor_rangka')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="nomor_mesin">Nomor Mesin</label>
                                    <input type="text" id="nomor_mesin" class="input" autocomplete="off"
                                        name="nomor_mesin">
                                    @error('nomor_mesin')
                                        <p class="caption-error mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="submit" class="button-primary">Tambah Kendaraan</button>
                                    <a href="{{ route('kendaraan') }}" class="button-reverse">Batal
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
        const tagCreateKendaraan = document.querySelector('.tag-create-image');
        const inputCreateKendaraan = document.querySelector('.input-create-image');
        const buttonCreate = document.querySelector('.button-create');

        buttonCreate.addEventListener('click', function() {
            inputCreateKendaraan.click();
        });

        inputCreateKendaraan.addEventListener('change', function() {
            tagCreateKendaraan.src = URL.createObjectURL(inputCreateKendaraan.files[0]);
        });

        $("#seriData").change(function() {
            let id = $(this).val();
            $.ajax({
                type: 'get',
                url: '/kendaraan/getSeriKendaraan/' + id,
                success: function(data) {
                    $('[data-value="jenis_kendaraan"]').val(data.jenis_kendaraan.nama);
                    $('[data-value="brand_kendaraan"]').val(data.brand_kendaraan.nama);
                }
            });
        });
    </script>
@endsection
