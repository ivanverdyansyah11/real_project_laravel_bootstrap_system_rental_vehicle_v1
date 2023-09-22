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
                <h5 class="subtitle">Pembayaran Pemesanan Kendaraan</h5>
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
                                        class="img-fluid tag-create-proof" alt="Pembayaran Image" width="80">
                                    <div class="wrapper-image w-100">
                                        <input type="file" id="image" class="input-create-proof" name="image"
                                            style="opacity: 0;">
                                        <button type="button" class="button-reverse button-create-proof">Pilih Foto
                                            Pembayaran</button>
                                    </div>
                                </div>
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="row">
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
                                    <label for="waktu_sewa">Waktu Sewa</label>
                                    <input type="text" id="waktu_sewa" class="input" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_arif_sewa">Total Tarif Sewa</label>
                                    <input type="text" id="total_arif_sewa" class="input" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <select id="jenis_pembayaran" class="input">
                                        <option>Pilih jenis pembayaran</option>
                                        <option>Lunas</option>
                                        <option>DP</option>
                                        <option>Belum Bayar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="text" id="total_bayar" class="input" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <select id="metode_pembayaran" class="input">
                                        <option>Pilih metode pembayaran</option>
                                        <option>Transfer Bank</option>
                                        <option>Internet Banking (E-Banking)</option>
                                        <option>Mobile Banking</option>
                                        <option>Virtual Account (VA)</option>
                                        <option>Online Credit Card</option>
                                        <option>Rekening Bersama (Rekber)</option>
                                        <option>PayPal</option>
                                        <option>e-Money</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <button type="button" class="button-primary" data-bs-toggle="modal"
                                        data-bs-target="#pengecekanKelengkapanModal">Simpan Pembayaran</button>
                                    <a href="{{ route('pemesanan') }}" class="button-reverse">Batal
                                        Pemesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PENGECEKAN KELENGKAPAN --}}
    <div class="modal fade" id="pengecekanKelengkapanModal" tabindex="-1" aria-labelledby="pengecekanKelengkapanModalLabel"
        aria-hidden="true">
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
        const tagCreateProof = document.querySelector('.tag-create-proof');
        const inputCreateProof = document.querySelector('.input-create-proof');
        const buttonCreateProof = document.querySelector('.button-create-proof');

        buttonCreateProof.addEventListener('click', function() {
            inputCreateProof.click();
        });

        inputCreateProof.addEventListener('change', function() {
            tagCreateProof.src = URL.createObjectURL(inputCreateProof.files[0]);
        });
    </script>
@endsection
