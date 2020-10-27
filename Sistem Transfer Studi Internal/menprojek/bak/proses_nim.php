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
    $id = $_POST['id'];

    $folderUpload = "./assets/uploads/$id";

    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
        # jika tidak maka folder harus dibuat terlebih dahulu
        mkdir($folderUpload, 0777, $rekursif = true);
    }

    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $filekirim_nim = (object) $_FILES['kirim_nim'];

    $kirim_nim = date('dmYHis').str_replace(" ", "", basename(@$_FILES["kirim_nim"]["name"]));

    if ($filekirim_nim->size > 1000 * 2000) {
        die("File tidak boleh lebih dari 1MB");
    }

    if ($filekirim_nim->type !== 'application/pdf') {
        die("File harus PDF!");
    }

    # mulai upload file
    $uploadkirim_nimSukses = move_uploaded_file(
        $_FILES["kirim_nim"]["tmp_name"], "{$folderUpload}" . $kirim_nim);

    if ($uploadkirim_nimSukses) {
        $link = mysqli_connect("127.0.0.1","group05","05osan","group05");
        $sql = "UPDATE data_mhs SET nim_baru = '$kirim_nim', selesai = 1, bayar = 2 WHERE user_id = '".$id."'";
        if($result = $link->query($sql)){
          header("location: bak_bayar.php");
        }else{
            echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
        }
    }
?>