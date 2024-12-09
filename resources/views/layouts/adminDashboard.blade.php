<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            height: 100vh;
        }
        .navbar {
            background-color: #007bff;
            color: white;
        }
        .navbar-brand {
            color: black;
            font-weight: bold;
            text-decoration: none;
        }
        .sidebar {
            width: 250px;
            background-color: #233023;
            color: white;
            padding: 20px;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .photo-container {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Jarak antar elemen */
        }
        .photo-item {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antara gambar dan teks */
        }
        .photo-item img {
            width: 60px; /* Lebar gambar */
            height: 60px; /* Tinggi gambar */
            border-radius: 50%; /* Membuat gambar menjadi lingkaran */
            object-fit: cover; /* Menyesuaikan isi gambar */
        }
        .content-wrapper {
            display: flex;
            flex: 1;
        }
        .content {
            flex: 1;
            padding: 20px 40px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="innovana">INNOVANA</a>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="sidebar">
            <!-- Foto Toga dengan teks PKM POLINDRA -->
            <div class="photo-container">
                <div class="photo-item">
                    <img src="{{ asset('toga.jpg') }}" alt="Foto Toga">
                    <span>PKM POLINDRA</span>
                </div>
                <!-- Foto Orang dengan teks Admin -->
                <div class="photo-item">
                    <img src="{{ asset('LogoOrang.jpg') }}" alt="Foto Orang">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>
            
            <!-- Informasi Sidebar -->
            <br><br>
            <h3>MENU</h3>
            <a href="dashboard">Beranda</a>
            <a href="dataAnggotadiAdmin">Data PKM</a>
            <a href="{{ url('/logout') }}">Keluar</a>   
        </div>

        <!-- Konten Utama -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
