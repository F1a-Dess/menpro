<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
	header("location:../login/accdenied.php");
}
if($_SESSION['level']!="bak")
{
	header("location:../login/accdenied.php");
}  

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];

@$id = $_GET['id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$bukti_bayar = $row['bukti_bayar'];
header("location:../mahasiswa/assets/uploads/$id/$bukti_bayar");
?>