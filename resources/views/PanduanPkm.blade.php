@extends('layouts.index')

@section('title', 'Panduan PKM')

@section('content')
<div class="container">
    <h1>Panduan PKM</h1>

    <!-- Tombol untuk mengunduh PDF -->
    <a href="{{ asset('Panduan-Umum-PKM-2024.pdf') }}" class="btn btn-primary mb-3" target="_blank">
        Unduh Panduan PKM
    </a>

    <br>

    <div class="pdf-viewer mb-3">
        <iframe src="{{ asset('Panduan-Umum-PKM-2024.pdf') }}" width="100%" height="700px" style="border: none;">
            Browser Anda tidak mendukung tampilan PDF. Silakan unduh file PDF dengan mengklik link di atas.
        </iframe>
    </div>
</div>
@endsection
