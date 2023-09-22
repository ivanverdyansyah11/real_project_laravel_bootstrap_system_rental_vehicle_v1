<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nusa Kendala Rental Kendaraan | Halaman {{ $title }}</title>

    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- END STYLE CSS --}}
</head>

<body>

    <div class="container-fluid p-0 login">
        <div class="row justify-content-center justify-content-lg-end">
            <div class="col banner-login d-none d-lg-inline-block"></div>
            <div class="col-md-9 col-lg-5 col-xl-4">
                <div class="content-login d-flex align-items-center flex-column">
                    @if (session()->has('success'))
                        <div class="alert alert-success w-100 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session()->has('failed'))
                        <div class="alert alert-danger w-100 mb-4" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        class="img-fluid login-brand" draggable="false">
                    <form class="form d-inline-block w-100" method="POST" action="{{ route('login.action') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="input-wrapper">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="input" name="email"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 row-button">
                                <div class="input-wrapper">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="input" name="password"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="button-primary-full">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- END SCRIPT JS --}}
</body>

</html>
