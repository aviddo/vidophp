<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!') 
				document.location.href = 'login.php'
			</script>";
	}

	}	else {
		echo mysqli_error($conn);

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
		@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: "Poppins", sans-serif;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: url(dsjfkjsdfsjd.jpg) no-repeat;
	background-size: cover;
	background-position: center;
}

.wrapper {
	width: 420px;
	background: transparent;
	border: 2px solid rgba(255, 255, 255, .2);
	backdrop-filter: blur(30px);
	box-shadow: 0 0 10px rgba(0, 0, 0, .2);
	color: #fff;
	border-radius: 10px;
	padding: 30px 40px;
}

.wrapper h1 {
	font-size: 36px;
	text-align: center;
}

.wrapper .input_box {
	position: relative;
	width: 100%;
	height: 50px;
	margin: 30px 0;
}

.input_box input {
	width: 100%;
	height: 100%;
	background: transparent;
	border: none;
	outline: none;
	border: 2px solid rgba(255, 255, 255, .2);
	border-radius: 40px;
	font-size: 16px;
	color: #fff;
	padding: 20px 45px 20px 20px;
}

.input_box input::placeholder {
	color: #fff;
}

.input_box i {
	position: absolute;
	right: 20px;
	top: 50%;
	transform: translateY(-50%);
	font-size: 20px;

}

.wrapper .remember-forgot {
	display: center;
	justify-content: space-between;
	font-size: 14.5px;
	margin: -15px 0 15px;
}

.wrapper .remember-forgot input {
	accent-color: #fff;
	margin-left: 3px;
}

.wrapper .btn {
	width: 100%;
	height: 45px;
	background: #fff;
	border: none;
	outline: none;
	border-radius: 40px;
	box-shadow: 0 0 10px rgba(255, 255, 255, .2);
	cursor: pointer;
	font-size: 16px;
	color: #333;
	font-weight: 600;
}

.wrapper .register-link {
	font-size: 14.5px;
	text-align: center;
	margin-top: 20px ;
}

.register-link p a {
	color: #fff;
	text-decoration: none;
	font-weight: 600;
}

.register-link p a:hover {
	text-decoration: underline;
}

.wrapper .btn {
	width: 100%;
	height: 45px;
	background: #fff;
	border: none;
	outline: none;
	border-radius: 40px;
	box-shadow: 0 0 10px rgba(0, 0, 0, .1);
	cursor: pointer;
	font-size: 16px;
	color: #333;
	font-weight: 600;
}

.wrapper .register-link {
	font-size: 14.5px;
	text-align: center;
	margin: 20px 0 15px;
}

.register-link p a {
	color: #fff;
	text-decoration: none;
	font-weight: 600;
}

.register-link p a:hover {
	text-decoration: underline;
}

	</style>
</head>
<body>

	
	<div class="wrapper">
		<form action="" method="post">
		<h1>Registrasi</h1>
			<div class="input_box">
				<label for="username">username :</label>
				<input type="text" name="username" id="username">
			</div>
			<div class="input_box">
				<label for="password">password :</label>
				<input type="password" name="password" id="password">
			</div>
			<div class="input_box">
				<label for="password2">konfirmasi password :</label>
				<input type="password" name="password2" id="password2">
			</div>
			<br>	
			<div>
				<button type="submit" name="register" class="btn">Sign Up</button>
			</div>
		

		</form>
	</div>
</body>
</html>