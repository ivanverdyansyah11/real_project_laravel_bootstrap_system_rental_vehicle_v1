<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nusa Kendala Rental Kendaraan | Halaman Login</title>

    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- END STYLE CSS --}}
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-4 bg-danger">
                <div class="content-login">
                    <img src="{{ asset('assets/img/brand/brand-text.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        class="img-fluid login-brand">
                    <form class="form">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="input-wrapper">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="input" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-wrapper">
                                    <label for="password">Password</label>
                                    <input type="text" id="password" class="input" autocomplete="off">
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
