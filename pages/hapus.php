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
$id = $_GET["idMember"];

if (hapus($id) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus');
        document.location.href = '../pages/dataMember.php'; 
    </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        document.location.href = '../pages/dataMember.php'; 
    </script>";
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM member WHERE idMember = $id");
    return mysqli_affected_rows($conn);
}
?>