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
                <h5 class="subtitle">Profile Anda</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form d-inline-block w-100" method="POST" action="{{ route('profile.update', $user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" class="input" required autocomplete="off"
                                    name="nama_lengkap" value="{{ $user->nama_lengkap }}">
                                @error('nama_lengkap')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="input" required autocomplete="off"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" id="password_confirmation" class="input" autocomplete="off"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="input-wrapper">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="input" autocomplete="off" name="password">
                                @error('password')
                                    <p class="caption-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="button-wrapper d-flex">
                                <button type="submit" class="button-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#jenis_kendaraan_edit").select2({
            theme: "bootstrap-5",
        });

        $("#brand_kendaraan_edit").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
