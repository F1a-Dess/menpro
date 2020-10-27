<?php
require_once '../config/koneksi.php';
session_start();

if($_SESSION['email']=="")
{
  header("location:../login/accdenied.php");
}
if($_SESSION['level']!="bak")
{
  header("location:../login/accdenied.php");
}  

$link = mysqli_connect("127.0.0.1","group05","05osan","group05");
$email = $_SESSION['email'];

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

  <title>BAK</title>

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
  <div class="wrapper">
    <div class="container-fluid"> 
      <div id="content" class="col-md-10 col-md-offset-1 col-xs-12">      
        <div class="row">
          <div class="col-md-12"> 
            <div class="page-header clearfix"> 
              <div class="column left" style="background-color:white;">
                <div class="sidenav">
                  <a class="sidenav-brand"> <img src="../pictures/logo.png" width="150px" height="80px"> </a>

                  <a href="bak.php" id="home" class="active glyphicon glyphicon-time"> Inbox</a>

                  <hr>

                  <a href="bak_acc.php" id="bak_acc" class="active glyphicon glyphicon-ok"> Teririm</a>

                  <a href="bak_bayar.php" id="bak_bayar" class="active glyphicon glyphicon-usd"> Pembayaran</a>

                  <a href="../login/logout.php" id="logout" class=" glyphicon glyphicon-log-out"> Logout</a>
                </div>
              </div>

              <div class="column right" style="background-color:white;">
                <h1 class="pull-left">&emsp;BAK</h1>
                <div class="page-header clearfix"> 
                  <br>
                  <br>
                  <h3 class="pull-left">&emsp;&emsp;List Biaya Studi Terkirim</h3> 
                </div>
                <?php 
                    // Include config file 
                require_once '../config/koneksi.php'; 

                    // Attempt select query execution 
                $sql = "SELECT * FROM data_mhs WHERE biaya_studi = 1"; 
                if($result = $connect->query($sql)){ 
                  if($result->num_rows > 0){ 
                    echo "<table class='table table-bordered table-striped'>"; 
                    echo "<thead>"; 
                    echo "<tr>"; 
                    echo "<th>Nama</th>";
                    echo "<th>Biaya Studi</th>";
                    echo "<th>Aksi</th>"; 
                    echo "</tr>"; 
                    echo "</thead>"; 
                    echo "<tbody>"; 
                    while($row = $result->fetch_array()){ 
                      echo "<tr>"; 
                      echo "<td>" . $row['nama'] . "</td>";
                      echo "<td>";
                      echo "<a href='biaya_studi.php?id=". $row['user_id'] ."' title='Biaya Studi' datatoggle='tooltip'><span class='btn btn-primary'> Biaya Studi</span></a>";
                      echo "</td>";
                      echo "<td>";  
                      echo "<a href='edit_biaya.php?id=". $row['user_id'] ."' title='Edit' datatoggle='tooltip'><span class='btn btn-success'> Edit</span></a>"; 
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>