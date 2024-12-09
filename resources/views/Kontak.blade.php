<!-- resources/views/kontak.blade.php -->
@extends('layouts.index')

@section('title', 'Kontak')

@push('styles')
<style>
    .content-container {
        padding: 50px 0;
        text-align: center;
        color: #f8f9fa;
    }
    .contact-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid content-container">
        <h1 class="contact-title">Kontak Kami</h1>
        <div class="mt-5">
            <h2>Informasi Kontak</h2>
            <p>Email Address: info@polindra.ac.id</p>
            <p>Phone Number: (0234) 5746464</p>
            <p>Contact Address: Jl. Raya Lohbener Lama No. 08 Indramayu 45252</p>
        </div>
    </div>
@endsection
