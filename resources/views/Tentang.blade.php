<!-- resources/views/tentang.blade.php -->
@extends('layouts.index')

@section('title', 'Tentang PKM')

@push('styles')
<style>
    .content-container {
        padding: 50px;
        color: #fff;
    }
    .content-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
    .content-text {
        font-size: 18px;
        line-height: 1.6;
        text-align: justify;
    }
</style>
@endpush

@section('content')
    <div class="container content-container">
        <h1 class="content-title">Apa itu PKM?</h1>
        <p class="content-text">
            Program Kreativitas Mahasiswa (PKM) adalah salah satu inisiatif yang dirancang oleh Direktorat Jenderal Pendidikan Tinggi 
            untuk mendorong mahasiswa dalam mengembangkan inovasi, kreativitas, dan kemandirian di berbagai bidang. Melalui PKM, 
            mahasiswa diberi kesempatan untuk mengimplementasikan pengetahuan akademis ke dalam proyek-proyek nyata yang berpotensi 
            memberikan dampak positif bagi masyarakat.
        </p>
        <a class="navbar-brand" href="#">
            <img src="{{ asset('mengapapkm.png') }}" alt="Mengapa PKM?" width="650">
        </a>
    </div>
@endsection
