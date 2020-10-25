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
    $id = $_GET['id'];

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
                    <h1>Upload Berkas</h1>
                </div>
    <p>Silahkan Upload berkas <strong>(.pdf only)</strong> <br><br>

    <form action="proses_kirim.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Pemberitahuan Penerimaan</label> <br>
            <input type="file" name="keputusan" required="required" accept="application/pdf">
            <input type="hidden" name="id" value=<?php echo "$id" ?>/>
        </div>
        <div style="margin-top: 1rem">
            <button class="btn btn-success">Upload</button>
            <a href="bak.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</body>
</html>