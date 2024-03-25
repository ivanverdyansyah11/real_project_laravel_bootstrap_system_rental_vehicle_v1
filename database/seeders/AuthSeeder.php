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
            'nama_lengkap' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user1'),
            'role' => 'admin',
        ]);

        Auth::create([
            'nama_lengkap' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user2'),
            'role' => 'staff',
        ]);
    }
}
