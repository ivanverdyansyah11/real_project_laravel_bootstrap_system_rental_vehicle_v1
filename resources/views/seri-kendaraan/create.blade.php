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
                <h5 class="subtitle">Tambah Tipe Kendaraan</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST" action="{{ route('tipeKendaraan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nomor">Tipe Kendaraan</label>
                                <input type="text" id="nomor" class="input" required autocomplete="off"
                                    name="nomor_seri" value="{{ old('nomor_seri') }}">
                                @error('nomor_seri')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="input-wrapper">
                                <label for="jenis_kendaraan_add">Jenis Kendaraan</label>
                                <select id="jenis_kendaraan_add" class="input" name="jenis_kendaraans_id" required>
                                    <option value="">
                                        Pilih jenis kendaraan</option>
                                    @foreach ($jenises as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            {{ old('jenis_kendaraans_id') == $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 row-button">
                            <div class="input-wrapper">
                                <label for="brand_kendaraan_add">Brand Kendaraan</label>
                                <select id="brand_kendaraan_add" class="input" name="brand_kendaraans_id" required>
                                    <option value="">Pilih brand kendaraan</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_kendaraans_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->nama }}</option>
                                    @endforeach
                                </select>
                                @error('brand_kendaraans_id')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Tambah Tipe Kendaraan</button>
                                <a href="{{ route('tipeKendaraan') }}" class="button-reverse">Batal
                                    Tambah</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#jenis_kendaraan_add").select2({
            theme: "bootstrap-5",
        });

        $("#brand_kendaraan_add").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
