<?php 
session_start();
if ($_SESSION["usertype"] == 0) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
$jmlMember = user("SELECT COUNT(status) AS total FROM member WHERE status=0");
$jmlAdmin = user("SELECT COUNT(status) AS total FROM member WHERE status=1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- icon pada title -->
    <link rel="icon" href="../assets/img/tachometer-alt.svg">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../pages/dashboard.php">WELCOME ADMIN | <span class="fw-bold">BUKUKU</span></a>
            <div class="notif">
                <h5>                    
                    <a href="#">
                        <i class="text-white fas fa-envelope mx-2 data-bs-toggle=" tooltip" data-bs-placement="bottom"
                        title="Pesan"></i>
                    </a>
                    <a href="#">
                        <i class="text-white fas fa-bell mx-2 data-bs-toggle=" tooltip" data-bs-placement="bottom" title="Notifikasi""></i>
                    </a>
                    <a href="../pages/logout.php">
                        <i class="text-white fas fa-sign-out-alt mx-2 data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Sign out""></i>
                    </a>
                </h5>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="row mt-5 g-0">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark mt-2 pt-4 ps-3">
            <ul class="sidebar nav flex-column ms-3 mb-5">
                <li class="nav-items">
                    <a href="../pages/dashboard.php" class="nav-link text-white">
                        <i class="fas fa-tachometer-alt me-2"></i> Dasboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-items">
                    <a href="../pages/dataMember.php" class="nav-link text-white">
                        <i class="fas fa-user me-2"></i> Daftar Member
                    </a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-items">
                    <a href="../pages/dataBuku.php" class="nav-link text-white">
                       <i class="fas fa-book me-2"></i> Daftar Buku
                    </a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="col-md-10 p-5 pt-5">
            <h3><i class="fas fa-tachometer-alt me-2"></i> DASHBOARD</h3><hr>
            <!-- Card -->
            <div class="row text-white justify-content-evenly">
                <div class="card bg-danger mt-2" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h5 class="card-title">PENGUNJUNG</h5>
                        <div class="display-4 fw-bold">1.200</div>
                        <a href="#" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
                    </div>
                </div>
                <div class="card bg-success mt-2" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h5 class="card-title">DOWNLOAD BUKU</h5>
                        <div class="display-4 fw-bold">136</div>
                        <a href="../pages/data_buku.php" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
                    </div>
                </div>
                <div class="card bg-info mt-2" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="card-title">MEMBERSHIP</h5>
                        <div class="display-4 fw-bold"><?= $jmlMember ?></div>
                        <a href="../pages/data_member.php" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
                    </div>
                </div>
                <div class="card bg-warning mt-2" style="width: 18rem;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user-lock"></i>
                        </div>
                        <h5 class="card-title">ADMIN</h5>
                        <div class="display-4 fw-bold"><?= $jmlAdmin ?></div>
                        <a href="../pages/data_member.php" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ms-2"></i></p></a>
                    </div>
                </div>
            </div>
            <!-- End Card -->
            <!-- Grafik -->
            <div class="mt-5" style="height: 50%;">
                <h4 class="text-center">Data Download Buku</h4>
                <canvas id="myChart"></canvas>
            </div>
            <!-- End Grafik -->
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/Chart.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>