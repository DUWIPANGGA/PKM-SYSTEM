<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="innovana">INNOVANA</a>
        </div>
    </nav>

    <div class="content-wrapper" style="overflow-x: hidden">
        <div class="sidebar">
            <img src="{{ asset('LogoOrang.jpg') }}" alt="Profile Image">
            <h4>{{ Auth::user()->role }}</h4>
            <p>{{ Auth::user()->name }}</p>
            <div class="menu">
                <h3>MENU</h3>
                <a href="{{ route('pkm.dashboard') }}">
                    <i class="fas fa-book"></i> Dashboard
                </a>
                <a href="{{ route('upload-pkm') }}">
                    <i class="fas fa-paper-plane"></i> Pengajuan Usulan
                </a>
                <a href="{{ route('nilai-reviewer') }}">
                    <i class="fas fa-check"></i> Nilai Reviewer
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-primary"> <i class="fas fa-user"></i>User Manager</a>

                <a href="{{ route('logout') }}">Keluar</a>
            </div>
        </div>
        <div class="content" style="overflow-x: scroll">
            @yield('content')
        </div>
    </div>
</body>
</html>
