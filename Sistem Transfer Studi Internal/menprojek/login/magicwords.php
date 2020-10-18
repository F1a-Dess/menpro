<?php
include '../config/koneksi.php';


session_start();
$_SESSION["email"]=$_POST["email"];
//echo $_SESSION["email"];



$con=mysqli_connect("localhost", "root", "", "transfer_mhs_intern") or die("cannot connect");

$email=mysqli_real_escape_string($con, $_POST['email']); 
$password=md5(mysqli_real_escape_string($con, $_POST['password']));

$sql=mysqli_query($con, "SELECT * FROM user where email='".$email."' and password='".$password."'");

if($row=mysqli_fetch_array($sql)) { 
	

	// cek jika user login sebagai admin
	if($row['level']=="mahasiswa"){

		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "mahasiswa";
		// alihkan ke halaman dashboard admin
		header("location:../mahasiswa/mahasiswa.php");
		// cek jika user login sebagai baa
	}else if($row['level']=="baa"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "baa";
		// alihkan ke halaman dashboard baa
		header("location:../baa/baa.php");
	}else if($row['level']=="kaprodi"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "kaprodi";
		// alihkan ke halaman dashboard kasir
		header("location:../kaprodi/kaprodi_test.php");
	}
	//header("location: accgranted.php"); 
    exit();
	echo "Welcome, " . $row[0] . "<br/>";
	$num_rows = mysqli_num_rows($sql);
	if($num_rows==1) echo "Login sukses"; 
} else echo "Gagal Login<br/>"; 
	header("location:../index.php");


?>