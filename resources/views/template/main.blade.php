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

    {{-- SCRIPT JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- END SCRIPT JS --}}
</head>

<body>

    <div class="container-fluid dashboard p-0 d-flex">
        @include('components.sidebar')

        <div class="content-dashboard w-100">
            @include('components.topbar')

            @yield('content')
        </div>
    </div>

    {{-- SCRIPT JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- END SCRIPT JS --}}
</body>

</html>
