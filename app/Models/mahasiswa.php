<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Menggunakan Authenticatable jika diperlukan
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';
    
    protected $fillable = ['nim', 'name', 'prodi', 'alamat', 'angkatan', 'phone', 'email', 'password'];
}
