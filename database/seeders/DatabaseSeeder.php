<?php

namespace Database\Seeders;

use App\Models\Auth;
use App\Models\BrandKendaraan;
use App\Models\JenisKendaraan;
use App\Models\KategoriKilometerKendaraan;
use App\Models\KelengkapanPelanggan;
use App\Models\KelengkapanSopir;
use App\Models\Pelanggan;
use App\Models\SeriKendaraan;
use App\Models\Sopir;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Auth::create([
            'nama_lengkap' => 'Putu Aditya Prayatna',
            'email' => 'adityaprayatna@gmail.com',
            'password' => bcrypt('aditya123'),
            'role' => 'owner',
        ]);

        Auth::create([
            'nama_lengkap' => 'Budi Susanto',
            'email' => 'budisusanto@gmail.com',
            'password' => bcrypt('budi123'),
            'role' => 'admin',
        ]);

        Auth::create([
            'nama_lengkap' => 'Dewi Ratnasari',
            'email' => 'dewiratnasari@gmail.com',
            'password' => bcrypt('dewi123'),
            'role' => 'staff',
        ]);

        JenisKendaraan::create([
            'nama' => 'Kendaraan Beroda 2',
        ]);

        JenisKendaraan::create([
            'nama' => 'Kendaraan Beroda 4',
        ]);

        BrandKendaraan::create([
            'nama' => 'Honda',
        ]);

        BrandKendaraan::create([
            'nama' => 'Toyota',
        ]);

        SeriKendaraan::create([
            'nomor_seri' => '00656676867',
            'jenis_kendaraans_id' => 1,
            'brand_kendaraans_id' => 1,
        ]);

        SeriKendaraan::create([
            'nomor_seri' => '00546546768',
            'jenis_kendaraans_id' => 2,
            'brand_kendaraans_id' => 2,
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '5000',
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '10000',
        ]);
    }
}
