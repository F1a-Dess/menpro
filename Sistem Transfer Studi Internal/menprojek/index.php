<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Transfer Mahasiswa Internal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
    function validasi() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;   
      if (email != "" && password!="") {
        return true;
      }else{
        alert('Email dan Password harus di isi !');
        return false;
      }
    }
  </script>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <style type="text/css">
    body{
      font-family: sans-serif;
      background: #f3f3f3;
    }
    /*#ae2d68*/
    h1{
      text-align: center;
      /*ketebalan font*/
      font-weight: 300;
    }

    .tulisan_login{
      text-align: center;
      /*membuat semua huruf menjadi kapital*/
      text-transform: uppercase;
    }

    .kotak_login{
      width: 350px;
      background: white;
      /*meletakkan form ke tengah*/
      margin: 80px auto;
      padding: 30px 20px;
    }

    label{
      font-size: 11pt;
    }

    .form_login{
      /*membuat lebar form penuh*/
      box-sizing : border-box;
      width: 100%;
      padding: 10px;
      font-size: 11pt;
      margin-bottom: 20px;
    }

    .tombol_login{
      background: #46de4b;
      color: white;
      font-size: 11pt;
      width: 100%;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
    }

    .tombol_cancel{
      background: #D31122;
      color: white;
      font-size: 11pt;
      width: 100%;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
    }

    .link{
      color: #232323;
      text-decoration: none;
      font-size: 10pt;
    }
  </style>
  </head>
 
<body>
<!-- 
<h1>
  <font color="white"><strong>Sistem Transfer Studi Mahasiswa Internal
    <br/>Unika Soegijapranata</strong>
  </font>
</h1> -->

<div class="kotak_login">
  <div class="mb-5">
    <img src="pictures/unika.png" width="300" height="150" class="center">
  </div>
  
<form method="post" action="/menpro/Sistem Transfer Studi Internal/menprojek/login/magicwords.php" id="loginform" onsubmit="return validasi()"> 

  <b>Email:</b> 
  <input type="text" name="email" id="email" class="form_login" placeholder="Email"/><br>

  <b>Password:</b> 
  <input type="password" name="password" id="password" class="form_login" placeholder="Password"/><br> 

  <input id="submitbutton" type="submit" value="Login" class="tombol_login"/>
</form>
</div>


<div class="footer" align="center">
  <font color="white" face="OCR A Std" size="2">&copy; Kelompok 4</font>
</div>

</body>
</html>