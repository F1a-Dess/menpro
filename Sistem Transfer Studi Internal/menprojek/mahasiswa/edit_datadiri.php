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

    $link = mysqli_connect("localhost","root","","transfer_mhs_intern");
    $email = $_SESSION['email'];

    $sql3 = "SELECT * FROM user WHERE email = '".$email."'";
    $result3 = $link->query($sql3);
    $row = $result3->fetch_array();
    $id = $row['id'];
    

    $sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    $cek_form = $row['cek_form'];

    if ($cek_form != 3) {
        header("location:mahasiswa.php");
    }

$nama = $nim_asal = $prodi_asal = $fakultas_asal = $alamat = $kota = $nohp = $smt_pindah = $thn_akademik_pindah = $prodi_tujuan = $fakultas_tujuan = "";

$nama_err = $nim_asal_err = $prodi_asal_err = $fakultas_asal_err = $alamat_err = $kota_err = $nohp_err = $smt_pindah_err = $thn_akademik_pindah_err = $prodi_tujuan_err = $fakultas_tujuan_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "silakan input nama yang benar.";
    } elseif(!filter_var(trim($_POST["nama"]), FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $nama_err = 'Silahkan input nama yang valid.';
    } else{
        $nama = $input_nama;
    }

    $input_nim_asal = trim($_POST["nim_asal"]);
    if(empty($input_nim_asal)){ 
         $nim_asal_err = 'Form harus diisi !';      
    } else{ 
        $nim_asal = $input_nim_asal; 
    }

    $input_prodi_asal = trim($_POST["prodi_asal"]);
    if(empty($input_prodi_asal)){ 
         $prodi_asal_err = 'Form harus diisi !';      
    } else{ 
        $prodi_asal = $input_prodi_asal; 
    }

    $input_fakultas_asal = trim($_POST["fakultas_asal"]);
    if(empty($input_fakultas_asal)){ 
         $fakultas_asal_err = 'Form harus diisi !';      
    } else{ 
        $fakultas_asal = $input_fakultas_asal; 
    }

    $input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){ 
         $alamat_err = 'Form harus diisi !';      
    } else{ 
        $alamat = $input_alamat; 
    }

    $input_kota = trim($_POST["kota"]);
    if(empty($input_kota)){ 
         $kota_err = 'Form harus diisi !';      
    } else{ 
        $kota = $input_kota; 
    }

    $input_nohp = trim($_POST["nohp"]);
    if(empty($input_nohp)){
        $nohp_err = "Input no HP hanya angka.";
    } elseif(!ctype_digit($input_nohp)){
        $nohp_err = 'hanya nilai/integer angka.';
    } else{
        $nohp = $input_nohp;
    }

    $input_smt_pindah = trim($_POST["smt_pindah"]);
    if(empty($input_smt_pindah)){ 
         $smt_pindah_err = 'Form harus diisi !';      
    } else{ 
        $smt_pindah = $input_smt_pindah; 
    }

    $input_thn_akademik_pindah = trim($_POST["thn_akademik_pindah"]);
    if(empty($input_thn_akademik_pindah)){ 
         $thn_akademik_pindah_err = 'Form harus diisi !';      
    } else{ 
        $thn_akademik_pindah = $input_thn_akademik_pindah; 
    }

    $input_prodi_tujuan = trim($_POST["prodi_tujuan"]);
    if(empty($input_prodi_tujuan)){ 
         $prodi_tujuan_err = 'Form harus diisi !';      
    } else{ 
        $prodi_tujuan = $input_prodi_tujuan; 
    }

    $input_fakultas_tujuan = trim($_POST["fakultas_tujuan"]);
    if(empty($input_fakultas_tujuan)){ 
         $fakultas_tujuan_err = 'Form harus diisi !';      
    } else{ 
        $fakultas_tujuan = $input_fakultas_tujuan; 
    }
  

    if (empty($nama_err) && empty($nim_asal_err) && empty($prodi_asal_err) && empty($fakultas_asal_err) && empty($alamat_err) && empty($kota_err) && empty($nohp_err) && empty($smt_pindah_err) && empty($thn_akademik_pindah_err) && empty($prodi_tujuan_err) && empty($fakultas_tujuan_err)){

        $sql = "UPDATE data_mhs set nama = ?, nim_asal = ?, prodi_asal = ?, fakultas_asal = ?, alamat = ?, kota = ?, nohp = ?, smt_pindah = ?, thn_akademik_pindah = ?, prodi_tujuan = ?, fakultas_tujuan = ?, isi_form = 1, cek_form = 1 where user_id = '$id'";

        if($stmt = $connect->prepare($sql)){ 
            // Bind variables to the prepared statement as parameters 
            $stmt->bind_param("ssssssissss", $param_nama, $param_nim_asal, $param_prodi_asal, $param_fakultas_asal, $param_alamat, $param_kota, $param_nohp, $param_smt_pindah, $param_thn_akademik_pindah, $param_prodi_tujuan, $param_fakultas_tujuan);

            // Set parameters 
            $param_nama = $nama;
            $param_nim_asal = $nim_asal;
            $param_prodi_asal = $prodi_asal;
            $param_fakultas_asal = $fakultas_asal;
            $param_alamat = $alamat;
            $param_kota = $kota;
            $param_nohp = $nohp;
            $param_smt_pindah = $smt_pindah;
            $param_thn_akademik_pindah = $thn_akademik_pindah; 
            $param_prodi_tujuan = $prodi_tujuan;
            $param_fakultas_tujuan = $fakultas_tujuan;

            // Attempt to execute the prepared statement 
            if($stmt->execute()){ 
                // Records created successfully. Redirect to landing page 
                header("location: mahasiswa.php"); 
                exit(); 
            } else{ 
                echo "Something went wrong. Please try again later."; 
            } 
        } 
          
        // Close statement 
        //$stmt->close(); 
    } 
    // Close connection 
    $connect->close(); 
}
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
                        <h2>Update Data Diri</h2> 
                    </div> 
                    <p>Masukkan Update Data Diri</p> 
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div> 
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama Lengkap</label> 
                            <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"> 
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($nim_asal_err)) ? 'has-error' : ''; ?>"> 
                            <label>NIM</label> 
                            <input type="text" name="nim_asal" class="form-control" value="<?php echo $nim_asal; ?>"> 
                            <span class="help-block"><?php echo $nim_asal_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($prodi_asal_err)) ? 'has-error' : ''; ?>">
                            <label>Prodi Asal</label> 
                            <select name="prodi_asal" class="form-control" value="<?php echo $prodi_asal; ?>"> 
                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from prodi"; 
                                if($result = $connect->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['prodi']."\" ";
                                if ($prodi_asal == $row['prodi']) {
                                    echo "selected";
                                        }
                                    echo "<option>".$row['prodi']."</option>";
                                    }
                                } 
                                else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } 
                                else{
                                    echo "ERROR: Could not able to execute $sql. " . $connect->error;
                                    }  
                 
                                //$connect->close();
                                ?>

                            </select> 
                            <span class="help-block"><?php echo $prodi_asal_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($fakultas_asal_err)) ? 'has-error' : ''; ?>">
                            <label>Fakultas Asal</label> 
                            <select name="fakultas_asal" class="form-control" value="<?php echo $fakultas_asal; ?>"> 
                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from fakultas"; 
                                if($result = $connect->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['fakultas']."\" ";
                                if ($fakultas_asal == $row['fakultas']) {
                                    echo "selected";
                                        }
                                    echo "<option>".$row['fakultas']."</option>";
                                    }
                                } 
                                else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } 
                                else{
                                    echo "ERROR: Could not able to execute $sql. " . $connect->error;
                                    }  
                 
                                //$connect->close();
                                ?>

                            </select> 
                            <span class="help-block"><?php echo $fakultas_asal_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($alamat_err)) ? 'has-error' : ''; ?>">
                            <label>Alamat</label> 
                            <textarea name="alamat" class="form-control"><?php echo $alamat; ?></textarea>
                            <span class="help-block"><?php echo $alamat_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($kota_err)) ? 'has-error' : ''; ?>">
                            <label>Kota</label> 
                            <input type="text" name="kota" class="form-control" value="<?php echo $kota; ?>"> 
                            <span class="help-block"><?php echo $kota_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($nohp_err)) ? 'has-error' : ''; ?>"> 
                            <label>No HP</label> 
                            <input type="text" name="nohp" class="form-control" value="<?php echo $nohp; ?>"> 
                            <span class="help-block"><?php echo $nohp_err;?></span> 
                        </div>

                        <div class="form-group <?php echo (!empty($smt_pindah_err)) ? 'has-error' : ''; ?>"> 
                            <label>Semester Pindah</label> 
                            <select id="smt_pindah" name="smt_pindah">
                                <option value="">Please Select</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>     
                            </select>
                            <span class="help-block"><?php echo $smt_pindah_err;?></span> 
                        </div>

                        <div class="form-group <?php echo (!empty($thn_akademik_pindah_err)) ? 'has-error' : ''; ?>"> 
                            <label>Tahun Akademik</label> 
                            <input type="text" name="thn_akademik_pindah" class="form-control" value="<?php echo $thn_akademik_pindah; ?>"> 
                            <span class="help-block"><?php echo $thn_akademik_pindah_err;?></span> 
                        </div>

                        <div class="form-group <?php echo (!empty($prodi_tujuan_err)) ? 'has-error' : ''; ?>">
                            <label>Prodi Tujuan</label> 
                            <select name="prodi_tujuan" class="form-control" value="<?php echo $prodi_tujuan; ?>"> 
                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from prodi"; 
                                if($result = $connect->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['prodi']."\" ";
                                if ($prodi_tujuan == $row['prodi']) {
                                    echo "selected";
                                        }
                                    echo "<option>".$row['prodi']."</option>";
                                    }
                                } 
                                else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } 
                                else{
                                    echo "ERROR: Could not able to execute $sql. " . $connect->error;
                                    }  
                 
                                //$connect->close();
                                ?>

                            </select> 
                            <span class="help-block"><?php echo $prodi_tujuan_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($fakultas_tujuan_err)) ? 'has-error' : ''; ?>">
                            <label>Fakultas Tujuan</label> 
                            <select name="fakultas_tujuan" class="form-control" value="<?php echo $fakultas_tujuan; ?>"> 
                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from fakultas"; 
                                if($result = $connect->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['fakultas']."\" ";
                                if ($fakultas_tujuan == $row['fakultas']) {
                                    echo "selected";
                                        }
                                    echo "<option>".$row['fakultas']."</option>";
                                    }
                                } 
                                else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } 
                                else{
                                    echo "ERROR: Could not able to execute $sql. " . $connect->error;
                                    }  
                 
                                //$connect->close();
                                ?>

                            </select> 
                            <span class="help-block"><?php echo $fakultas_tujuan_err;?></span>
                        </div>
                        <div> 
                        <input type="submit" class="btn btn-primary" value="Submit"> 
                        <a href="mahasiswa.php" class="btn btn-default">Cancel</a>
                        <br><br><br> 
                    </form> 
                </div> 
            </div>
</body>
</html>