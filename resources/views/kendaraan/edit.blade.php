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
                <h5 class="subtitle">Edit Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-edit-image" alt="Kendaraan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-edit-image" name="image"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-edit">Pilih Foto
                                            Kendaraan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="stnk_nama">STNK Atas Nama</label>
                                <input type="text" id="stnk_nama" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis">Jenis Kendaraan</label>
                                <input type="text" id="jenis" class="input" autocomplete="off"
                                    value="Pilih nomor seri terlebih dahulu!" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="brand">Brand Kendaraan</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="Pilih nomor seri terlebih dahulu!" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="seri">Nomor Seri</label>
                                <select id="seri" class="input">
                                    <option value="-">Pilih nomor seri kendaraan</option>
                                    <option value="576578">576578</option>
                                    <option value="456576">456576</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kilometer">Kategori Kilometer</label>
                                <select id="kilometer" class="input">
                                    <option value="-">Pilih kategori kilometer kendaraan</option>
                                    <option value="5.000">Kilometer 5.000</option>
                                    <option value="10.000">Kilometer 10.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_polisi">Nomor Polisi</label>
                                <input type="text" id="nomor_polisi" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kilometer">Kilometer</label>
                                <input type="text" id="kilometer" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif_sewa">Tarif Sewa</label>
                                <input type="text" id="tarif_sewa" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tahun_pembuatan">Tahun Pembuatan</label>
                                <input type="text" id="tahun_pembuatan" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_pembelian">Tanggal Pembelian</label>
                                <input type="text" id="tanggal_pembelian" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="warna">Warna</label>
                                <input type="text" id="warna" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_rangka">Nomor Rangka</label>
                                <input type="text" id="nomor_rangka" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="nomor_mesin">Nomor Mesin</label>
                                <input type="text" id="nomor_mesin" class="input" autocomplete="off" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                                <a href="{{ route('kendaraan') }}" class="button-reverse">Batal
                                    Edit</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const tagEditKendaraan = document.querySelector('.tag-edit-image');
        const inputEditKendaraan = document.querySelector('.input-edit-image');
        const buttonEdit = document.querySelector('.button-edit');

        buttonEdit.addEventListener('click', function() {
            inputEditKendaraan.click();
        });

        inputEditKendaraan.addEventListener('change', function() {
            tagEditKendaraan.src = URL.createObjectURL(inputEditKendaraan.files[0]);
        });
    </script>
@endsection
