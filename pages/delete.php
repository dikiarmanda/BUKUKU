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
$id = $_GET["idBuku"];

if (delete($id) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus');
        document.location.href = 'dataBuku.php'; 
    </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        document.location.href = 'dataBuku.php'; 
    </script>";
}

function delete($id) {
    global $conn;
    $buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE idBuku = $id"));
    unlink("../assets/img/cover/$buku[cover]");
    unlink("../assets/img/file/$buku[fileBuku]");
    mysqli_query($conn, "DELETE FROM buku WHERE idBuku = $id");
    return mysqli_affected_rows($conn);
}
?>