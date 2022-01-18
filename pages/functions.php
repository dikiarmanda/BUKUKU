<?php 
require 'koneksi.php';
// ambil data dari database
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// input member
function tambah($data) {
    global $conn;
    // ambil data dari input
    $nim = htmlspecialchars($data["inputNIM"]);
    $nama = htmlspecialchars($data["inputNama"]);
    $jnsKlmn = htmlspecialchars($data["inputGender"]);
    $alamat = htmlspecialchars($data["inputAlamat"]);
    $email = htmlspecialchars($data["inputEmail"]);
    $pass = mysqli_real_escape_string($conn, $data["inputPassword"]);
    $wa = htmlspecialchars($data["inputWhatsapp"]);
    $prodi = htmlspecialchars($data["inputProdi"]);

    // cek nim sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nim FROM member WHERE nim = '$nim'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('NIM sudah terdaftar');
        </script>";
    }

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO member
                VALUES
                ('', '$nim', '$nama', '$jnsKlmn', '$alamat', '$wa', '$email', '$pass', '$prodi', '')
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// jumlah user member dan admin
function user($data) {
    global $conn;
    $hitung = mysqli_query($conn, $data);
    $hasil = mysqli_fetch_assoc($hitung);
    return $hasil['total'];
}


function ubah($data) {
    global $conn;
    // ambil data dari input
    $id = htmlspecialchars($data["id"]);
    $nim = htmlspecialchars($data["inputNIM"]);
    $nama = htmlspecialchars($data["inputNama"]);
    $jnsKlmn = htmlspecialchars($data["inputGender"]);
    $alamat = htmlspecialchars($data["inputAlamat"]);
    $email = htmlspecialchars($data["inputEmail"]);
    $pass = mysqli_real_escape_string($conn, $data["inputPassword"]);
    $wa = htmlspecialchars($data["inputWhatsapp"]);
    $prodi = htmlspecialchars($data["inputProdi"]);
    $stat = htmlspecialchars($data["status"]);

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    
    $query = "UPDATE member SET 
                nim = '$nim',
                namaMember = '$nama',
                jnsKlmn = '$jnsKlmn',
                alamat = '$alamat', 
                noWa = '$wa',
                email = '$email',
                pass = '$pass',
                prodi = '$prodi',
                status = '$stat'
                WHERE idMember = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM member
                WHERE
                namaMember LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                status LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%'";
    return query($query);
}

function addBuku($data, $dok) {
    global $conn;
    // ambil data dari input
    $jdl = htmlspecialchars($data["inputJudul"]);
    $pngrng = htmlspecialchars($data["inputPengarang"]);
    $trbit = htmlspecialchars($data["inputTerbit"]);
    $cover = htmlspecialchars($dok["inputCover"]["name"]);
    $fileBuku = htmlspecialchars($dok["inputBuku"]["name"]);

    // pindah upload cover
    move_uploaded_file($dok["inputCover"]["tmp_name"], "../assets/img/cover/$cover");

    // pindah upload buku
    move_uploaded_file($dok["inputBuku"]["tmp_name"], "../assets/img/file/$fileBuku");

    $query = "INSERT INTO buku
                VALUES
                ('', '$jdl', '$pngrng', '$trbit', '$cover', '$fileBuku')
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBuku($data, $dok) {
    global $conn;
    // ambil data dari input
    $id = htmlspecialchars($data["id"]);
    $jdl = htmlspecialchars($data["inputJudul"]);
    $pngrng = htmlspecialchars($data["inputPengarang"]);
    $trbit = htmlspecialchars($data["inputTerbit"]);
    $coverLama = htmlspecialchars($dok["coverLama"]["name"]);
    $bukuLama = htmlspecialchars($dok["bukuLama"]["name"]);

    if ($_FILES["inputCover"]["error"] === 4) {
        $cover = $coverLama;
    } else {
        $cover = htmlspecialchars($dok["inputCover"]["name"]);
        // pindah upload cover
        move_uploaded_file($dok["inputCover"]["tmp_name"], "../assets/img/cover/$cover");
    }

    if ($_FILES["inputBuku"]["error"] === 4) {
        $fileBuku = $bukuLama;
    } else {
        $fileBuku = htmlspecialchars($dok["inputBuku"]["name"]);
        // pindah upload buku
        move_uploaded_file($dok["inputBuku"]["tmp_name"], "../assets/img/file/$fileBuku");
    }

    $query = "UPDATE buku SET
                jdl = $jdl,
                pngrng = $pngrng,
                terbit = $trbit,
                cover = $cover,
                fileBuku = $fileBuku
                WHERE id = $id
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cariBuku($keyword) {
    $query = "SELECT * FROM buku
                WHERE
                jdl LIKE '%$keyword%' OR
                pngrng LIKE '%$keyword%'
                ";
    return query($query);
}

?>