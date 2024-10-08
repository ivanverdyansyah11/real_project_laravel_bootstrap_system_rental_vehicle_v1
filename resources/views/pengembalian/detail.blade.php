@extends('template.main')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                @php
                    $today = Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                @if (session()->has('success'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('failed'))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ session('failed') }}
                    </div>
                @elseif($pelepasan_pemesanan->pemesanan->tanggal_akhir < $today)
                    <div class="alert alert-danger mb-4" role="alert">
                        Tanggal pengembalian sudah lewat!
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Detail Booking Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ $pelepasan_pemesanan->foto_dokumen ? asset('assets/img/pemesanan-dokumen-images/' . $pelepasan_pemesanan->foto_dokumen) : asset('assets/img/default/image-notfound.svg') }}"
                                    class="img-fluid tag-create-document" alt="Dokumen Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ $pelepasan_pemesanan->foto_kendaraan ? asset('assets/img/pemesanan-kendaraan-images/' . $pelepasan_pemesanan->foto_kendaraan) : asset('assets/img/default/image-notfound.svg') }}"
                                    class="img-fluid tag-create-vehicle" alt="Kendaraan Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ $pelepasan_pemesanan->foto_pelanggan ? asset('assets/img/pemesanan-pelanggan-images/' . $pelepasan_pemesanan->foto_pelanggan) : asset('assets/img/default/image-notfound.svg') }}"
                                    class="img-fluid tag-create-customer" alt="Pelanggan Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nama_penyewa">Nama Pelanggan</label>
                                    @if ($pelepasan_pemesanan->pemesanan->pelanggan)
                                        <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->pemesanan->pelanggan->nama }}" readonly>
                                    @else
                                        <input type="text" id="nama_penyewa" class="input" autocomplete="off"
                                            value="Belum memilih pelanggan" readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="nomor_plat">Nomor Plat</label>
                                    @if ($pelepasan_pemesanan->kendaraan)
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->kendaraan->nomor_plat }}" readonly>
                                    @else
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off"
                                            value="Belum memilih kendaraan" readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kilometer_keluar">Kilometer Keluar (Km)</label>
                                    <input type="number" id="kilometer_keluar" class="input" autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->kilometer_keluar }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="bensin_keluar">Bensin Keluar (Strip Bar)</label>
                                    <input type="number" id="bensin_keluar" class="input" autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->bensin_keluar }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="sarung_jok">Sarung Jok</label>
                                    <input type="text" id="sarung_jok" class="input text-capitalize" autocomplete="off"
                                        readonly value="{{ $pelepasan_pemesanan->sarung_jok }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="karpet">Karpet</label>
                                    <input type="text" id="karpet" class="input text-capitalize" autocomplete="off"
                                        readonly value="{{ $pelepasan_pemesanan->karpet }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="kondisi_kendaraan">Kondisi Kendaraan</label>
                                    <input type="text" id="kondisi_kendaraan" class="input text-capitalize"
                                        autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->kondisi_kendaraan }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <label for="ban_serep">Ban Serep</label>
                                    <input type="text" id="ban_serep" class="input text-capitalize"
                                        autocomplete="off" readonly value="{{ $pelepasan_pemesanan->ban_serep }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="input-wrapper">
                        <div class="input-line position-relative mb-2">
                            <div class="line"></div>
                            <p>Pembayaran Pelepasan Kendaraan</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                        <div class="input-wrapper">
                            <div class="wrapper d-flex gap-3 align-items-end">
                                <img src="{{ $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran ? asset('assets/img/pembayaran-pemesanan-images/' . $pelepasan_pemesanan->pembayaran_pemesanan->foto_pembayaran) : asset('assets/img/default/image-notfound.svg') }}"
                                    class="img-fluid tag-create-transaction" alt="Pembayaran Image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="waktu_sewa">Waktu Sewa (Hari)</label>
                                    <input type="number" id="waktu_sewa" class="input" autocomplete="off"
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->waktu_sewa }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_tarif_sewa">Total Tarif Sewa</label>
                                    <input type="text" id="total_tarif_sewa" class="input" autocomplete="off"
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_tarif_sewa }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="text" id="total_bayar" class="input" autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar ? $pelepasan_pemesanan->pembayaran_pemesanan->total_bayar : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="total_kembalian">Total Kembalian</label>
                                    <input type="text" id="total_kembalian" class="input" autocomplete="off"
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->total_kembalian }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <input type="text" id="jenis_pembayaran" class="input text-capitalize"
                                        autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->jenis_pembayaran }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="metode_bayar">Metode Pembayaran</label>
                                    <input type="text" id="metode_bayar" class="input text-capitalize"
                                        autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->metode_bayar }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="input-wrapper">
                                    <label for="sopirs_id">Penyewaan Sopir</label>
                                    @if ($pelepasan_pemesanan->pemesanan->sopir)
                                        <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                            value="{{ $pelepasan_pemesanan->pemesanan->sopir->nama }}" readonly>
                                    @else
                                        <input type="text" id="sopirs_id" class="input" autocomplete="off"
                                            value="Tidak Memilih Sopir" readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 row-button">
                                <div class="input-wrapper">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" id="keterangan" class="input" autocomplete="off" readonly
                                        value="{{ $pelepasan_pemesanan->pembayaran_pemesanan->keterangan }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-wrapper d-flex">
                                    <a href="{{ route('pengembalian.restoration', $pelepasan_pemesanan->id) }}"
                                        class="button-primary">Lakukan Pengembalian</a>
                                    @if (!\App\Models\PenambahanSewa::where('pelepasan_pemesanans_id', $pelepasan_pemesanan->id)->first())
                                        <a href="{{ route('penambahan.rent', $pelepasan_pemesanan->id) }}"
                                            class="button-primary">Tambah
                                            Persewaan</a>
                                    @endif
                                    <a href="{{ route('pengembalian') }}" class="button-reverse">Batal
                                        Pengembalian</a>
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="button-wrapper d-flex d-md-none">
                                    <a href="{{ route('pemesanan') }}" class="button-reverse">Kembali ke Halaman</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let totalTarifSewa = document.getElementById('total_tarif_sewa')
        totalTarifSewa.value = formatRupiah(totalTarifSewa.value, 'Rp. ');
        let totalBayar = document.getElementById('total_bayar')
        totalBayar.value = formatRupiah(totalBayar.value, 'Rp. ');
        let totalKembalian = document.getElementById('total_kembalian')
        totalKembalian.value = formatRupiah(totalKembalian.value, 'Rp. ');

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
