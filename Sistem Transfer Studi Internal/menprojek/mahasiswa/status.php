<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
	header("location:../login/accdenied.php");
}
if($_SESSION['level']!="mahasiswa")
{
	header("location:../login/accdenied.php");
}

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE email = '".$email."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$status = $row['status'];

$sql2 = "SELECT * FROM user WHERE email = '".$email."'";
$result2 = $link->query($sql2);
$row = $result2->fetch_array();
$nama = $row['nama'];

$sql3 = "SELECT * FROM user WHERE email = '".$email."'";
$result3 = $link->query($sql3);
$row = $result3->fetch_array();
$id = $row['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Transfer Mahasiswa Internal</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		.center 
		{
			display: block;
			margin-top: 100pt;
			margin-left: 170pt;
			margin-right: auto;
			width: 70%;
		}

		.column
		{
			float: left;
			padding: 10px;
			height: 900px;
		}

		.left
		{
			width: 15%;
		}

		.right
		{
			width: 85%;
		}

		#mySidenav a 
		{
			position: absolute; /* Position them relative to the browser window */
			left: -80px; /* Position them outside of the screen */
			transition: 0.3s; /* Add transition on hover */
			padding: 15px; /* 15px padding */
			width: 120px; /* Set a specific width */
			text-decoration: none; /* Remove underline */
			font-size: 20px; /* Increase font size */
			color: white; /* White text color */
			border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
		}

		#mySidenav a:hover 
		{
			left: 0; /* On mouse-over, make the elements appear as they should */
		}

		/* The home link: 20px from the top with a green background */
		#home 
		{
			top: 20px;
			background-color: #cd8de5;
		}

		#form 
		{
			top: 80px;
			background-color: #c377e0; 
		}

		#status 
		{
			top: 140px;
			background-color: #a86cc1;
		}

		#notification 
		{
			top: 200px;
			background-color: #89609e;
		}

		#logout 
		{
			top: 260px;
			background-color: #484553;
		}

		.card 
		{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 300px;
			margin: auto;
			text-align: center;
		}

		.title 
		{
			color: grey;
			font-size: 18px;
		}

		button 
		{
			border: none;
			outline: 0;
			display: inline-block;
			padding: 8px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}

		a 
		{
			text-decoration: none;
			font-size: 22px;
			color: black;
		}

		button:hover, a:hover 
		{
			opacity: 0.7;
		}
	</style>
</head>
<body>     
	<!-- <div class="row"> -->
		<div id="mySidenav" class="sidenav">
			<a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
			<a href="form.php" id="form" class="fa fa-fw fa-file"></a>
			<a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
			<a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
			<a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
		</div>

		<div class="container mt-12">
			<strong><h1><b>Selamat Datang, <?php echo "$nama"; ?></b></h1></strong>
			<hr>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<h1>Proses</h1>
					<br>
					<strong>
						<p>Isi formulir permohonan</p>
						<p>Cek berkas dan formulir</p>
						<p>Keputusan Kaprodi Baru</p>
						<p>Keputusan BAA</p>
						<p>Biaya studi</p>
						<p>Pembayaran</p>
						<p>Pengiriman NIM Baru</p>
						<p>Selesai</p>
					</strong>
				</div>

				<div class="col-sm-4">
					<h1>Status</h1>
					<br>
					<p><strong><?php echo "Checked"; ?></strong></p>
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<p></p>
				</div>
			</div>
			<div>
				<button type="button" class="btn btn-info"><a href="mahasiswa.php">Kalendar Akademik</a></button>
			</div>
		</div>
	</div>
<!-- </div> -->
</body>
</html>