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
// cek tombol submit
if (isset($_POST["submit"])) {
    // cek berhasil
    if (addBuku($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data Berhasil ditambahkan');
            document.location.href = 'dataBuku.php'; 
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal ditambahkan');
            document.location.href = 'dataBuku.php'; 
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- icon pada title -->
    <link rel="icon" href="../assets/img/book.svg">
</head>

<body id="tambahBuku">
    <main class="form-signin bg-white rounded">
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="mb-5 fw-bold text-center">INPUT BUKU BARU</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="source-update" class="form-label text-start">Cover Buku</label>
                        <input class="form-control" type="file" name="inputCover" id="source-update" onchange="previewImageUpdate()">
                    </div>
                    <div>
                        <img alt="" class="img-fluid" id="preview-update">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputBuku" class="form-label text-start">Buku</label>
                        <input class="form-control" type="file" name="inputBuku" id="inputBuku">
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="inputJudul" id="inputJudul" placeholder="judul" required>
                        <label for="inputJudul">Judul Buku</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="inputPengarang" id="inputPengarang" placeholder="pengarang" required>
                        <label for="inputPengarang">Pengarang</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="inputTerbit" id="inputTerbit" placeholder="thn-terbit" required>
                        <label for="inputTerbit">Tahun Terbit</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-primary w-100 mt-3" type="submit" name="submit">UPLOAD</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2021 | BUKUKU</p>
        </form>
    </main>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>