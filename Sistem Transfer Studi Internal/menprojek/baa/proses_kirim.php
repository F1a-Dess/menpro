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
    $id = $_POST['id'];

    $folderUpload = "./assets/uploads/$id";

    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
        # jika tidak maka folder harus dibuat terlebih dahulu
        mkdir($folderUpload, 0777, $rekursif = true);
    }

    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $filekeputusan = (object) $_FILES['keputusan'];

    $keputusan = date('dmYHis').str_replace(" ", "", basename(@$_FILES["keputusan"]["name"]));

    if ($filekeputusan->size > 1000 * 2000) {
        die("File tidak boleh lebih dari 1MB");
    }

    if ($filekeputusan->type !== 'application/pdf') {
        die("File harus PDF!");
    }

    # mulai upload file
    $uploadkeputusanSukses = move_uploaded_file(
        $_FILES["keputusan"]["tmp_name"], "{$folderUpload}" . $keputusan);

    if ($uploadkeputusanSukses) {
        $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
        $sql = "UPDATE data_mhs SET pemberitahuan_diterima = '$keputusan', kirim_biaya_studi = 1, bayar = 1 WHERE user_id = '".$id."'";
        if($result = $link->query($sql)){
          header("location: bak.php");
        }else{
            echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
        }
    }
?>