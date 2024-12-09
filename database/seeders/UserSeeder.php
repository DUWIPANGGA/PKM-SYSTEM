<?php

namespace Database\Seeders;  
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run() : void
    {
        $userData = [
            [
                'name' => 'Admin',
                'NIM' => '0',
                'email' => 'admin@gmail.com',
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'alamat' => 'loh bener',
                'role' => 'admin',
                'angkatan' => '2024',
'phone'=>'0',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'Mahasiswa',
                'NIM' => '2305063',
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'mahasiswa@gmail.com',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'phone'=>'0',
                'role' => 'mahasiswa',
                'password' => bcrypt('123456'),
            ], 
            [
                'name' => 'Reviewer',
                'NIM' => '2305062',
                'prodi' => 'REKAYASA PERANGKAT LUNAK',
                'email' => 'reviewer@gmail.com',
                'role' => 'reviewer',
                'alamat' => 'loh bener',
                'angkatan' => '2024',
                'phone'=>'0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
