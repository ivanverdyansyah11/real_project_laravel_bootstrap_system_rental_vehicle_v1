<?php

namespace Database\Seeders;

use App\Models\Auth;
use App\Models\BrandKendaraan;
use App\Models\JenisKendaraan;
use App\Models\KategoriKilometerKendaraan;
use App\Models\Laporan;
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
            'nama' => 'Bayu Pradana',
            'nik' => '00454654435',
            'nomor_telepon' => '08123456789',
            'nomor_ktp' => '34265768645',
            'nomor_kk' => '34556565734',
            'alamat' => 'Jl. Ahmad Yani',
            'data_ktp' => 'benar',
            'data_kk' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_kk' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 1,
            'kategori_laporan' => 'pelanggan',
        ]);

        Pelanggan::create([
            'nama' => 'Ayu Saputri',
            'nik' => '3454657568',
            'nomor_telepon' => '08987654321',
            'nomor_ktp' => '45634645657',
            'nomor_kk' => '34354657657',
            'alamat' => 'Jl. Dalung',
            'data_ktp' => 'benar',
            'data_kk' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_kk' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 2,
            'kategori_laporan' => 'pelanggan',
        ]);

        Sopir::create([
            'nama' => 'Agus Wirawan',
            'nik' => '867745675676',
            'nomor_telepon' => '089734536453',
            'nomor_ktp' => '345465768',
            'nomor_sim' => '32435466576',
            'alamat' => 'Jl. Cargo',
            'data_ktp' => 'benar',
            'data_sim' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_sim' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 1,
            'kategori_laporan' => 'sopir',
        ]);

        Sopir::create([
            'nama' => 'Putri Cindrawati',
            'nik' => '0845345456554',
            'nomor_telepon' => '0897645312',
            'nomor_ktp' => '457567686789',
            'nomor_sim' => '65678686767',
            'alamat' => 'Jl. Gatsu Utara',
            'data_ktp' => 'benar',
            'data_sim' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_sim' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 2,
            'kategori_laporan' => 'sopir',
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
            'jumlah' => '2500',
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '5000',
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '10000',
        ]);
    }
}
