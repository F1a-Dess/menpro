<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
	header("location:../login/accdenied.php");
}
if($_SESSION['level']!="kaprodi")
{
	header("location:../login/accdenied.php");
}  

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];

@$id = $_GET['id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$transkrip = $row['transkrip'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Transkrip Nilai</title>

</head>

<body>   

	<embed type="application/pdf" src="../mahasiswa/assets/uploads/<?php echo"$id" ?>/<?php echo"$transkrip" ?>" width="1360" height="640"></embed>

</body>
</html>