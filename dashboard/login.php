<?php
include('config.php');
include('fungsi.php');
// Turn off all error reporting
ini_set('display_errors',0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

session_start(); // Menciptakan session

if(cek_login($mysqli) == true){
	header('location: index.php');
	exit();	
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['username']) and isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


 $secret = '6LekPFYUAAAAANn9cgc_t4JbULtGV_E_rkyi_zIn';
 $user_ip = $_SERVER['REMOTE_ADDR'];

		if(login($username, $password, $mysqli) == true){

        $lastlogin = gmdate("Y-m-d H:i:s", gmmktime(gmdate("H")+7));
        $dbq1 = "INSERT INTO login_session SET
            username = '$username',
            string = '$secret',
            lastlogin = '$lastlogin'";
        $res = mysqli_query($koneksi,$dbq1);

			// Berhasil login
			header('location: index.php');
			exit();
		}else{
			// Gagal login
			header('location: login.php');
			exit();	
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login | Tombo Ati</title>
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://tomboatitour.biz/assets/img/logo_tomboati.png" type="image/x-icon" />
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.icoxx"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://wallpaperaccess.com/full/123112.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<img src="images/logosvarga.png" width="70">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Login Member
					</span>
					<div>
<font color="yellow"><?php echo $_GET['error']; ?></font>
<br><br>					</div>


					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							LOGIN
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="password-login.php">
							saya sudah memiliki keanggotaan
						</a><br>
						<a class="txt1" href="password-login.php">
							daftarkan keanggotaan baru
						</a><br>
						<a class="txt1" href="password-login.php">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<a href="password-login.php"><font color="white">FORGOT PASSWORD</a></h3>

</body>
</html>