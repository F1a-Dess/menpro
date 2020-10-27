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
                $nama = $row["nama"];
                $nim_asal = $row["nim_asal"];
                $prodi_asal = $row["prodi_asal"];
                $fakultas_asal = $row["fakultas_asal"];
                $alamat = $row["alamat"];
                $kota = $row["kota"];
                $nohp = $row["nohp"];
                $smt_pindah = $row["smt_pindah"];
                $thn_akademik_pindah = $row["thn_akademik_pindah"];
                $prodi_tujuan = $row["prodi_tujuan"];
                $fakultas_tujuan = $row["fakultas_tujuan"];
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
                    <label>Nama Lengkap</label>
                    <p class="form-control-static"><?php echo $row["nama"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>NIM Asal</label>
                    <p class="form-control-static"><?php echo $row["nim_asal"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Prodi Asal</label>
                    <p class="form-control-static"><?php echo $row["prodi_asal"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Fakultas Asal</label>
                    <p class="form-control-static"><?php echo $row["fakultas_asal"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Alamat</label>
                    <p class="form-control-static"><?php echo $row["alamat"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Kota</label>
                    <p class="form-control-static"><?php echo $row["kota"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>No HP</label>
                    <p class="form-control-static"><?php echo $row["nohp"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Semester Pindah</label>
                    <p class="form-control-static"><?php echo $row["smt_pindah"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Tahun Akademik Pindah</label>
                    <p class="form-control-static"><?php echo $row["thn_akademik_pindah"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Prodi Tujuan</label>
                    <p class="form-control-static"><?php echo $row["prodi_tujuan"]; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Fakultas Tujuan</label>
                    <p class="form-control-static"><?php echo $row["fakultas_tujuan"]; ?></p>
                    </div>
                    <p><a href="mahasiswa.php" class="btn btn-primary">Ke Awal</a></p>
                        </div> 
                    </div>
                </body>
                </html>