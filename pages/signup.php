<?php 
session_start();
if (isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
}

require 'functions.php';
// cek tombol submit
if (isset($_POST["register"])) {
    // cek berhasil
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil ditambahkan');
            document.location.href = 'login.php'; 
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            <h1 class="text-start fw-bold">Create Account</h1>
            <h6 class="mb-4 text-start">Already have an account? <a class="link-primary" href="login.html">Login</a></h6>
            <div class="form-floating">
                <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="name" required autocomplate="off">
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="inputNIM" id="inputNIM" placeholder="nim" required autocomplate="off">
                <label for="inputNIM">NIM</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="name@example.com" required autocomplate="off">
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required autocomplate="off">
                <label for="inputPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="inputWhatsapp" id="inputWhatsapp" placeholder="whatsapp" required autocomplate="off">
                <label for="inputWhatsapp">No. Whatsapp</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="inputAlamat" id="inputAlamat" placeholder="alamat" required></textarea>
                <label for="inputAlamat">Alamat Lengkap</label>
            </div>
            <div class="form-floating">
                <select name="inputProdi" id="inputProdi" class="form-select" aria-label="Floating label select example">
                    <option selected disabled>Pilih Program Studi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Agroteknologi">Agroteknologi</option>
                    <option value="Teknologi Pangan">Teknologi Pangan</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                </select>
                <label for="inputProdi">Program Studi</label>
            </div>
            <div class="row text-start mt-3">
                <h6>Jenis Kelamin</h6>
                <div class="col-6 form-check">
                    <input type="radio" name="inputGender" id="genderL" value="L">
                    <label for="genderL">Laki-laki</label>
                </div>
                <div class="col-6 form-check">
                    <input type="radio" name="inputGender" id="genderP" value="P">
                    <label for="genderP">Perempuan</label>
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="register">Sign up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | BUKUKU</p>
        </form>
    </main>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
</body>

</html>