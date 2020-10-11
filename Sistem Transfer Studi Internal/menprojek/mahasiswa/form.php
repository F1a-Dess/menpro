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
        
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
    
	<title>Transfer Mahasiswa Internal</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

		<div id="mySidenav" class="sidenav">
		<a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
		<a href="form.php" id="form" class="fa fa-fw fa-file"></a>
		<a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
		<a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
		<a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
		</div>

		<!-- page-content-wrapper -->
		<div id="page-content-wrapper" class="page-content-toggle">
			<div class="container-fluid">
				<div class="row">
					<div class="column left" style="background-color:#aaa;">
						<div id="mySidenav" class="sidenav">
							<a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
							<a href="form.php" id="form" class="fa fa-fw fa-file"></a>
							<a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
							<a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
							<a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
						</div>
					</div>

					<div class="column right" style="background-color:#bbb;">
						<div class="center" align="center">
							<div class="row">
								<div class="col-sm-6">
									<form action="makepdf.php" method="post" class="center">    
										<h1>Form Transfer Progdi</h1>
										<p>Isi form dengan data yang benar</p>  

										<div class="row col-md-12">
                          
											<div class="col-md-6">
												<label for="usr">Nama lengkap</label>
												<input type="text" name="nama" placeholder="Ex. Andreas Devanus Prasetya" class="form-control" required>
											</div>

											<div class="col-md-6">
												<label for="usr">NIM</label>
												<input type="text" name="nim" placeholder="Ex. 21.N1.0001" class="form-control" required>
											</div>

										</div>
										<br>

										<div class="col-md-11">

											<label for="usr">Alamat (KTP)</label>
											<input type="text" name="alamat" placeholder="Ex. JL. Graha Merdeka II No. 4" class="form-control" required>
                          
										</div>
										<br>

										<div class="row col-md-12">
                          
											<div class="col-md-6">
												<label for="usr">Kota</label>
												<input type="text" name="kota" placeholder="Ex. Jakarta" class="form-control" required>
											</div>

											<div class="col-md-6">
												<label for="usr">No Handphone</label>
												<input type="text" name="nohp" placeholder="Ex. 08941xxxxxxx" class="form-control" required>
											</div>

										</div>
										<br>

										<div class="row col-md-12">

											<div class="col-md-6">
												<label for="usr">Tahun Akademik</label>
												<input type="text" name="takademik" placeholder="Tahun Akademik" class="form-control" required>
											</div>
											<div class="col-md-6">
												<label for="usr">Semester</label>
												</br>

													<form>

														<label class="radio-inline">
															<input type="radio" name="semester" id="semester" value="ganjil">Ganjil
														</label>&emsp;

														<label class="radio-inline">
															<input type="radio" name="semester" id="semester" value="genap">Genap
														</label>

													</form>
												</br>
											</div>
										</div>
										<br>
                        
										<div class="row col-md-12">

											<div class="col-md-6">
												<div class="form-group">

													<label for="pasal">Fakultas/Prodi Asal</label>
													<select class="form-control" name="pasal" id="pasal"required>
														<option value="SI">Sistem Informasi</option>
														<option value="GT">Game Technology</option>
														<option value="TI">Teknik Infromatika</option>
														<option value="AKSI">Akuntasi</option>
													</select>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													<label for="ptujuan">Fakultas/Prodi Tujuan</label>
													<select class="form-control" name="ptujuan" id="ptujuan"required>
														<option value="SI">Sistem Informasi</option>
														<option value="GT">Game Technology</option>
														<option value="TI">Teknik Infromatika</option>
														<option value="AKSI">Akuntasi</option>
													</select>
												</div>
											</div>
										</div>
											<button type="submit" class="btn btn-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>