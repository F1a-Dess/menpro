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
    $id = $_POST['id'];

    $folderUpload = "./assets/uploads/$id";

    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
        # jika tidak maka folder harus dibuat terlebih dahulu
        mkdir($folderUpload, 0777, $rekursif = true);
    }

    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $filekonversi_nilai = (object) $_FILES['konversi_nilai'];

    $konversi_nilai = date('dmYHis').str_replace(" ", "", basename(@$_FILES["konversi_nilai"]["name"]));

    if ($filekonversi_nilai->size > 1000 * 2000) {
        die("File tidak boleh lebih dari 1MB");
    }

    if ($filekonversi_nilai->type !== 'application/vnd.ms-excel', 'text/xls', 'text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        die("File harus Excel!");
    }

    # mulai upload file
    $uploadkonversi_nilaiSukses = move_uploaded_file(
        $_FILES["konversi_nilai"]["tmp_name"], "{$folderUpload}" . $konversi_nilai);

    if ($uploadkonversi_nilaiSukses) {
        $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
        $sql = "UPDATE data_mhs SET kep_kaprodi = 1, konversi = '$konversi_nilai' WHERE user_id = '".$id."'";
        if($result = $link->query($sql)){
          header("location: kaprodi.php");
        }else{
            echo "Error silahkan upload ulang, jika dalam beberapa saat masih gagal hubungi Call Center Unika";
        }
    }
?>