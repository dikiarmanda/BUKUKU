<?php 
session_start();
if (isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
}

require 'functions.php';
// cek tombol submit
if (isset($_POST["login"])) {
	$nim = $_POST["loginNim"];
	$password = $_POST["loginPass"];

	$result = mysqli_query($conn, "SELECT * FROM member WHERE nim = '$nim'");

	// cek username
	if (mysqli_num_rows($result) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		$_SESSION["usertype"] = $row["status"];
		if(password_verify($password, $row["pass"])) {
			// set session
			$_SESSION["login"] = true;
			header("Location: ../index.php");
		}
	}
	$error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In</title>
	<!-- css -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<!-- icon pada title -->
	<link rel="icon" href="../assets/img/user-edit.svg">
</head>

<body class="signin text-center">
	<main class="form-signin">
		<?php if (isset($error)) : ?>
		<div class="alert alert-danger" role="alert">
			NIM atau Password yang Anda masukkan salah!
		</div>
		<?php endif ?>
		<form action="" method="post">
			<img class="mb-4 rounded-circle" src="../assets/img/user.png">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
			<div class="form-floating">
				<input type="text" class="form-control" name="loginNim" id="loginNim" placeholder="13456789" autocomplate="off">
				<label for="loginNim">NIM</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Password">
				<label for="loginPass">Password</label>
			</div>
			<div>
				
			</div>
			<button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="login">Sign in</button>
			<div class="mt-3">
				<a class="link-primary" href="signup.php">buat akun</a>
			</div>
			<p class="mt-5 mb-3 text-muted">&copy; 2021 | BUKUKU</p>
		</form>
	</main>
	<script src="../assets/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/jquery-3.6.0.min.js"></script>
</body>

</html>