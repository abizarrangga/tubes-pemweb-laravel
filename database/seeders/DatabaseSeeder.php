<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,    // ← harus pertama (BeritaSeeder butuh user_id = 1)
            BeritaSeeder::class,
            EventSeeder::class,
        ]);
    }
}
