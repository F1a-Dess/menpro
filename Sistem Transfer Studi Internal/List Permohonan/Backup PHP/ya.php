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
        display: block;
        margin-top: 100pt;
        margin-left: 170pt;
        margin-right: auto;
        width: 70%;
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

    <div id="mySidenav" class="sidenav">
      <a href="mahasiswa.php" id="home" class="fa fa-fw fa-home"></a>
      <a href="#" id="form" class="fa fa-fw fa-file"></a>
      <a href="status.php" id="status" class="fa fa-fw fa-map-pin"></a>
      <a href="#" id="notification" class="fa fa-fw fa-envelope"></a>
      <a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
    </div>

<!-- page-content-wrapper -->
    <div class="wrapper">
        <div class="container-fluid"> 
			<div id="content" class="col-md-10 col-md-offset-1 col-xs-12">
			<img src="unika.png" width="200" height="100" align="center">
				<div class="row"> 
					<div class="col-md-12"> 
						<div class="page-header clearfix"> 
							<h2 class="pull-left">Baru</h2> 
							   </div> 
						<?php 
						// Include config file 
						require_once 'config.php'; 
						 
						// Attempt select query execution 
						$sql = "SELECT * FROM buku20007"; 
						if($result = $mysqli->query($sql)){ 
							if($result->num_rows > 0){ 
								echo "<table class='table table-bordered table-striped'>"; 
									echo "<thead>"; 
										echo "<tr>"; 
											echo "<th>Nama Mahasiswa</th>"; 
											echo "<th>Dokumen</th>";           
											echo "<th>Keputusan</th>"; 
										echo "</tr>"; 
									echo "</thead>"; 
									echo "<tbody>"; 
									while($row = $result->fetch_array()){ 
										echo "<tr>"; 
											echo "<td>Bambang Nich</td>"; 
											echo "<td>";
												//echo <a href="cb.php" class="btn btn-success">Form</a> <a href="cb.php" class="btn btn-success">Rekomendasi</a> <a href="cb.php" class="btn btn-success">Rekomendasi</a>  </td>";
											echo "<td>"; 
												//echo "<a href='rb.php?id=". $row['id_buku20007'] ."' title='View Record' datatoggle='tooltip'><span class='glyphicon glyphicon glyphicon-ok'></span></a>"; 
												//echo "<a href='rb.php?id=". $row['id_buku20007'] ."' title='View Record' datatoggle='tooltip'><span class='glyphicon glyphicon glyphicon-remove'></span></a>"; 
											echo "</td>"; 
										echo "</tr>"; 
									} 
									echo "</tbody>";                             
								echo "</table>"; 
								// Free result set 
								$result->free(); 
							} else{ 
								echo "<p class='lead'><em>No records were found.</em></p>"; 
							} 
						} else{ 
							echo "ERROR: Could not able to execute $sql. " . $mysqli->error; 
						} 
						 
						// Close connection 
						$mysqli->close(); 
						?> 
					</div> 
		 <a href="cb.php" class="btn btn-success pull-right">Menambahkan Data</a> 
	 
				</div>         
			</div> 
		</div> 

<br><br><br>
<div class="footer" align="center">
  <p color="black" face="OCR A Std" size="2"><strong> &copy; Kelompok 4</strong></p>
</div>