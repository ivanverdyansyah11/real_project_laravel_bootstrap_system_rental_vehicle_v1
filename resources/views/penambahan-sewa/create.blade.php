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
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kendaraan">Kendaraan</label>
                                <input type="text" id="kendaraan" class="input" autocomplete="off" disabled
                                    value="Honda Brio (Honda)">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tarif">Tarif Sewa</label>
                                <input type="text" id="tarif" class="input" autocomplete="off" disabled
                                    value="500.000">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jumlah_hari">Jumlah Hari</label>
                                <input type="text" id="jumlah_hari" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="total_tarif">Total Tarif</label>
                                <input type="text" id="total_tarif" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="total_tarif">Total Tarif</label>
                                <textarea id="total_tarif" class="input" autocomplete="off" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Sewa</button>
                                <a href="{{ route('penambahanSewa') }}" class="button-reverse">Batal
                                    Tambah</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
