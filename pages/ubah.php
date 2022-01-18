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
// ambil data dari URL
$id = $_GET["idMember"];
// query data member berdasarkan id
$mhs = query("SELECT * FROM member WHERE idMember = $id")[0];

// cek tombol submit
if (isset($_POST["submit"])) {
    // cek berhasil
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil diubah');
            document.location.href = '../pages/dataMember.php'; 
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal diubah');
            document.location.href = '../pages/dataMember.php'; 
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
    <title>Update Data Member</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- icon pada title -->
    <link rel="icon" href="../assets/img/user-edit.svg">
</head>

<body class="signin text-center">
    <main class="form-signin">
        <form action="" method="post">
            <h3 class="text-start fw-bold mb-4">Update Data Member</h3>
            <input type="hidden" name="id" value="<?= $mhs['idMember'] ?>">
            <div class="form-floating">
                <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="name" required autocomplate="off" value="<?= $mhs['namaMember'] ?>">
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="inputNIM" id="inputNIM" placeholder="nim" required autocomplate="off" value="<?= $mhs['nim'] ?>">
                <label for="inputNIM">NIM</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="name@example.com" required autocomplate="off" value="<?= $mhs['email'] ?>">
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required autocomplate="off" value="<?= $mhs['pass'] ?>">
                <label for="inputPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="inputWhatsapp" id="inputWhatsapp" placeholder="whatsapp" required autocomplate="off" value="<?= $mhs['noWa'] ?>">
                <label for="inputWhatsapp">No. Whatsapp</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="inputAlamat" id="inputAlamat" placeholder="alamat" required><?= $mhs['alamat'] ?></textarea>
                <label for="inputAlamat">Alamat Lengkap</label>
            </div>
            <div class="form-floating">
                <select name="inputProdi" id="inputProdi" class="form-select" aria-label="Floating label select example">
                    <option disabled>Pilih Program Studi</option>
                    <option <?php if ($mhs['prodi'] == 'Informatika') { echo "selected"; }?> value="Informatika">Informatika</option>
                    <option <?php if ($mhs['prodi'] == 'Teknik Industri') { echo "selected"; }?> value="Teknik Industri">Teknik Industri</option>
                    <option <?php if ($mhs['prodi'] == 'Teknik Mesin') { echo "selected"; }?> value="Teknik Mesin">Teknik Mesin</option>
                    <option <?php if ($mhs['prodi'] == 'Teknik Elektro') { echo "selected"; }?> value="Teknik Elektro">Teknik Elektro</option>
                    <option <?php if ($mhs['prodi'] == 'Agroteknologi') { echo "selected"; }?> value="Agroteknologi">Agroteknologi</option>
                    <option <?php if ($mhs['prodi'] == 'Teknologi Pangan') { echo "selected"; }?> value="Teknologi Pangan">Teknologi Pangan</option>
                    <option <?php if ($mhs['prodi'] == 'Teknik Sipil') { echo "selected"; }?> value="Teknik Sipil">Teknik Sipil</option>
                </select>
                <label for="inputProdi">Program Studi</label>
            </div>
            <div class="row text-start mt-3">
                <h6>Jenis Kelamin</h6>
                <div class="col-6 form-check">
                    <input type="radio" name="inputGender" id="genderL" value="L" <?php if ($mhs['jnsKlmn'] == 'L') { echo "checked"; }?>>
                    <label for="genderL">Laki-laki</label>
                </div>
                <div class="col-6 form-check">
                    <input type="radio" name="inputGender" id="genderP" value="P" <?php if ($mhs['jnsKlmn'] == 'P') { echo "checked"; }?>>
                    <label for="genderP">Perempuan</label>
                </div>
            </div>
            <div class="row text-start mt-3">
                <h6>Status</h6>
                <div class="col-6 form-check">
                    <input type="radio" name="status" id="status0" value="0" <?php if ($mhs['status'] == '0') { echo "checked"; }?>>
                    <label for="status0">Member</label>
                </div>
                <div class="col-6 form-check">
                    <input type="radio" name="status" id="status1" value="1" <?php if ($mhs['status'] == '1') { echo "checked"; }?>>
                    <label for="status1">Admin</label>
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="submit">Update Data</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | BUKUKU</p>
        </form>
    </main>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
</body>

</html>