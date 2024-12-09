@extends('layouts.index')

@section('title', 'Menu PKM')

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
                <p>Pedoman PKM</p>
            </a>
            <a href="{{ url('/PanduanPkm') }}" class="menu-item">
                <img src="{{ asset('PanduanPkm.jpg') }}" alt="Panduan PKM">
                <p>Panduan PKM</p>
            </a>
            <a href="{{ url('/Login') }}" class="menu-item">
                <img src="{{ asset('PengajuanProposal.jpg') }}" alt="Pengajuan Proposal">
                <p>Login</p>
            </a>
        </div>
    </div>
@endsection
