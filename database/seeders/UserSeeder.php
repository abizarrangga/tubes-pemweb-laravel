<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin default — GANTI PASSWORD setelah deploy!
        User::firstOrCreate(
            ['email' => 'admin@dsb.com'],
            [
                'name'     => 'Admin DSB',
                'password' => 'password',
                'role'     => 'admin',
            ]
        );
    }
}
