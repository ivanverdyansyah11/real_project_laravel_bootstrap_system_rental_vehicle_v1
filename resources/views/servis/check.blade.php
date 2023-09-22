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
                <h5 class="subtitle">Servis Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="kendaraan">Kendaraan</label>
                                <input type="text" id="kendaraan" class="input" autocomplete="off">
                                {{-- @error('image')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kategori_servis">Kategori Servis</label>
                                <select id="kategori_servis" class="input">
                                    <option>Pilih kategori servis</option>
                                    <option>Servis Lengkap</option>
                                    <option>Servis Oli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="tanggal_servis">Tanggal Servis</label>
                                <input type="text" id="tanggal_servis" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kilometer_sebelum">Kilometer Sebelum</label>
                                <input type="text" id="kilometer_sebelum" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="kilometer_setelah">Kilometer Setelah</label>
                                <input type="text" id="kilometer_setelah" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 row-button">
                            <div class="input-wrapper">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" id="keterangan" class="input" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Servis Kendaraan</button>
                                <a href="{{ route('servis') }}" class="button-reverse">Batal
                                    Servis</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
