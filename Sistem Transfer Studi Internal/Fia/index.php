<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body>

	<form action="makepdf.php" method="post">

		<div class="container mt-5 col-md-6">
		

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

			<div class="col-md-11">

				<label for="usr">Alamat (KTP)</label>
				<input type="text" name="alamat" placeholder="Ex. JL. Graha Merdeka II No. 4" class="form-control" required>
				
			</div>

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


</body>
</html>