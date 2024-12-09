@extends('layouts.index')

@section('title', 'Alur PKM Mahasiswa')

@push('styles')
<style>
    .header {
        text-align: center;
        margin: 30px 0;
    }
    .header h2 {
        font-size: 24px;
        color: #white;
    }
    .step-container {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .step-icon {
        font-size: 24px;
        padding: 10px;
        color: white;
        text-align: center;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }
    .step-text {
        margin-left: 15px;
        flex-grow: 1;
    }
    .step-text h5 {
        margin: 0;
        font-size: 18px;
        color: #338CD6;
    }
    .step-text p {
        margin: 0;
        font-size: 14px;
        color: #555;
    }
    .icon-1 { background-color: #FF5733; }
    .icon-2 { background-color: #C70039; }
    .icon-3 { background-color: #1ABC9C; }
    .icon-4 { background-color: #3498DB; }
    .icon-5 { background-color: #FFC300; }
    .icon-6 { background-color: #2C3E50; }
    .jenis-pkm {
        margin-top: 30px;
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .jenis-pkm h5 {
        font-weight: bold;
        color: #338CD6;
        margin-bottom: 10px;
    }
    .jenis-pkm ul {
        padding-left: 20px;
    }
    .jenis-pkm li {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }
</style>
@endpush

@section('content')
<div class="header">
    <h2>Alur Sistem Informasi PKM Mahasiswa Polindra</h2>
</div>

<div class="step-container">
    <div class="step-icon icon-1">1</div>
    <div class="step-text">
        <h5>Registrasi / Upload</h5>
        <p>20 - 31 Desember 2024</p>
    </div>
</div>

<div class="step-container">
    <div class="step-icon icon-2">2</div>
    <div class="step-text">
        <h5>Bimbingan PKM</h5>
        <p>01 Januari - 15 Februari 2025</p>
    </div>
</div>

<div class="step-container">
    <div class="step-icon icon-3">3</div>
    <div class="step-text">
        <h5>Reviewer</h5>
        <p>16 Februari - 20 Februari 2025</p>
    </div>
</div>

<div class="step-container">
    <div class="step-icon icon-4">4</div>
    <div class="step-text">
        <h5>TTD Kaprodi</h5>
        <p>20 Februari - 29 Februari 2025</p>
    </div>
</div>

<div class="step-container">
    <div class="step-icon icon-5">5</div>
    <div class="step-text">
        <h5>Kemahasiswaan</h5>
        <p>05 Maret - 10 Maret 2025</p>
    </div>
</div>

<div class="step-container">
    <div class="step-icon icon-6">6</div>
    <div class="step-text">
        <h5>Simbelmawa</h5>
        <p>01 April - 05 April 2025</p>
    </div>
</div>

<div class="jenis-pkm">
    <h5>Jenis Program Kreatifitas Mahasiswa</h5>
    <ul>
        <li>PKM Riset Eksakta (PKM-RE)</li>
        <li>PKM Riset Sosial Humaniora (PKM-RSH)</li>
        <li>PKM Pengabdian kepada Masyarakat (PKM-PM)</li>
        <li>PKM Kewirausahaan (PKM-K)</li>
        <li>PKM Artikel Ilmiah (PKM-AI)</li>
        <li>PKM Karya Inovatif (PKM-KI)</li>
        <li>PKM Karsa Cipta (PKM-KC)</li>
        <li>PKM Video Gagasan Konstruktif (PKM-VGK)</li>
        <li>PKM Gagasan Futuristik Tertulis (PKM-GFT)</li>
        <li>PKM Prototipe Inovatif (PKM-PI)</li>
    </ul>
</div>
@endsection
