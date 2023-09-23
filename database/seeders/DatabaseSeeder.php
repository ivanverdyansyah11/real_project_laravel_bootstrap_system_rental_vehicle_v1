<?php

namespace Database\Seeders;

use App\Models\Auth;
use App\Models\KelengkapanPelanggan;
use App\Models\KelengkapanSopir;
use App\Models\Pelanggan;
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
    }
}
