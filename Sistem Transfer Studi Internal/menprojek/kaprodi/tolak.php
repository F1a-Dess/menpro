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
// Process delete  
if(isset($_POST["id"]) && !empty($_POST["id"])){ 
    // Include config file 
    require_once '../config/koneksi.php'; 
    
    // Prepare a select statement 
    $sql = "UPDATE data_mhs SET kep_kaprodi = 2 WHERE user_id = ?"; 
    
    if($stmt = $connect->prepare($sql)){ 
        // Bind variable 
        $stmt->bind_param("i", $param_id); 
        
        // Set parameters 
        $param_id = trim($_POST["id"]); 
        
        // execute  
        if($stmt->execute()){ 
            // Records deleted  
            header("location: kaprodi.php"); 
            exit(); 
        } else{ 
            echo " ada yang salah coba lagi."; 
        } 
    } 
    
    // Close statement 
    $stmt->close(); 
    
    // Close connection 
    $connect->close(); 
} else{ 
    // Check existence of id_reaksi parameter 
    if(empty(trim($_GET["id"]))){ 
        // URL doesn't contain id_reaksi parameter. Redirect to error page 
        header("location: error.php"); 
        exit(); 
    } 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Transfer Mahasiswa Internal</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css"> 
        .wrapper{ 
            width: 500px; 
            margin: 0 auto; 
        } 
    </style> 
</head> 
<body> 
<div class="wrapper"> 
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="page-header"> 
                    <h1>Tolak</h1> 
                </div> 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                    <div class="alert alert-danger fade in"> 
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/> 
                        <p>Apakah anda yakin akan menolak permohonan pindah ini?</p><br> 
                        <p> 
                            <input type="submit" value="Yes" class="btn btn-danger"> 
                            <a href="kaprodi.php" class="btn btn-default">No</a> 
                        </p> 
                    </div> 
                </form> 
            </div> 
        </div>         
    </div> 
</div> 
</body> 
</html> 