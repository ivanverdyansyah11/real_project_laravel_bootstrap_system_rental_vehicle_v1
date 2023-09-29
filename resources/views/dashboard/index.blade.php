@extends('template.main')

@section('content')
    <div class="content">
        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dashboard mb-4" role="alert">
                        <a href="{{ route('pengembalian') }}" class="link-alert d-inline-block">Lihat Kendaraan Disewa</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mb-4">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Terdaftar</p>
                        <h4 class="caption-value">23</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/stok.svg') }}" class="img-fluid dashboard-img"
                            alt="Stok Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Pelanggan Terdaftar</p>
                        <h4 class="caption-value">07</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Pelanggan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Sopir Terdaftar</p>
                        <h4 class="caption-value">23</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Sopir Icon" width="18">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-flex flex-column flex-md-row flex-lg-column mb-4 mb-lg-0">
                <div
                    class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between mb-4 mb-4 me-md-4 me-lg-0">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                                alt="Kendaraan Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('pemesanan') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Dibooking</p>
                        <h4 class="caption-value">04 <span>Kendaraan</span></h4>
                    </div>
                </div>
                <div
                    class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between mb-4 mb-4 me-md-4 me-lg-0">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/kendaraan.svg') }}" class="img-fluid dashboard-img"
                                alt="Kendaraan Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('pengembalian') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Dipesan</p>
                        <h4 class="caption-value">04 <span>Kendaraan</span></h4>
                    </div>
                </div>
                <div class="card-default card-other w-100 d-flex flex-column align-items-start justify-content-between">
                    <div class="wrapper d-flex justify-content-between w-100">
                        <div class="wrapper-icon d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/dashboard/servis.svg') }}" class="img-fluid dashboard-img"
                                alt="Servis Icon" width="18">
                        </div>
                        @if (auth()->user()->role === 'owner' || auth()->user()->role === 'admin')
                            <a href="{{ route('servis') }}" class="link-dashboard">Lihat Kendaraan</a>
                        @endif
                    </div>
                    <div class="card-caption">
                        <p class="caption-name">Kendaraan Diservis</p>
                        <h4 class="caption-value">04 <span>Kendaraan</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="card-default" style="padding: 26px !important;">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="subtitle">Grafik Penyewaan Kendaraan</h6>
                        <div class="wrapper position-relative d-none d-md-inline-block">
                            <button type="button"
                                class="button-other button-reverse button-small d-flex align-items-center">
                                Tahun ini
                                <img src="{{ asset('assets/img/button/arrow-down.svg') }}" alt="Arrow Icon"
                                    class="img-fluid button-icon">
                            </button>
                            <div class="modal-other d-flex flex-column">
                                <a href="" class="modal-link {{ Request::is('dashboard') ? 'active' : '' }}">Tahun
                                    Ini</a>
                                <a href=""
                                    class="modal-link {{ Request::is('dashboard/bulan*') ? 'active' : '' }}">Bulan Ini</a>
                                <a href=""
                                    class="modal-link {{ Request::is('dashboard/minggu*') ? 'active' : '' }}">Minggu
                                    Ini</a>
                            </div>
                        </div>

                    </div>
                    <canvas id="chartVehicle" class="w-100" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');
        const ctx = document.getElementById('chartVehicle');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });

        Chart.defaults.color = '#939393';
        Chart.defaults.font.size = 12;
        Chart.defaults.font.weight = 600;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    data: [160, 143, 127, 169, 188, 154, 135, 96, 76, 125, 150, 180],
                    borderWidth: 0,
                    backgroundColor: [
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                    ],
                    showLine: false,
                    borderRadius: 9999,
                    borderSkipped: false,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 200,
                        ticks: {
                            stepSize: 50,
                        },
                    },
                },
                animation: false,
                showLine: false,
            }
        });
    </script>
@endsection
