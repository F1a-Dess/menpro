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

@$id = $_GET['id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$pemberitahuan_diterima = $row['pemberitahuan_diterima'];

header("location:../baa/assets/uploads/$id/$pemberitahuan_diterima");

?>