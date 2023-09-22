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
                <h5 class="subtitle">Bayar Pajak</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/default/image-notfound.svg') }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="stnk_nama">STNK Atas Nama</label>
                                <input type="text" id="stnk_nama" class="input" autocomplete="off">
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor_seri">Nomor Seri</label>
                                <input type="text" id="nomor_seri" class="input" autocomplete="off">
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
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
                                <label for="jenis_pajak">Jenis Pajak</label>
                                <select id="jenis_pajak" class="input">
                                    <option>Pilih jenis pajak kendaraan</option>
                                    <option>Samsat</option>
                                    <option>Angsuran</option>
                                    <option>Ganti Nomor Polisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="text" id="tanggal_bayar" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                <input type="text" id="jenis_pembayaran" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="text" id="jumlah_bayar" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Bayar Pajak</button>
                                <a href="{{ route('kendaraan') }}" class="button-reverse">Batal
                                    Bayar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
