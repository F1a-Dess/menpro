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

$link = mysqli_connect("localhost","root","","transfer_mhs_intern");
$email = $_SESSION['email'];

$id = $_POST['user_id'];

$sql = "SELECT * FROM data_mhs WHERE user_id = '".$id."'";
    $result = $link->query($sql);
    $row = $result->fetch_array();
    $transkrip = $row['transkrip'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Transfer Mahasiswa Internal</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		.center 
		{
			display: block;
			margin-top: 100pt;
			margin-left: 170pt;
			margin-right: auto;
			width: 70%;
		}

		.column
		{
			float: left;
			/*padding: 10px;*/
			height: 680px;
			width: auto;
		}

		.left
		{
			width: 15%;
		}

		.right
		{
			width: 85%;
		}

		.sidenav {
			height: 100%; /* Full-height: remove this if you want "auto" height */
			width: 200px; /* Set the width of the sidebar */
			position: fixed; /* Fixed Sidebar (stay in place on scroll) */
			z-index: 1; /* Stay on top */
			top: 0; /* Stay at the top */
			left: 0;
			background-color: #490251; /* Purple */
			overflow-x: hidden; /* Disable horizontal scroll */
			padding-top: 1px;
		}

		/* The navigation menu links */
		.sidenav a {
			padding: 20px 1px 10px 18px;
			text-decoration: Comic Sans;
			font-size: 23px;
			color: #f1f1f1;
			display: block;
		}

		/* When you mouse over the navigation links, change their color */
		.sidenav a:hover {
			color: #818181;
		}

		/* Style page content */
		.main {
			margin-left: 200px; /* Same as the width of the sidebar */
			padding: 0px 10px;
		}

		/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}


	</style>
</head>

<body>   
	<?php
		echo "$id";
	?>

				<div class="column right" style="background-color:white;">
					<div align="center">
							<embed type="application/pdf" src="../mahasiswa/assets/uploads/$id/$transkrip" width="1140" height="640"></embed>
					</div>
				</div>
			
</body>
</html>