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

    <style type="text/css">
      .center {
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
        top: 85px;
        background-color: #c377e0; 
      }

      #status {
        top: 145px;
        background-color: #a86cc1;
      }

      #notification {
        top: 205px;
        background-color: #89609e;
      }

      #logout {
        top: 265px;
        background-color: #484553;
      }
    </style>
  </head>
  
  <body>
    
    <!-- header -->
    <!-- <nav id="header" class="navbar navbar-fixed-top navbar navbar-light">
      <div class="container-fluid">
        <div class="navbar-header" id="sidebar-toggle-button">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Data Diri</a></li>
          <li><a href="status.php">Status</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <li>&nbsp &nbsp &nbsp</li>
        </ul>
      </div>
    </nav>   -->
    <!-- /header -->      



<!-- page-content-wrapper -->
		<div id="page-content-wrapper" class="page-content-toggle">
			<div class="container-fluid">       
					<div class="row">
						<div class="column left" style="background-color:#aaa;">
							<div id="mySidenav" class="sidenav">
							  <a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
							  <a href="#" id="form" class="fa fa-fw fa-file"></a>
							  <a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
							  <a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
							  <a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
							</div>
						</div>

						<div class="column right" style="background-color:#bbb;">
							<div class="center" align="center">
								<img src="../pictures/unika.png" width="700" height="300">
							</div>
						</div>
					</div>
			</div>
		</div>
		<div class="footer" align="center" style="background-color:#bbb">
		  <p color="black" face="OCR A Std" size="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong> &copy; Kelompok 4</strong></p>
		</div>
	</body>
</html>