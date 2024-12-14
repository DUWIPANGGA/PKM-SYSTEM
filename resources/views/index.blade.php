<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>INNOVANA</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopolindra.png ') }}">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><img src="logopolindra.png " alt=""></i>INNOVANA</h1>
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

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/polindra-bg.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"> EXPLORE YOUR BRAIN TO BREAK THE LIMIT</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">PROGRAM KREATIVITAS MAHASISWA</h1>
                                    <p class="mb-5 fs-5">"Program Kreativitas Mahasiswa (PKM) adalah wadah bagi generasi muda untuk menciptakan solusi nyata, mengembangkan potensi diri, dan memberikan kontribusi positif bagi masyarakat. Bergabunglah sekarang dan jadilah bagian dari perubahan!" 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/polindra-bg2.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">PROGRAM KREATIVITAS MAHASISWA</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Berani Bermimpi, Berani Berkarya: Jadilah Inovator Muda Bersama PKM!</h1>
                                    <p class="mb-5 fs-5">Transformasikan ide-ide brilianmu menjadi solusi nyata bagi masyarakat. Program Kreativitas Mahasiswa (PKM) adalah langkah pertama menuju masa depan penuh inovasi dan prestasi!
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/polindra-bg3.png" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">PROGRAM KREATIVITAS MAHASISWA</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Dari Ide Kecil Menjadi Karya Besar: PKM Adalah Awal Perjalananmu!</h1>
                                    <p class="mb-5 fs-5">Apapun bidangmu, apapun passion-mu, Program Kreativitas Mahasiswa (PKM) adalah peluang emas untuk menciptakan perubahan yang berarti. 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        
        <!-- Navbar & Hero End -->


        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">PKM</h5>
                    <h1 class="mb-0">Macam Macam Program Kreatifitas Mahasiswa</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">PKM Riset (PKM-R)</h5>
                                        <p class="mb-0">Program ini bertujuan untuk mengembangkan budaya meneliti di kalangan mahasiswa. <br>
                                            Fokus: Riset dasar atau terapan.<br>
                                            Contoh: Eksperimen laboratorium, penelitian sosial, atau pengembangan teknologi baru.<br>
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-flask fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">PKM Kewirausahaan (PKM-K)</h5>
                                        <p class="mb-0">
                                            Ditujukan untuk mahasiswa yang memiliki jiwa bisnis dan ingin mengembangkan usaha kreatif. <br>

Fokus: Membentuk bisnis mandiri berbasis inovasi.<br>
Contoh: Produk fashion, makanan inovatif, atau aplikasi digital.<br>

                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-store fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">PKM Pengabdian kepada Masyarakat (PKM-PM)</h5>
                                        <p class="mb-0">Mahasiswa diajak untuk memberikan solusi kepada masyarakat melalui program pengabdian.<br>

                                            Fokus: Memberdayakan masyarakat atau kelompok tertentu.<br>
                                            Contoh: Pelatihan teknologi untuk petani, program literasi digital untuk UMKM.</p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-handshake-angle fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">PKM Penerapan Iptek (PKM-PI)</h5>
                                        <p class="mb-0">Mahasiswa menerapkan ilmu pengetahuan dan teknologi untuk menyelesaikan masalah nyata.<br>
                                            Fokus: Implementasi hasil riset ke dunia nyata.<br>
                                            Contoh: Alat bantu petani, sistem manajemen limbah.</p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cogs fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-lightbulb fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">PKM Gagasan Futuristik Konstruktif (PKM-GFK)</h5>
                                        <p class="mb-0">Mahasiswa diminta untuk merumuskan gagasan kreatif untuk menyelesaikan masalah di masa depan.<br>

                                            Fokus: Gagasan inovatif dan aplikatif untuk masa depan.<br>
                                            Contoh: Konsep kota pintar, energi terbarukan, transportasi berkelanjutan.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-tools fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">PKM Karya Inovatif (PKM-KI)</h5>
                                        <p class="mb-0">Program ini berfokus pada penciptaan karya yang kreatif dan inovatif.<br>

                                            Fokus: Produk atau layanan baru yang memberi manfaat besar.<br>
                                            Contoh: Desain alat kesehatan inovatif, aplikasi untuk pendidikan inklusif.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-file-alt fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">PKM Artikel Ilmiah (PKM-AI)</h5>
                                        <p class="mb-0">Mahasiswa mengembangkan keterampilan menulis ilmiah melalui publikasi karya tulis.<br>

                                            Fokus: Penulisan artikel berbasis penelitian atau gagasan.<br>
                                            Contoh: Artikel yang diterbitkan dalam jurnal ilmiah.
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-video fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">PKM Video Gagasan Konstruktif (PKM-VGK)</h5>
                                        <p class="mb-0">Mahasiswa menyampaikan gagasan atau solusi konstruktif dalam format video.<br>

                                            Fokus: Gagasan kreatif melalui visual yang menarik.<br>
                                            Contoh: Video kampanye perubahan perilaku, animasi edukasi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

        
        <!-- Subscribe Start -->
        <div class="container-fluid subscribe py-5">
            <div class="container text-center py-5">
                <div class="mx-auto text-center" style="max-width: 900px;">
                    <h5 class="subscribe-title px-3">Join US</h5>
                    <h1 class="text-white mb-4">Kesempatan Emas</h1>
                    <p class="text-white mb-5">Jangan lewatkan kesempatan untuk berkontribusi melalui PKM! Kembangkan potensi dan raih prestasi di tingkat nasional!
                    </p>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a href=""><i class="fas fa-home me-2"></i> 123 Street, New York, USA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">App</h4>
                            <a href="{{ route('Tentang') }}"><i class="fas fa-angle-right me-2"></i> Tentang</a>
                            <a href="{{ url('/AlurSistemPkm') }}"><i class="fas fa-angle-right me-2"></i> PKM</a>
                            <a href="{{ url('/PedomanPkm') }}"><i class="fas fa-angle-right me-2"></i> Pedoman</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href="{{ route('Kontak') }}"><i class="fas fa-angle-right me-2"></i> Contact</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">INNOVANA</a>,
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        Designed by <a class="text-white">Fazah</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
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