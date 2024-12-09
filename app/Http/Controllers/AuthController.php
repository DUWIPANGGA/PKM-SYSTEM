<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:users,nim|max:20',
            'name' => 'required|string|max:255',
            'prodi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'nim' => $validated['nim'],
            'name' => $validated['name'],
            'prodi' => $validated['prodi'],
            'alamat' => $validated['alamat'],
            'angkatan' => $validated['angkatan'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect atau kembalikan pesan sukses
        return redirect('/login')->with('success', 'Akun berhasil didaftarkan!');
    }

    public function showRegistrationForm()
    {
        return view('registrasi');
    }
}
