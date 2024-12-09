<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PkmController extends Controller
{

    public function beranda() {
        return view('Beranda');
    }

    public function tentang() {
        return view('Tentang');
    }

    public function kontak() {
        return view('Kontak');
    }

    public function alurSistem() {
        return view('AlurSistemPkm');
    }

    public function pedoman() {
        return view('PedomanPkm');
    }

    public function panduan() {
        return view('PanduanPkm');
    }

    public function login() {
        return view('Login');
    }

    public function registrasi(Request $request){
        
    }
    
}

