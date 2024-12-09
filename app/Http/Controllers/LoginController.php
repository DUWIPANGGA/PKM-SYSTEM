<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $role = Auth::user()->role;
// dd($role);
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard'); // Admin
                case 'mahasiswa':
                    return redirect()->route('upload-pkm'); // Mahasiswa
                case 'dosen_pembimbing':
                    return redirect()->route('dosen.dashboard'); // Dosen Pembimbing
                case 'reviewer':
                    return redirect()->route('reviewer.dashboard'); // Reviewer
                default:
                    // Jika role tidak valid, logout dan kembali ke halaman login
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['email' => 'Role tidak valid.']);
            }
        }

        // Jika login gagal, tampilkan pesan error
        return back()->withErrors(['email' => 'Email atau password yang dimasukkan tidak sesuai']);
    }
}
