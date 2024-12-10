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

// Fallback jika URL tidak ditemukan
Route::fallback(function () {
    return view('login'); // Pastikan Anda memiliki file 404.blade.php di folder views
});

// Menampilkan form registrasi
Route::get('/registrasi', [AuthController::class, 'showRegistrationForm'])->name('registrasi');

// Menangani registrasi
Route::post('/registrasi', [AuthController::class, 'registrasi']);


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
    Route::get('/dashboard/index', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', function () {
        // return view('dashboard');
    })->name('dashboard');
    // PKM MAHASISWA
    Route::get('/upload-pkm', [PkmProcessController::class, 'create'])->name('upload-pkm');

    Route::put('/upload-pkm', [PkmProcessController::class, 'create'])->name('pkm.submit');

    Route::post('/upload-pkm', [PkmProcessController::class, 'store'])->name('pkm.submit');

    Route::get('/dashboard', [PkmProcessController::class, 'index'])->name('pkm.dashboard');
    Route::get('/pkm', function () {
        return view('index');
    })->name('pkm.show');
});

Route::middleware(['reviewer'])->group(function () {
    Route::get('/nilaiReviewer', function () {
        return view('nilaiReviewer');
    })->name('nilaiReviewer');
    // REVIEWER
    Route::get('/reviewer', [ReviewerController::class, 'index'])->name('reviewer.dashboard');
    Route::post('/reviewer', [ReviewerController::class, 'store'])->name('reviewer.store');
    Route::put('/reviewer', [ReviewerController::class, 'update'])->name('reviewer.store');
    Route::get('/nilai-reviewer', [ReviewerController::class, 'show'])->name('nilai-reviewer');
    Route::get('/dataAnggotadiAdmin', function () {
        return view('dataAnggotadiAdmin');
    });
});



Route::middleware(['admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');





Route::get('/logout', function () {
    return redirect('/login');
})->name('logout');
