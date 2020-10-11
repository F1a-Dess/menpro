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
                $nim = $row['nim_asal'];
        
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

      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
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
    <div id="page-content-wrapper" class="page-content-toggle">
        <div class="container-fluid">            

            <div class="row">
                <div id="content" class="col-md-8 col-md-offset-1 col-xs-12">

<h1 class="center">Status</h1>

<div class="card">
  <img src="../pictures/profil.png" alt="John" style="width:100%">
  <h1><?php echo "$nama"; ?></h1>
  <p class="title">NIM awal: <?php echo "$nim"; ?></p>
  <p>Status: <font size="3"><strong><?php echo "$status"; ?></strong></font></p>
  <p>&emsp;</p>
</div>

<br><br><br><br>
<div class="footer" align="center">
  <p color="black" face="OCR A Std" size="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong> &copy; Kelompok 4</strong></p>
</div>