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
                <h5 class="subtitle">Laporan Data Servis Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="input-wrapper">
                            <p style="font-size: 0.875rem; opacity: 0.72;" class="mb-2">Foto Kendaraan</p>
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ asset('assets/img/kendaraan-images/' . $servis->kendaraan->foto_kendaraan) }}"
                                    class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_plat">Nomor Plat</label>
                                    <input type="text" id="nomor_plat" class="input" autocomplete="off" readonly
                                        value="{{ $servis->kendaraan->nomor_plat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kategori_kilometer">Kategori Kilometer</label>
                                    <input type="text" id="kategori_kilometer" class="input" autocomplete="off" readonly
                                        value="{{ $servis->kendaraan->kilometer_kendaraan->jumlah }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer_sebelum">Kilometer Sebelum</label>
                                    <input type="number" id="kilometer_sebelum" name="kilometer_sebelum" class="input"
                                        autocomplete="off" value="{{ $servis->kendaraan->kilometer }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer_setelah">Kilometer Setelah</label>
                                    <input type="number" id="kilometer_setelah" name="kilometer_setelah" class="input"
                                        autocomplete="off" value="{{ $servis->kendaraan->kilometer_saat_ini }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_servis">Tanggal Servis</label>
                                    <input type="date" id="tanggal_servis" name="tanggal_servis" class="input"
                                        autocomplete="off" value="{{ $servis->tanggal_servis }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="text" id="total_bayar" class="input" autocomplete="off"
                                        name="total_bayar" value="R. {{ number_format($servis->total_bayar, 2, ",", ".") }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="air_accu">Air Accu</label>
                                    <input type="text" class="input" id="air_accu" value="{{ $servis->air_accu }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="air_waiper">Air Waiper</label>
                                    <input type="text" class="input" id="air_waiper" value="{{ $servis->air_waiper }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="ban">Ban</label>
                                    <input type="text" class="input" id="ban" value="{{ $servis->ban }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="oli">Oli</label>
                                    <input type="text" class="input" id="oli" value="{{ $servis->oli }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="penggunas_id">Pengguna Menambahkan</label>
                                    <input type="text" id="penggunas_id" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->pengguna->nama_lengkap }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="tanggal_dibuat">Tanggal & Jam Dibuat</label>
                                    <input type="text" id="tanggal_dibuat" class="input" autocomplete="off" readonly
                                        value="{{ $laporan->created_at }}">
                                </div>
                            </div>
                            <div class="col-12 row-button">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input" autocomplete="off"
                                        name="keterangan" value="{{ $servis->keterangan }}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('laporan.servis') }}" class="button-reverse">Kembali ke Halaman</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
