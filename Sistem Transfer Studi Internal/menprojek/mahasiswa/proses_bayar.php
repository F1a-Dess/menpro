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
    $id = $_POST['id'];

    $folderUpload = "./assets/uploads/$id";

    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
        # jika tidak maka folder harus dibuat terlebih dahulu
        mkdir($folderUpload, 0777, $rekursif = true);
    }

    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $filebukti_bayar = (object) $_FILES['bukti_bayar'];

    $bukti_bayar = date('dmYHis').str_replace(" ", "", basename(@$_FILES["bukti_bayar"]["name"]));

    if ($filebukti_bayar->size > 2048000) {
        die("File tidak boleh lebih dari 2MB");
    }

    if ($filebukti_bayar->type !== 'application/pdf') {
        die("File harus PDF!");
    }

    # mulai upload file
    $uploadbukti_bayarSukses = move_uploaded_file(
        $_FILES["bukti_bayar"]["tmp_name"], "{$folderUpload}" . $bukti_bayar);

    if ($uploadbukti_bayarSukses) {
        $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
        $sql = "UPDATE data_mhs SET bayar = 4, bukti_bayar = '$bukti_bayar' WHERE user_id = '".$id."'";
        if($result = $link->query($sql)){
          header("location: status.php");
        }else{
            echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
        }
    }
?>