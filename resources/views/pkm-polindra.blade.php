<!-- resources/views/pkm.blade.php -->
@extends('layouts.index')

@section('title', 'Menu PKM')

@push('styles')
<style>
    .menu-container {
        padding: 50px 0;
        text-align: center;
    }
    .menu-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .menu-icons {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    .menu-item {
        width: 150px;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .menu-item:hover {
        transform: scale(1.05);
    }
    .menu-item img {
        width: 50px;
        margin-bottom: 10px;
    }
</style>
@endpush

@section('content')
    <div class="menu-container">
        <h1 class="menu-title">Menu PKM</h1>
        <div class="menu-icons">
            <a href="{{ url('/AlurSistemPkm') }}" class="menu-item">
                <img src="{{ asset('AlurSistemPkm.jpg') }}" alt="Alur Sistem PKM">
                <p>Alur Sistem PKM</p>
            </a>
            <a href="{{ url('/PedomanPkm') }}" class="menu-item">
                <img src="{{ asset('PedomanPkm.jpg') }}" alt="Pedoman PKM">
                <p>Pedoman PKM Terbaru</p>
            </a>
            <a href="{{ url('/Login') }}" class="menu-item">
                <img src="{{ asset('PengajuanProposal.jpg') }}" alt="Pengajuan Proposal">
                <p>Login</p>
            </a>
        </div>
    </div>
@endsection
