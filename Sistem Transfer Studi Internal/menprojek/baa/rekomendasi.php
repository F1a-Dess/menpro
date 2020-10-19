<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
	header("location:../login/accdenied.php");
}
if($_SESSION['level']!="baa")
{
	header("location:../login/accdenied.php");
}  

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];

@$id = $_GET['id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$rekomendasi = $row['rekomendasi_dosen'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Rekomendasi</title>

</head>

<body>   

	<embed type="application/pdf" src="../mahasiswa/assets/uploads/<?php echo"$id" ?>/<?php echo"$rekomendasi" ?>" width="1360" height="640"></embed>

</body>
</html>