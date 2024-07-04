<?php

namespace Database\Seeders;

use App\Models\Auth;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auth::create([
            'nama_lengkap' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin',
        ]);

        Auth::create([
            'nama_lengkap' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin2'),
            'role' => 'admin',
        ]);

        Auth::create([
            'nama_lengkap' => 'Staff 1',
            'email' => 'staff1@gmail.com',
            'password' => bcrypt('staff1'),
            'role' => 'staff',
        ]);
    }
}
