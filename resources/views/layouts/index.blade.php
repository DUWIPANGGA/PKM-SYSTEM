<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #338CD6;
        }

        nav .navbar-nav .nav-link {
            color: red;
            margin-top: 5px;
        }

        /* .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .footer .footer-text {
            color: red;
            font-size: 16px;
        } */
       .main-container{
    background-image: url(/img/polindra-bg.png);
    background-repeat: no-repeat;
    background-size: cover;
    filter: brightness(0.7);
}
    </style>
    @stack('styles')
</head>

<body>
    <!-- Navbar -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    {{-- <div class="container-fluid  p-0"> --}}
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><img src="/img/polindra.png " alt=""></i>PKM</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 mt-5">
                {{-- <a href="" class="nav-item nav-link active">Home</a>
                    <a href="" class="nav-item nav-link">About</a>
                    <a href="" class="nav-item nav-link">Services</a>
                    <a href="" class="nav-item nav-link">Packages</a>
                    <a href="" class="nav-item nav-link">Blog</a> --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('PanduanPkm') }}" class="dropdown-item">PanduanPkm</a>
                        <a href="{{ route('AlurSistemPkm') }}" class="dropdown-item">Alur sistem</a>
                        <a href="{{ route('Kontak') }}" class="dropdown-item">contact</a>
                        <a href="{{ route('Tentang') }}" class="dropdown-item">about</a>
                    </div>
                </div>
                {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
                @if (Route::has('login'))
                    <div class="nav-item center ">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid main-container">
        @yield('content')
    </div>
    {{-- <footer style="position: absolute; bottom: 0; width: 100%; background-color:#f8f9fa">
        <div class="container-fluid">
            <p class="footer-text">Pendaftaran PKM telah dibuka sampai 20 November 2024</p>
        </div>
    </footer> --}}
    {{-- </div> --}}
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
