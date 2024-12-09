<!-- resources/views/pkm.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu PKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #338CD6;
        }
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
            background-color: #ffffff;
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
        nav .navbar-nav .nav-link {
            color: rgb(255, 255, 255);
            margin-top: 5px;
            font-weight: 700;
            
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .footer .navbar-brand img {
            width: 50px;
        }
        .footer-text {
            color: red;
            font-size: 16px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('LogoPolindra.png') }}" alt="Logo" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Beranda') }}" class="menu-item">
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Tentang') }}" class="menu-item">
                            <p>Tentang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Kontak') }}" class="menu-item">
                            <p>Kontak</p>
                        </a>
                    </li>
                    @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4" 
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}" 
                                        class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4" 
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                </ul>
            </div>
        </div>
    </nav>
<div class="container-fluid">
    

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
</div>

<footer class="footer" style="margin-top: 200px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <p class="footer-text">Pendaftaran PKM telah dibuka sampai 20 November 2024</p>
                </ul>
            </div>
        </div>
    </nav>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>