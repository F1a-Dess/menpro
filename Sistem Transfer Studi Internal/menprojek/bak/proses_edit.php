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
    $filebiaya_studi = (object) $_FILES['biaya_studi'];

    $biaya_studi = date('dmYHis').str_replace(" ", "", basename(@$_FILES["biaya_studi"]["name"]));

    $date = date("Y-m-d H:i:s");

    if ($filebiaya_studi->size > 1000 * 2000) {
        die("File tidak boleh lebih dari 1MB");
    }

    if ($filebiaya_studi->type !== 'application/pdf') {
        die("File harus PDF!");
    }

    # mulai upload file
    $uploadbiaya_studiSukses = move_uploaded_file(
        $_FILES["biaya_studi"]["tmp_name"], "{$folderUpload}" . $biaya_studi);

    if ($uploadbiaya_studiSukses) {
        $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
        $sql = "UPDATE data_mhs SET update_rincian_biaya_studi = '$date', rincian_biaya_studi = '$biaya_studi' WHERE user_id = '".$id."'";
        if($result = $link->query($sql)){
          header("location: bak.php");
        }else{
            echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
        }
    }
?>