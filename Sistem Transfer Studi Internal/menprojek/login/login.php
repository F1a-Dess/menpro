<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function validasi() {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;		
			if (username != "" && password!="") {
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
			background: #ae2d68;
		}

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

<div class="kotak_login">
<form method="post" action="magicwords.php" id="loginform" onsubmit="return validasi()"> 

	<b>Email:</b> 
	<input type="text" name="username" id="username" class="form_login" placeholder="Email"/><br>

	<b>Password:</b> 
	<input type="password" name="password" id="password" class="form_login" placeholder="Password"/><br> 

	<input id="submitbutton" type="submit" value="Login" class="tombol_login"/>
	<br><br>
	<a href = "logout.php">Kembali</a>
</form>
</div>
</body>
</html>