<?php

namespace Database\Seeders;

use App\Models\Auth;
use App\Models\KelengkapanSopir;
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

        Sopir::create([
            'nama' => 'Andi Wahyu Pratama',
            'nik' => '6757685698',
            'nomor_telepon' => '08123456789',
            'nomor_ktp' => '004564575678',
            'nomor_sim' => '003454657676',
            'alamat' => 'Jl. Dalung Permai',
            'foto_ktp' => 'sample-ktp.jpg',
            'foto_sim' => 'sample-sim.jpg',
        ]);

        KelengkapanSopir::create([
            'sopirs_id' => 1,
            'ktp' => 'lengkap',
            'sim' => 'lengkap',
            'nomor_telepon' => 'lengkap',
        ]);
    }
}
