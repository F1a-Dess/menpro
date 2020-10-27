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

$link = mysqli_connect("127.0.0.1","group05","05osan","group05");
$email = $_SESSION['email'];

@$id = $_GET['id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$nim_baru = $row['nim_baru'];
header("location:../bak/assets/uploads/$id/$nim_baru");
?>