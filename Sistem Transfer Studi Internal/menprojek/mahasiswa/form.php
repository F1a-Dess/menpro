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
        $sql = "SELECT * FROM user WHERE email = '".$email."'";
        $result = $link->query($sql);
                $row = $result->fetch_array();
                $status = $row['status'];

        $sql2 = "SELECT * FROM user WHERE email = '".$email."'";
        $result2 = $link->query($sql2);
                $row = $result2->fetch_array();
                $nama = $row['nama'];

        $sql3 = "SELECT * FROM user WHERE email = '".$email."'";
        $result3 = $link->query($sql3);
                $row = $result3->fetch_array();
                $id = $row['id'];

// @$nama = $_POST['nama'];
// @$nim = $_POST['nim'];
// @$alamat = $_POST['alamat'];
// @$kota = $_POST['kota'];
// @$nohp = $_POST['nohp'];
// @$takademik = $_POST['takademik'];
// @$smt_pindah = $_POST['semester'];
// @$transkrip = $_POST['transkrip'];
// @$rekomendasi = $_POST['rekomendasi'];
@$prodi_asal = $_POST['prodi_asal'];
@$fak_asal = $_POST['fak_asal'];
@$prodi_tujuan = $_POST['prodi_tujuan'];
@$fak_tujuan = $_POST['fak_tujuan'];


// $sql4 = "SELECT * FROM data_mhs WHERE id = '".$id."'";
//         $result4 = $connect->query($sql4);
// $row = $result->fetch_array();
// $isi_form = $row['isi_form'];


//     $sql = "INSERT INTO data_mhs (nama, nim_asal, prodi_asal, fakultas_asal, alamat, kota, nohp, smt_pindah, thn_akademik_pindah, prodi_tujuan, fakultas_tujuan, transkrip, rekomendasi_dosen, user_id) VALUES ('$nama', '$nim', '$prodi_asal', '$fak_asal', '$alamat', '$kota', '$nohp', '$smt_pindah', '$takademik', '$prodi_tujuan', 'fak_tujuan', '$id')";
//     // $sql .= "UPDATE data_mhs SET isi_form = 1 WHERE id = '$id'";

