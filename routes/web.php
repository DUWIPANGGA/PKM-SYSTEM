<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PkmProcessController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Route untuk Halaman Utama
|--------------------------------------------------------------------------
*/

// Halaman utama (Welcome Page)
Route::get('/', function () {
    return view('beranda');
});

// Halaman Informasi PKM
Route::view('/pkm-polindra', 'pkm-polindra');

/*
|--------------------------------------------------------------------------
| Route untuk PKMController
|--------------------------------------------------------------------------
*/

Route::controller(PkmController::class)->group(function () {
    Route::get('/Beranda', 'beranda')->name('Beranda');
    Route::get('/Tentang', 'tentang')->name('Tentang');
    Route::get('/Kontak', 'kontak')->name('Kontak');
    Route::get('/AlurSistemPkm', 'alurSistem')->name('AlurSistemPkm');
    Route::get('/PedomanPkm', 'pedoman')->name('PedomanPkm');
    Route::get('/PanduanPkm', 'panduan')->name('PanduanPkm');
});

/*
|--------------------------------------------------------------------------
| Route untuk Auth (Login & Registrasi)
|--------------------------------------------------------------------------
*/

// Form Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Proses Login
Route::post('/login', [LoginController::class, 'login']);

// Form Registrasi
Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi');
// Proses Registrasi
Route::post('/registrasi', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Route untuk Dashboard (Setelah Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
});
Route::get('/dashboard', function () {
    // return view('dashboard');
})->name('dashboard');
Route::get('/dashboard/index', [UserController::class, 'index'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Default Route Fallback
|--------------------------------------------------------------------------
*/

// Fallback jika URL tidak ditemukan
Route::fallback(function () {
    return view('login'); // Pastikan Anda memiliki file 404.blade.php di folder views
});

// Menampilkan form registrasi
Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi');

// Menangani registrasi
Route::post('/registrasi', [AuthController::class, 'registrasi']);


// PKM MAHASISWA
Route::get('/upload-pkm', [PkmProcessController::class,'create'])->name('upload-pkm');

Route::put('/upload-pkm', [PkmProcessController::class,'create'])->name('pkm.submit');

Route::post('/upload-pkm', [ PkmProcessController::class, 'store'])->name('pkm.submit');

Route::get('/dashboard', [PkmProcessController::class,'index'])->name('pkm.dashboard');

Route::get('/nilaiReviewer', function () {
    return view('nilaiReviewer');
})->name('nilaiReviewer');



Route::get('/data-anggota', function () {
    return view('data_anggota');
})->name('data_anggota');


Route::post('/data-anggota/submit', function () {
    return back()->with('success', 'Data berhasil disimpan!');
})->name('data_anggota.submit');



// REVIEWER
Route::get('/reviewer', [ReviewerController::class,'index'])->name('reviewer.dashboard');
Route::post('/reviewer', [ReviewerController::class,'store'])->name('reviewer.store');
Route::put('/reviewer', [ReviewerController::class,'update'])->name('reviewer.store');
Route::get('/nilai-reviewer', [ReviewerController::class,'show'])->name('nilai-reviewer');
Route::get('/dataAnggotadiAdmin', function () {
    return view('dataAnggotadiAdmin');
});








Route::resource('users', UserController::class);


// Route::middleware(['role:admin'])->group(function () {
// });

Route::get('/logout', function () {
    Auth::logout(); 
    return redirect('/login');
})->name('logout');



// // Route untuk halaman Pengajuan Usulan
Route::get('/pkm', function () {
    return view('index');
})->name('pkm.show');


// Route untuk logout (bisa diarahkan ke halaman login)
Route::get('/logout', function () {
    // Proses logout (contoh redirect ke halaman login)
    return redirect('/login');
})->name('logout');

