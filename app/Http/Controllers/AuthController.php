<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
class AuthController extends Controller
{
    public function store(Request $request)
    {
        // dd('cok');
        $validated = $request->validate([
            'nim' => 'required|unique:users,nim|max:20',
            'name' => 'required|string|max:255',
            'prodi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'phone' => 'required|string|max:15',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);

        $user = User::create([
            'nim' => $validated['nim'],
            'name' => $validated['name'],
            'prodi' => $validated['prodi'],
            'alamat' => $validated['alamat'],
            'angkatan' => $validated['angkatan'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'role' => 'mahasiswa',
            'password' => Hash::make($validated['password']),
        ]);
        
        return redirect()->route('login')->with('success', 'User berhasil dibuat!');

    }

    public function showRegistrationForm()
    {
        return view('registrasi');
    }
}
