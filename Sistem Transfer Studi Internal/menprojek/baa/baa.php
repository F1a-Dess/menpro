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
    
    <title>Halaman BAA</title>
    
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

      #kaprodi {
        top: 80px;
        background-color: #c377e0; 
      }

      #bak {
        top: 150px;
        background-color: #a86cc1;
      }

      #logout {
        top: 220px;
        background-color: #484553;
      }
    </style>
  </head>
  
  <body>    
    <div id="mySidenav" class="sidenav">
      <a href="baa.php" id="home" class="fa fa-fw fa-home"></a>
      <a href="kaprodi.php" id="kaprodi">Kaprodi</a>
      <a href="#" id="bak">BAK</a>
      <a href="../login/logout.php" id="logout" class="fa fa-fw fa-sign-out"></a>
    </div>

<!-- page-content-wrapper -->
    <div class="wrapper">
        <div class="container-fluid"> 
			<div id="content" class="col-md-10 col-md-offset-1 col-xs-12">
				<div class="row"> 
					<div class="col-md-12"> 
						<div class="page-header clearfix"> 
							<h1 class="pull-left">List Permohonan</h1> 
							   </div>
					<?php 
                    // Include config file 
                    require_once '../config/koneksi.php'; 
                     
                    // Attempt select query execution 
                    $sql = "SELECT * FROM data_mhs"; 
                    if($result = $connect->query($sql)){ 
                        if($result->num_rows > 0){ 
                            echo "<table class='table table-bordered table-striped'>"; 
                                echo "<thead>"; 
                                    echo "<tr>"; 
                                        echo "<th>Nama</th>";
                                        echo "<th>Dokumen</th>";
                                        echo "<th>Aksi</th>"; 
                                    echo "</tr>"; 
                                echo "</thead>"; 
                                echo "<tbody>"; 
                                while($row = $result->fetch_array()){ 
                                    echo "<tr>"; 
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='baa.php?id=". $row['id'] ."' title='Form' datatoggle='tooltip'><span class='btn btn-primary'> Form</span></a>"; 
                                        echo "&emsp;&emsp;&emsp;";
                                        echo "<a href='baa.php?id=". $row['id'] ."' title='Rekomendasi' datatoggle='tooltip'><span class='btn btn-primary'> Rekomendasi</span></a>"; 
                                        echo "&emsp;&emsp;&emsp;";
                                        echo "<a href='baa.php?id=". $row['id'] ."' title='Transkrip' datatoggle='tooltip'><span class='btn btn-primary'> Transkrip</span></a>";  
                                        echo "</td>";
                                        echo "<td>";  
                                            echo "<a href='baa.php?id=". $row['id'] ."' title='Terima' datatoggle='tooltip'><span class='btn btn-success'> Terima</span></a>"; 
                                            echo "&emsp;";
                                            echo "<a href='baa.php?id=". $row['id'] ."' title='Tolak' datatoggle='tooltip'><span class='btn btn-danger'> Tolak</span></a>"; 
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
                        echo "ERROR: Could not able to execute $sql. " . $connect->error; 
                    } 
                     
                    // Close connection 
                    $connect->close(); 
                    ?> 
							</h1>
						</div> 
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>

<br><br><br>

<div class="footer" align="center">
  <p color="black" face="OCR A Std" size="2"><strong> &copy; Kelompok 4</strong></p>
</div>
</body>
</html>