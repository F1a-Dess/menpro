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

$sql3 = "SELECT * FROM user WHERE email = '".$email."'";
$result3 = $link->query($sql3);
$row = $result3->fetch_array();
$id = $row['id'];

$sql4 = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result4 = $link->query($sql4);
$row = $result4->fetch_array();
$transkrip = $row['transkrip'];




$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
$result = $link->query($sql);
$row = $result->fetch_array();
$isi_form = $row['isi_form'];

if ($isi_form == 0) {
    header("location:data_diri.php");
}

// Include konfigurasi
    require_once '../config/koneksi.php';
// select tabel yang sesuai
    $sql = "SELECT * FROM data_mhs WHERE user_id = $id";
    if($stmt = $connect->prepare($sql)){
// Bind variable
        // $stmt->bind_param("i", $param_id);
// Set parameters --> perhatikan bahwa id yang diambil ini bukan field tetapi variabel dari Index saat get
        $param_id = $id;
// jika dieksekusi parameter stmt
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                /* perhatikan ini hanya akan mengambil 1 row dan tidak membutuhkan perulangan*/
                $row = $result->fetch_array(MYSQLI_ASSOC);
// memasukkan isi baris dalam sebuah variabel
                $transkrip = $row["transkrip"];
                $rekomendasi_dosen = $row["rekomendasi_dosen"];
                $pernyataan_ortu = $row["pernyataan_ortu"];
            } else{
// URL edirect to error page
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
// Close statement
    $stmt->close();
// Close connection
    $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Data Diri</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css"> 
        .wrapper{ 
            width: 650px; 
            margin: 0 auto; 
        } 
        .page-header h2{ 
            margin-top: 0; 
        } 
        table tr td:last-child a{ 
            margin-right: 15px; 
        } 
    </style> 
    <script type="text/javascript"> 
        $(document).ready(function(){ 
            $('[data-toggle="tooltip"]').tooltip();    
        }); 
    </script>
</head>
<body>
    <div class="wrapper"> 
        <div class="container-fluid"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="page-header"> 
                        <h1>View Record</h1> 
                    </div> 
                    <div class="form-group">
                    <label>Transkrip</label><br>
                    <a class="form-control-static" href="assets/uploads/<?php echo"$id" ?>/<?php echo"$transkrip" ?>"><?php echo $row["transkrip"]; ?></a>
                    </div>
                    <div class="form-group">
                    <label>Surat Rekomendasi</label><br>
                    <a class="form-control-static" href="assets/uploads/<?php echo"$id" ?>/<?php echo"$rekomendasi_dosen" ?>"><?php echo $row["rekomendasi_dosen"]; ?></a>
                    </div>
                    <div class="form-group">
                    <label>Pernyataan Ortu</label><br>
                    <a class="form-control-static" href="assets/uploads/<?php echo"$id" ?>/<?php echo"$pernyataan_ortu" ?>"><?php echo $row["pernyataan_ortu"]; ?></a>
                    </div>
                    <p><a href="mahasiswa.php" class="btn btn-primary">Ke Awal</a></p>
                        </div> 
                    </div>
                </body>
                </html>