//     $run = mysqli_query($connect, $sql);
//     if ($run) {
//         header("location: mahasiswa.php");
//     }
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
    
	<title>Transfer Mahasiswa Internal</title>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<style type="text/css">
		.center {
		display: block;
		margin-top: 100pt;
		margin-left: 170pt;
		margin-right: auto;
		width: 70%;
		}

		.column
		{
			float: left;
			padding: 10px;
			height: 900px;
		}

		.left
		{
			width: 15%;
		}

		.right
		{
			width: 85%;
		}

		#mySidenav a {
		position: absolute; /* Position them relative to the browser window */
		left: -80px; /* Position them outside of the screen */
		transition: 0.3s; /* Add transition on hover */
		padding: 15px; /* 15px padding */
		width: 120px; /* Set a specific width */
		text-decoration: none; /* Remove underline */
		font-size: 20px; /* Increase font size */
		color: white; /* White text color */
		border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
		}

		#mySidenav a:hover {
		left: 0; /* On mouse-over, make the elements appear as they should */
		}

		/* The home link: 20px from the top with a green background */
		#home {
		top: 20px;
		background-color: #cd8de5;
		}

		#form {
		top: 80px;
		background-color: #c377e0; 
		}

		#status {
		top: 140px;
		background-color: #a86cc1;
		}

		#notification {
		top: 200px;
		background-color: #89609e;
		}

		#logout {
		top: 260px;
		background-color: #484553;
		}

		.title {
		color: grey;
		font-size: 18px;
		}

		button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 8px;
		color: white;
		background-color: #000;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
		}

		a {
		text-decoration: none;
		font-size: 22px;
		color: black;
		}

		button:hover, a:hover {
		opacity: 0.7;
		}
		</style>
	</head>
  
	<body>
		<!-- page-content-wrapper -->
					<!-- <div class="column left" style="background-color:white;"> -->
						<div id="mySidenav" class="sidenav">
							<a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
							<a href="form.php" id="form" class="fa fa-fw fa-file"></a>
							<a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
							<a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
							<a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
						</div>
					</div>

		<!-- <div class="column right" style="background-color:#bbb;">
		<div class="center" align="center"> -->
		<div id="page-content-wrapper" class="page-content-toggle">
        <div class="container-fluid">
  
                <form action="proses_simpan.php" method="post" class="center">
                    
                        <div class="container col-md-12">
                            

                              <h1>Form Transfer Progdi</h1>
                              <p>Isi form dengan data yang benar</p>  

                            <div class="row col-md-12">                              
                                <div class="col-md-6">
                                <label>Nama lengkap</label>
                                  <input type="text" name="nama" placeholder="Ex. Andreas Devanus Prasetya" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                <label>NIM</label>
                                  <input type="text" name="nim" placeholder="Ex. 21.N1.0001" class="form-control" required>
                                </div>
                              </div>


                              <div class="col-md-11">
                                <label>Alamat (KTP)</label>
                                <input type="text" name="alamat" placeholder="Ex. JL. Graha Merdeka II No. 4" class="form-control" required>
                              </div>


                              <div class="row col-md-12">                                
                                <div class="col-md-6">
                                  <label>Kota</label>
                                  <input type="text" name="kota" placeholder="Ex. Jakarta" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label>No Handphone</label>
                                  <input type="text" name="nohp" placeholder="Ex. 08941xxxxxxx" class="form-control" required>
                                </div>
                              </div>

                              <div class="row col-md-12">
                                <div class="col-md-6">
                                  <label>Tahun Akademik</label>
                                  <input type="text" name="takademik" placeholder="Ex. 2020/2021" class="form-control" required>
                                </div>


                                <div class="col-md-6">
                                  <label>Semester</label>
                                  </br>
                                      <label class="radio-inline">
                                        <input type="radio" name="semester" id="semester" value="ganjil">Ganjil
                                      </label>&emsp;

                                      <label class="radio-inline">
                                        <input type="radio" name="semester" id="semester" value="genap">Genap
                                      </label>
                                  </br>
                                </div>
                              </div>

                              
                        <div class="row col-md-12">
                            <div class="col-md-6">
                            <div class="form-group">

                            <label for="prodi_asal">Prodi Asal</label>
                            <select name="prodi_asal" class="form-control" value="<?php echo $prodi_asal; ?>"> 

                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from prodi"; 
                                if($result = $link->query($sql)){
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
                                    echo "ERROR: Could not able to execute $sql. " . $link->error;
                                    }  
                 
                                //$link->close();
                                ?>
                            </select> 
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="fak_asal">Fakultas Asal</label>
                            <select name="fak_asal" class="form-control" value="<?php echo $fak_asal; ?>"> 

                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from fakultas"; 
                                if($result = $link->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['fakultas']."\" ";
                                if ($fak_asal == $row['fakultas']) {
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
                                    echo "ERROR: Could not able to execute $sql. " . $link->error;
                                    }  
                 
                                //$link->close();
                                ?>
                            </select> 
                            </div>
                            </div>
                        </div>


                        <div class="row col-md-12">

                            <div class="col-md-6">
                            <div class="form-group">

                            <label for="prodi_tujuan">Prodi Tujuan</label>
                            <select name="prodi_tujuan" class="form-control" value="<?php echo $prodi_tujuan; ?>"> 

                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from prodi"; 
                                if($result = $link->query($sql)){
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
                                    echo "ERROR: Could not able to execute $sql. " . $link->error;
                                    }  
                 
                                //$link->close();
                                ?>

                            </select> 
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="fak_tujuan">Fakultas Tujuan</label>
                            <select name="fak_tujuan" class="form-control" value="<?php echo $fak_tujuan; ?>"> 

                            <option value=""> Please Select</option>
                                <?php
                                $sql = "select * from fakultas"; 
                                if($result = $link->query($sql)){
                                    if($result->num_rows > 0){
                                while($row = $result->fetch_array()){ 
                                    echo "<option value=\"".$row['fakultas']."\" ";
                                if ($fak_tujuan == $row['fakultas']) {
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
                                    echo "ERROR: Could not able to execute $sql. " . $link->error;
                                    }  
                 
                                //$link->close();
                                ?>
                            </select> 

                            </div>
                            </div>
                        </div>

                        <div class="row col-md-12">

                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="transkrip">Transkrip Nilai</label><br>
                            <input type="file" name="transkrip" accept="application/pdf">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="rekomendasi">Surat Rekomendasi Kaprodi</label><br>
                            <input type="file" name="rekomendasi" accept="application/pdf">
                            </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                          
                            </div>
                          </form>
                <!-- </div>
              </div> -->
				<!-- </div>
			</div> -->
		</div>
	</body>
</html>