<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
    header("location:login/accdenied.php");
}
if($_SESSION['level']!="mahasiswa")
{
    header("location:login/accdenied.php");
}

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];

$sql3 = "SELECT * FROM user WHERE email = '".$email."'";
$result3 = $link->query($sql3);
$row = $result3->fetch_array();
$id = $row['id'];

$folderUpload = "./assets/uploads/$id";

# periksa apakah folder tersedia
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}

# simpan masing-masing file ke dalam array 
# dan casting menjadi objek :)
$filetranskrip = (object) @$_FILES['transkrip'];
$filerekomendasi = (object) @$_FILES['rekomendasi'];
$filepernyataan = (object) @$_FILES['pernyataan'];

$transkrip = $_FILES['transkrip']['name'];
$pernyataan = $_FILES['pernyataan']['name'];
$rekomendasi = $_FILES['rekomendasi']['name'];

if ($filetranskrip->size > 1000 * 2000 && $filerekomendasi->size > 1000 * 2000 && $filepernyataan->size > 1000 * 2000) {
    die("File tidak boleh lebih dari 1MB");
}

if ($filerekomendasi->type !== 'application/pdf' && $filetranskrip->type !== 'application/pdf' && $filepernyataan->type !== 'application/pdf') {
    die("File harus PDF!");
}

# mulai upload file
$uploadtranskripSukses = move_uploaded_file(
    $filetranskrip->tmp_name, "{$folderUpload}/{$filetranskrip->name}"
);

$uploadrekomendasiSukses = move_uploaded_file(
    $filerekomendasi->tmp_name, "{$folderUpload}/{$filerekomendasi->name}"
);

$uploadpernyataanSukses = move_uploaded_file(
    $filepernyataan->tmp_name, "{$folderUpload}/{$filepernyataan->name}"
);

if ($uploadtranskripSukses && $uploadrekomendasiSukses && $uploadpernyataanSukses) {
    $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
    $sql = "UPDATE data_mhs SET transkrip = '$transkrip', rekomendasi_dosen = '$rekomendasi', pernyataan_ortu = '$pernyataan', upload_berkas = 1, cek_form = 1 WHERE user_id = '".$id."'";
    if($result = $link->query($sql)){
      header("location: mahasiswa.php");
    }else{
        echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
    }
}
?>
