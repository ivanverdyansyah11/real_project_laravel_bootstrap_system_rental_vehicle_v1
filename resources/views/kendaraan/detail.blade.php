@extends('template.main')

@section('content')
    @php
        use Carbon\Carbon;
        $terakhir_samsat = Carbon::parse($kendaraan->terakhir_samsat);
        $terakhir_angsuran = Carbon::parse($kendaraan->terakhir_angsuran);
        $terakhir_ganti_nomor_polisi = Carbon::parse($kendaraan->terakhir_ganti_nomor_polisi);
    @endphp

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
                @elseif($terakhir_samsat->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak samsat sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_angsuran->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak angsuran sudah lewat untuk kendaraan ini
                    </div>
                @elseif($terakhir_ganti_nomor_polisi->isPast())
                    <div class="alert alert-danger mb-4" role="alert">
                        Waktu pembayaran pajak ganti nomor polisi sudah lewat untuk kendaraan ini
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-bottom: 32px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5 class="subtitle">Detail Kendaraan</h5>
                <div class="wrapper d-flex gap-2">
                    <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                        class="button-action button-edit d-flex justify-content-center align-items-center">
                        <div class="edit-icon"></div>
                    </a>
                    <button type="button"
                        class="button-action button-delete d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#hapusKendaraanModal" data-id="{{ $kendaraan->id }}">
                        <div class="delete-icon"></div>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="input-wrapper">
                                <div class="wrapper d-flex gap-3 align-items-end">
                                    <img src="{{ asset('assets/img/kendaraan-images/' . $kendaraan->foto_kendaraan) }}"
                                        class="img-fluid tag-create-image" alt="Kendaraan Image" width="80">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="stnk_nama">STNK Atas Nama</label>
                                        <input type="text" id="stnk_nama" class="input" autocomplete="off" disabled
                                            value="{{ $kendaraan->stnk_nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_plat">Nomor Plat</label>
                                        <input type="text" id="nomor_plat" class="input" autocomplete="off" disabled
                                            value="{{ $kendaraan->nomor_plat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="jenis">Jenis Kendaraan</label>
                                        @if ($kendaraan->jenis_kendaraan)
                                            <input type="text" id="jenis" class="input" autocomplete="off"
                                                value="{{ $kendaraan->jenis_kendaraan->nama }}" disabled>
                                        @else
                                            <input type="text" id="jenis" class="input" autocomplete="off"
                                                value="Belum memilih jenis kendaraan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="brand">Brand Kendaraan</label>
                                        @if ($kendaraan->brand_kendaraan)
                                            <input type="text" id="brand" class="input" autocomplete="off"
                                                value="{{ $kendaraan->brand_kendaraan->nama }}" disabled>
                                        @else
                                            <input type="text" id="brand" class="input" autocomplete="off"
                                                value="Belum memilih brand kendaraan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="seri">Nomor Seri</label>
                                        @if ($kendaraan->seri_kendaraan)
                                            <input type="text" id="seri" class="input" autocomplete="off"
                                                value="{{ $kendaraan->seri_kendaraan->nomor_seri }}" disabled>
                                        @else
                                            <input type="text" id="seri" class="input" autocomplete="off"
                                                value="Belum memilih seri kendaraan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer">Kategori Kilometer</label>
                                        @if ($kendaraan->kilometer_kendaraan)
                                            <input type="text" id="kilometer" class="input" autocomplete="off"
                                                value="{{ $kendaraan->kilometer_kendaraan->jumlah }}" disabled>
                                        @else
                                            <input type="text" id="kilometer" class="input" autocomplete="off"
                                                value="Belum memilih kilometer kendaraan" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer_sebelum_servis">Kilometer Sebelum Servis</label>
                                        <input type="text" id="kilometer_sebelum_servis" class="input"
                                            autocomplete="off" disabled
                                            value="{{ $kendaraan->servis($kendaraan->id) ? $kendaraan->servis($kendaraan->id)->kilometer_sebelum : $kendaraan->kilometer_saat_ini }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="kilometer">Kilometer Saat Ini</label>
                                        <input type="text" id="kilometer" class="input" autocomplete="off" disabled
                                            value="{{ $kendaraan->kilometer_saat_ini }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_hari">Tarif Sewa Harian</label>
                                        <input type="text" id="tarif_sewa_hari" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->tarif_sewa_hari }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_minggu">Tarif Sewa Mingguan</label>
                                        <input type="text" id="tarif_sewa_minggu" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->tarif_sewa_minggu }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tarif_sewa_bulan">Tarif Sewa Bulanan</label>
                                        <input type="text" id="tarif_sewa_bulan" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->tarif_sewa_bulan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tahun_pembuatan">Tahun Pembuatan</label>
                                        <input type="text" id="tahun_pembuatan" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->tahun_pembuatan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="tanggal_pembelian">Tanggal Pembelian</label>
                                        <input type="text" id="tanggal_pembelian" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->tanggal_pembelian }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="warna">Warna</label>
                                        <input type="text" id="warna" class="input" autocomplete="off" disabled
                                            value="{{ $kendaraan->warna }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_rangka">Nomor Rangka</label>
                                        <input type="text" id="nomor_rangka" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->nomor_rangka }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="nomor_mesin">Nomor Mesin</label>
                                        <input type="text" id="nomor_mesin" class="input" autocomplete="off"
                                            disabled value="{{ $kendaraan->nomor_mesin }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="pendatapatan">Pendapatan Kendaraan</label>
                                        <input type="text" id="pendatapatan" class="input" autocomplete="off"
                                            disabled value="{{ $pendapatan_kendaraan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="terakhir_bayar_samsat">Batas Pajak Samsat Kendaraan</label>
                                        <input type="text" id="terakhir_bayar_samsat" class="input"
                                            autocomplete="off" disabled value="{{ $kendaraan->terakhir_samsat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="terakhir_bayar_angsuran">Batas Pajak Angsuran Kendaraan</label>
                                        <input type="text" id="terakhir_bayar_angsuran" class="input"
                                            autocomplete="off" disabled value="{{ $kendaraan->terakhir_angsuran }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-wrapper">
                                        <label for="terakhir_ganti_nomor_polisi">Terakhir Pajak Ganti Nomor Polisi
                                            Kendaraan</label>
                                        <input type="text" id="terakhir_ganti_nomor_polisi" class="input"
                                            autocomplete="off" disabled
                                            value="{{ $kendaraan->terakhir_ganti_nomor_polisi }}">
                                    </div>
                                </div>
                                <div class="col-12 row-button">
                                    <div class="input-wrapper">
                                        <label for="status">Status</label>
                                        <input type="text" id="status" class="input text-capitalize"
                                            autocomplete="off" disabled value="{{ $kendaraan->status }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-wrapper d-flex justify-content-between ">
                                        <a href="{{ route('kendaraan') }}" class="button-reverse">Kembali ke Halaman</a>
                                        <div class="wrapper d-flex gap-2">
                                            <a href="{{ route('kendaraan.historyTax', $kendaraan->id) }}"
                                                class="button-primary">Riwayat
                                                Pajak</a>
                                            <a href="{{ route('kendaraan.historyReservation', $kendaraan->id) }}"
                                                class="button-primary">Riwayat Pemesanan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL HAPUS KENDARAAN --}}
    <div class="modal modal-delete fade" id="hapusKendaraanModal" tabindex="-1"
        aria-labelledby="hapusKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="title">Hapus Kendaraan</h3>
                <form id="hapusKendaraan" class="form d-inline-block w-100" method="POST">
                    @csrf
                    <p class="caption-description row-button">Konfirmasi Penghapusan Kendaraan: Apakah Anda yakin
                        ingin
                        menghapus kendaraan ini?
                        Tindakan ini tidak dapat diurungkan, dan kendaraan akan dihapus secara permanen dari sistem.
                    </p>
                    <div class="button-wrapper d-flex">
                        <button type="submit" class="button-primary">Hapus Kendaraan</button>
                        <button type="button" class="button-reverse" data-bs-dismiss="modal">Batal Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL HAPUS KENDARAAN --}}

    <script>
        $(document).on('click', '[data-bs-target="#hapusKendaraanModal"]', function() {
            let id = $(this).data('id');
            $('#hapusKendaraan').attr('action', '/kendaraan/hapus/' + id);
        });

        let tarifSewaHari = document.getElementById('tarif_sewa_hari')
        tarifSewaHari.value = formatRupiah(tarifSewaHari.value, 'Rp. ');

        let tarifSewaMinggu = document.getElementById('tarif_sewa_minggu')
        tarifSewaMinggu.value = formatRupiah(tarifSewaMinggu.value, 'Rp. ');

        let tarifSewaBulan = document.getElementById('tarif_sewa_bulan')
        tarifSewaBulan.value = formatRupiah(tarifSewaBulan.value, 'Rp. ');

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
