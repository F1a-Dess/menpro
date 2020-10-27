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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
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
                        <h1>Upload Bukti Transfer</h1>
                    </div>
                    <p>Silahkan Upload bukti transfer berupa file PDF <strong>(.pdf only)</strong> <br><br>

                        <form action="proses_bayar.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Biaya Studi</label> <br>
                                <input type="file" name="bukti_bayar" required="required" accept="application/pdf">
                                <input type="hidden" name="id" value=<?php echo "$id" ?>/>
                            </div>
                            <div style="margin-top: 1rem">
                                <button class="btn btn-success">Upload</button>
                                <a href="status.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </body>
                    </html>