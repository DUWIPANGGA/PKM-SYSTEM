<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder; // Pastikan ini mengarah ke kelas UserSeeder

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);  // Memanggil UserSeeder
    }
}
