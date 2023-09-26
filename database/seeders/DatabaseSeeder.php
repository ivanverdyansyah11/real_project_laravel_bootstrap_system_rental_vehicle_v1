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
            'role' => 'admin',
        ]);

        Auth::create([
            'nama_lengkap' => 'Dewi Ratnasari',
            'email' => 'dewiratnasari@gmail.com',
            'password' => bcrypt('dewi123'),
            'role' => 'staff',
        ]);

        Pelanggan::create([
            'nama' => 'Aditya Prayatna',
            'nik' => '00454654435',
            'nomor_telepon' => '08123456789',
            'nomor_ktp' => '34265768645',
            'nomor_kk' => '34556565734',
            'foto_ktp' => 'sample-kk.jpg',
            'foto_kk' => 'sample-kk.jpg',
            'alamat' => 'Jl. Ahmad Yani',
        ]);

        KelengkapanPelanggan::create([
            'pelanggans_id' => 1,
            'ktp' => 'lengkap',
            'kk' => 'lengkap',
            'nomor_telepon' => 'lengkap',
        ]);

        Sopir::create([
            'nama' => 'Aditya Prayatna',
            'nik' => '00454654435',
            'nomor_telepon' => '08987654321',
            'nomor_ktp' => '34254756867',
            'nomor_sim' => '32435466576',
            'foto_ktp' => 'sample-ktp.jpg',
            'foto_sim' => 'sample-sim.jpg',
            'alamat' => 'Jl. Dalung Permai',
            'status' => 'ada',
        ]);

        KelengkapanSopir::create([
            'sopirs_id' => 1,
            'ktp' => 'lengkap',
            'sim' => 'lengkap',
            'nomor_telepon' => 'lengkap',
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
