<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// cek admin
if ($_SESSION["usertype"] == 0) {
    echo "<script>
        alert('Maaf Anda bukan Admin');
        document.location.href = '../index.php'; 
    </script>";
    exit;
}

require 'functions.php';
$buku = query("SELECT * FROM buku");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $buku = cariBuku($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- icon pada title -->
    <link rel="icon" href="../assets/img/book.svg">
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
                    <a href="../pages/login.php">
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
            <h3><i class="fas fa-user me-2"></i> DATA BUKU</h3><hr>
            <div class="row">
                <div class="col-6">
                    <a href="../pages/addBuku.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> TAMBAH BUKU
                    </a>
                </div>
                <div class="col-6">
                    <form action="" method="post" class="d-flex">
                        <input class="form-control ms-5 me-2" type="search" name="keyword" placeholder="Search" autocomplate="off" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
                    </form>
                </div>
            </div>
            
            <!-- Tabel Data -->
            <table class="table table-striped table-responsive-md align-middle">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach( $buku as $row) : ?>
                        <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $row["jdl"] ?></td>
                        <td><?= $row["pngrng"] ?></td>
                        <td><?= $row["terbit"] ?></td>
                        <td class="text-center">
                            <a href="update.php?idBuku=<?= $row["idBuku"] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?idBuku=<?= $row["idBuku"] ?>" class="btn btn-danger ms-1" onclick="return confirm('Apakah Anda yakin menghapus buku ini ?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- End Tabel Data -->
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>