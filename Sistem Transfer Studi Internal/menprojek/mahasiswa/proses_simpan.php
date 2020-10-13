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

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$nohp = $_POST['nohp'];
$takademik = $_POST['takademik'];
$smt_pindah = $_POST['semester'];
// $transkrip = $_POST['transkrip'];
// $rekomendasi = $_POST['rekomendasi'];
$prodi_asal = $_POST['prodi_asal'];
$fak_asal = $_POST['fak_asal'];
$prodi_tujuan = $_POST['prodi_tujuan'];
$fak_tujuan = $_POST['fak_tujuan'];


$email = $_SESSION['email'];
$sql3 = "SELECT * FROM user WHERE email = '".$email."'";
        $result3 = $connect->query($sql3);
                $row = $result3->fetch_array();
                $id = $row['id'];


$sql = "SELECT * FROM data_mhs WHERE id = '".$id."'";
        $result = $connect->query($sql);
$row = $result->fetch_array();
@$isi_form = $row['isi_form'];

if ($isi_form == 0) {
	$sql = "INSERT INTO data_mhs (nama, nim_asal, prodi_asal, fakultas_asal, alamat, kota, nohp, thn_akademik_pindah, prodi_tujuan, fakultas_tujuan, transkrip, rekomendasi_dosen) VALUES ('$nama', '$nim', '$prodi_asal', '$fak_asal', '$alamat', '$kota', '$nohp', '$takademik', '$prodi_tujuan', 'fak_tujuan')";
	$sql .= "UPDATE data_mhs SET isi_form = '$isi_form' WHERE id = '$id'";

	$run = mysqli_multi_query($connect, $sql);
	if ($run) {
		header("location: mahasiswa.php");
	}
	}
?>