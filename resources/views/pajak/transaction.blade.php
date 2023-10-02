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
                                <label for="nomor_seri">Nomor Seri</label>
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
                                <label for="brand">Brand Kendaraan</label>
                                <input type="text" id="brand" class="input" autocomplete="off"
                                    value="{{ $kendaraan->brand_kendaraan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_pajak">Jenis Pajak</label>
                                <select id="jenis_pajak" class="input" name="jenis_pajak">
                                    <option value="-">Pilih jenis pajak kendaraan</option>
                                    <option value="samsat">Samsat</option>
                                    <option value="angsuran">Angsuran</option>
                                    <option value="ganti nomor polisi">Ganti Nomor Polisi</option>
                                </select>
                                @error('jenis_pajak')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="metode_bayar">Metode Pembayaran</label>
                                <select id="metode_bayar" class="input" name="metode_bayar">
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
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="date" id="tanggal_bayar" class="input" autocomplete="off"
                                    name="tanggal_bayar">
                                @error('tanggal_bayar')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="number" id="jumlah_bayar" class="input" autocomplete="off"
                                    name="jumlah_bayar">
                                @error('jumlah_bayar')
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
    </script>
@endsection
