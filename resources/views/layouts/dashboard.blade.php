<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNOVANA-@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopolindra.png ') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            width: 300px;
            background-color: #233023;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            align-items: center;
        }

        .sidebar img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .sidebar h4 {
            font-size: 14px;
            font-weight: normal;
            margin: 5px 0;
        }

        .sidebar p {
            font-size: 12px;
            margin-bottom: 20px;
        }

        .menu {
            width: 100%;
        }

        .menu a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #344034;
        }

        .menu a i {
            font-size: 18px;
            margin-right: 10px;
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

<body style="overflow-x: hidden">
    {{-- <nav class="navbar navbar-expand-lg pl-2">
            <img src="{{ asset('LogoPolindra.png') }}" alt="Logo" width="50">
        <div class="container-fluid">
            <a class="navbar-brand" href="innovana">INNOVANA</a>
        </div>
    </nav> --}}

    <div class="content-wrapper" style="overflow-x: hidden ">
    <div class="sidebar" id="sidebar" style="display: block;">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('LogoOrang.jpg') }}" alt="Profile Image"
                style="width: 70px; height: 70px; border-radius: 50%;">
            <h4 class="ms-3">{{ Auth::user()->name }}</h4>
            <p class="ms-3">{{ Auth::user()->role }}</p>
        </div>
        <div class="menu">
            <h3>MENU</h3>
            <a href="{{ route('pkm.dashboard') }}" class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('pkm.information') }}" class="menu-item {{ request()->is('information') ? 'active' : '' }}">
                <i class="fas fa-book"></i> Informasi
            </a>
            <a href="{{ route('upload-pkm') }}" class="menu-item {{ request()->is('upload-pkm') ? 'active' : '' }}">
                <i class="fas fa-paper-plane"></i> Pengajuan Usulan
            </a>
            <a href="{{ route('nilai-reviewer') }}" class="menu-item {{ request()->is('nilai-reviewer') ? 'active' : '' }}">
                <i class="fas fa-check"></i> Nilai Reviewer
            </a>
            @if(Auth::user()->role == 'admin') 
            <a href="{{ route('users.index') }}" class="menu-item {{ request()->is('users/index') ? 'active' : '' }} btn">
                <i class="fas fa-user"></i>User Manager
            </a>
            @endif
            @if(Auth::user()->role == 'reviewer') 
            <a href="{{ route('reviewer.dashboard') }}" class="menu-item {{ request()->is('users/index') ? 'active' : '' }} btn">
                <i class="fas fa-bookmark"></i>reviewer
            </a>
            @endif

            <a href="{{ route('logout') }}" class="menu-item">
                <i class="fas fa-door-open"></i>
                Keluar</a>
        </div>
    </div>
    <div class="content" style="overflow-x: scroll">
        <button class="btn btn-primary" id="toggle-sidebar" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        @yield('content')
    </div>
</div>

<style>
    .menu-item {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #344034;
    }

    .menu-item.active {
        background-color: #2ecc71;
    }

    .menu-item i {
        font-size: 18px;
        margin-right: 10px;
    }
</style>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        }
    </script>
</body>

</html>
