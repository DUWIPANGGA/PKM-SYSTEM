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
    <div class="container content-container p-10" style="height:100vh; padding-top:10%; height:100%;overflow-y:scroll;">
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
        <div class="container">
            <header>
              <h1>Program Kreativitas Mahasiswa (PKM)</h1>
              <p>Wadah untuk mahasiswa mengembangkan ide kreatif yang berdampak nyata!</p>
            </header>
          
            <section id="about">
              <h2>Apa itu PKM?</h2>
              <p>PKM adalah program yang dirancang untuk membantu mahasiswa mengembangkan ide kreatif di berbagai bidang, mulai dari penelitian hingga aksi sosial.</p>
            </section>
          
            <section id="why-join">
              <h2>Kenapa Kamu Harus Ikut?</h2>
              <ul>
                <li><strong>Dukungan Dana:</strong> Bantu mewujudkan ide kreatifmu.</li>
                <li><strong>Pengalaman Tim:</strong> Kerja bareng teman untuk belajar lebih banyak.</li>
                <li><strong>Ajang Nasional:</strong> Tunjukkan karya terbaikmu di PIMNAS.</li>
              </ul>
            </section>
          
            <section id="categories">
              <h2>Bidang yang Bisa Kamu Pilih</h2>
              <ul>
                <li>Penelitian (PKM-P)</li>
                <li>Kewirausahaan (PKM-K)</li>
                <li>Pengabdian Masyarakat (PKM-M)</li>
                <li>Karsa Cipta (PKM-KC)</li>
                <li>Artikel Ilmiah (PKM-AI)</li>
              </ul>
            </section>
          
            <footer>
              <p>Jadilah bagian dari perubahan! Ikuti PKM sekarang.</p>
            </footer>
          </div>
          
    </div>
@endsection
