<?php
session_start();
require 'functions.php'; 

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;

	}
}

if( isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}



if ( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+600);
				setcookie('key', hash('sha256', $row['username']), time()+600);

			}

			header("Location: index.php");
			exit;
		}

	}

	$error = true;


}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>


<div class="wrapper">
<?php if( isset($error) ) : ?>
	<p style="position: absolute; left: 43px; top: 89px; color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>
	
		<form action="" method="post">
		<h1>Login</h1>
			<div class="input_box">
				<input type="text" name="username" placeholder="Username" required><i class='bx bxs-user'></i>
			</div>
			<div class="input_box">
				<input type="password" name="password" placeholder="Password" required><i class='bx bxs-lock-alt' ></i>
			</div>
			<div class="remember-forgot">
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember me</label>
			</div>
				<button type="submit" name="login" class="btn">Login</button>
			<div class="register-link">
				<p>Tidak Punya Akun? <a href="registrasi.php">Register</a></p>
			</div>
		</form>
</div>	
</body>
</html>