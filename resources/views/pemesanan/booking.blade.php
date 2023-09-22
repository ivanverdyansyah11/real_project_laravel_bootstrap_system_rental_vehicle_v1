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
                <h5 class="subtitle">Pelepasan Pemesanan Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-document" alt="Dokumen Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-document" name="image"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-document">Pilih Foto
                                            Dokumen</button>
                                    </div>
                                </div>
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-vehicle" alt="Kendaraan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-vehicle" name="image"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-vehicle">Pilih Foto
                                            Kendaraan</button>
                                    </div>
                                </div>
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-customer" alt="Pelanggan Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-customer" name="image"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-customer">Pilih Foto
                                            Pelanggan</button>
                                    </div>
                                </div>
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="input" autocomplete="off">
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" id="nomor_telepon" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kendaraan">Kendaraan</label>
                                <input type="text" id="kendaraan" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif_sewa">Tarif Sewa</label>
                                <input type="text" id="tarif_sewa" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kilometer_keluar">Kilometer Keluar</label>
                                <input type="text" id="kilometer_keluar" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="bensin_keluar">Bensin Keluar</label>
                                <input type="text" id="bensin_keluar" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_diambil">Tanggal Diambil</label>
                                <input type="text" id="tanggal_diambil" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="text" id="tanggal_kembali" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="waktu_sewa">Waktu Sewa</label>
                                <input type="text" id="waktu_sewa" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                <input type="text" id="total_tarif_sewa" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="button" class="button-primary" data-bs-toggle="modal"
                                    data-bs-target="#pengecekanKelengkapanModal">Simpan Pemesanan</button>
                                <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                    Pemesanan</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PENGECEKAN KELENGKAPAN --}}
    <div class="modal fade" id="pengecekanKelengkapanModal" tabindex="-1"
        aria-labelledby="pengecekanKelengkapanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Kelengkapan Pelepasan Pemesanan</h3>
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="sarung_jok">Sarung Jok</label>
                                <select id="sarung_jok" class="input">
                                    <option>Pilih kelengkapan sarung jok</option>
                                    <option>Ada</option>
                                    <option>Tidak Ada</option>
                                    <option>Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="karpet">Karpet</label>
                                <select id="karpet" class="input">
                                    <option>Pilih kelengkapan karpet</option>
                                    <option>Ada</option>
                                    <option>Tidak Ada</option>
                                    <option>Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                <select id="kondisi_kendaraan" class="input">
                                    <option>Pilih kondisi kendaraan</option>
                                    <option>Ada</option>
                                    <option>Tidak Ada</option>
                                    <option>Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="ban_serep">Ban Serep</label>
                                <select id="ban_serep" class="input">
                                    <option>Pilih ban serep</option>
                                    <option>Ada</option>
                                    <option>Tidak Ada</option>
                                    <option>Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <a href="{{ route('pemesanan.transaction') }}" class="button-primary">Simpan
                                    Kelengkapan</a>
                                <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal
                                    Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL TAMBAH PENGECEKAN KELENGKAPAN --}}

    <script>
        const tagCreateDocument = document.querySelector('.tag-create-document');
        const inputCreateDocument = document.querySelector('.input-create-document');
        const buttonCreateDocument = document.querySelector('.button-create-document');

        const tagCreateVehicle = document.querySelector('.tag-create-vehicle');
        const inputCreateVehicle = document.querySelector('.input-create-vehicle');
        const buttonCreateVehicle = document.querySelector('.button-create-vehicle');

        const tagCreateCustomer = document.querySelector('.tag-create-customer');
        const inputCreateCustomer = document.querySelector('.input-create-customer');
        const buttonCreateCustomer = document.querySelector('.button-create-customer');

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
    </script>
@endsection
