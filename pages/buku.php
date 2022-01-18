<?php 
session_start();
require 'functions.php';
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
    <link rel="stylesheet" href="../assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/remixicon.css">
    <link rel="stylesheet" href="../assets/vendor/swiper/swiper-bundle.min.css">
    <!--css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <!-- icon pada title -->
    <link rel="icon" href="../assets/img/book-reader.svg">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>

<body>
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="../index.php">Bukuku</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                    <?php if (isset($_SESSION["login"])) {
                        echo "<a href='logout.php' onclick='return confirm(`Apakah Anda yakin untuk logout ?`)'><img src='../assets/img/user.png' class='rounded-circle' width='30px'></a>";
                    } else {
                        echo "<a class='getstarted scrollto' href='login.php'>Sign In</a>";
                    }?>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header><br><br>
    <section id="Library" class="portfolio">
        <div class="container" data-aos="fade-up">
            <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="50">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-Novel">Novel</li>
                <li data-filter=".filter-Sejarah">Sejarah</li>
                <li data-filter=".filter-Pendidikan">Pendidikan</li>
                <li data-filter=".filter-Filosofi">Filosofi</li>
            </ul>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach( $buku as $row) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-Novel">
                    <div class="portfolio-img"><img src="../assets/img/cover/<?= $row['cover'] ?>" class="img-fluid" alt=""></div>
                    <div class="portfolio-info">
                        <h4><?= $row['jdl'] ?></h4>
                        <p><?= $row['pngrng'] ?></p>
                        <a href="../assets/img/cover/<?= $row['cover'] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Garis Waktu"><i
                                class="bx bx-plus"></i></a>
                        <a href="../assets/img/file/<?= $row['fileBuku'] ?>" class="details-link" title="Download File"><i
                                class="bi bi-download"></i></a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <footer id="footer">
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
        </div>
    </footer>
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>