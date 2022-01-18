<?php
session_start();
require 'pages/functions.php';
$buku = query("SELECT * FROM buku");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKUKU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- vendor -->
    <link rel="stylesheet" href="assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <!--css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- icon pada title -->
    <link rel="icon" href="assets/img/book-reader.svg">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">Bukuku</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#Library">Library</a></li>
                    <li>
                    <?php if (isset($_SESSION["login"])) {
                        echo "<a href='pages/logout.php' onclick='return confirm(`Apakah Anda yakin untuk logout ?`)'><img src='assets/img/user.png' class='rounded-circle' width='30px'></a>";
                    } else {
                        echo "<a class='getstarted scrollto' href='pages/login.php'>Sign In</a>";
                    }?>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>PERPUSTAKAAN INFORMATIKA 3B1</h1>
                    <h2>Membaca adalah Teman Terbaik</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="" class="btn-get-started scrollto">Eksplore</a>
                        <a href="https://youtu.be/fsoSXrcEb1k" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets/img/hero.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        Perpustakaan Online adalah perpustakaan yang mempunyai koleksi buku sebagian besar dalam bentuk format digital dan yang bisa diakses dengan komputer maupun Hp. Jenis perpustakaan ini berbeda dengan jenis perpustakaan konvensional yang berupa kumpulan buku tercetak. Untuk Hak cipta pada dokumen yang didigitalkan yang berupa mengubah dokumen menjadi digital dokumen, memasukkan digital dokumen ke database, mengubah digital dokumen ke hypertext dokumen.
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Hak cipta dokumen di jaringan komunikasi. Solusi masalah hak cipta telah dikembangkan dalam ECSM (Electronic Copyright Management System) yaitu sistem monitoring penggunaan digital dokumen oleh pengguna secara otomatis.
                    </p>
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>

        </div>
    </section>

    <section id="Library" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Library</h2>
                <p>A book is a collection of paper or other material that is tied together at one end and contains writing, pictures, or patches. Each side of a sheet of paper in a book is called a page. 
                    <a href="pages/buku.php">More Book</a>
                </p>
            </div>

            <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-antalogi">Antalogi</li>
                <li data-filter=".filter-fiksi">Fiksi</li>
                <li data-filter=".filter-non-fiksi">Non-Fiksi</li>
            </ul>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach( $buku as $row) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-Novel">
                    <div class="portfolio-img"><img src="assets/img/cover/<?= $row['cover'] ?>" class="img-fluid" alt=""></div>
                    <div class="portfolio-info">
                        <h4><?= $row['jdl'] ?></h4>
                        <p><?= $row['pngrng'] ?></p>
                        <a href="assets/img/cover/<?= $row['cover'] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Garis Waktu"><i
                                class="bx bx-plus"></i></a>
                        <a href="assets/img/file/<?= $row['fileBuku'] ?>" class="details-link" title="Download File"><i
                                class="bi bi-download"></i></a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
    </section>
    <footer id="footer">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Bukuku</h4>
                        <p>Jadilah bagian dari anggota bukuku </p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Bukuku</h3>
                        <p>
                            Jl. Raya Gelam No.250, Pagerwaja, Gelam, Kec. Candi, Kab. Sidoarjo <br>
                            Jawa Timur, 61271<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> +62-31-8945444<br>
                            <strong>Email:</strong> sekretariat@umsida.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Library</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4></h4>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Aplikasi yang tersedia diakun kami:</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Bukuku</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">Bootstrap</a>
            </div>
        </div>
    </footer>


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>