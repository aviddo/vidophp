<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

// pagination
// KONFIGURASI
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		
		body {
			background: url(dsjfkjsdfsjd.jpg) no-repeat;
			width: flex;
		}
		body a {
			color: #fff;
		}
		.wrapper h1 {
			font-size: 38px;
			text-align: center;
			color: #fff;
		}
		.wrapper .keluar a  {
			position: absolute;
			top: 10px;
			font-size: 27px;
			color: #fff;
			background: transparent;
			border: 2px solid rgba(255, 255, 255, .2);
			backdrop-filter: blur(90px);
			box-shadow: 0 0 10px rgba(0, 0, 0, .2);
			color: #fff;
			border-radius: 10px;
			padding: 5px;
		}
		.wrapper .nolk {
			position: absolute;
			left: 235px;
			top: 550px;
			font-size: 15px;
			color: #fff;
			
		}
		.wrapper .add a  {
			position: absolute;
			left: 965px;
			top: 70px;
			font-size: 15px;
			color: #fff;
			background: purple;
			border: 2px solid rgba(255, 255, 255, .2);
			backdrop-filter: blur(90px);
			box-shadow: 0 0 10px rgba(0, 0, 0, .2);
			color: #fff;
			border-radius: 10px;
			padding: 5px;
		}
		.wrapper .srch form  {
			margin-left: 230px;
			font-size: 15px;
			color: #fff;
		}
		
		table {
			margin-right: auto;
			margin-left: auto;
			background: transparent;
			border: 2px solid rgba(255, 255, 255, .2);
			backdrop-filter: blur(90px);
			box-shadow: 0 0 10px rgba(0, 0, 0, .2);
			color: #fff;
			border-radius: 10px;
			padding: 30px 40px;
		}

	</style>
</head>
<body>
<div class="wrapper">
	<div class="keluar">
		<a href="logout.php">Logout</a>
	</div>
	<h1>Daftar Mahasiswa</h1>
	<br>
	<div class="add">
		<a href="tambah.php">Tambah data Mahasiswa</a>
	</div>

	<div class="srch">	
	<form action="" method="post">
	
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>

	</form>
	</div>

<div class="nolk">
	<P>page:
	<!-- navigasi -->
	<?php if( $halamanAktif > 1 ) : ?>
	
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

	<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
		<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i ?>" style="font-weight: bold; color: grey; "><?= $i ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i ?>"><?= $i ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if( $halamanAktif < $jumlahHalaman ) : ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?>
	</P>
</div>
<br>
<table border="1" cellpadding="10" cellspacing="0" class="table">
	
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>nama</th>
		<th>nim</th>
		<th>email</th>
		<th>jurusan</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> | 
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
		<td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
		<td><?php echo $row["nama"]; ?></td>
		<td><?php echo $row["nim"]; ?></td>
		<td><?php echo $row["email"] ?></td>
		<td><?php echo $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>

</div>
</div>
</div>
</div>
</body>
</html>