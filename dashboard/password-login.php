<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['login-password'])){

$username=$_POST['username'];

$sql_login = mysqli_query($koneksi, "SELECT * FROM mebers WHERE userid='$username' ");
$row_login = mysqli_fetch_assoc($sql_login);
$user_name=$row_login['name'];
$user_id=$row_login['id'];
$user_email=$row_login['email'];
$user_userid=$row_login['userid'];
$user_passwd=$row_login['passw'];
$user_hphone=$row_login['hphone'];

IF ($user_userid!==$user_userid){
header('location:login-password.php?error=USERNAME FAILED');	
;}

//Kirim Email

$newuser_msg =" 
Sdr. $user_name, berikut password login Anda :

Username  : $user_userid
Password : $user_passwd

Login to Mitra area :
https://TomboAti/backoffice/login.php.

----------------------------
Webmaster
TomboAti
admin@TomboAti

";

            $admin_varian = "variancorp@gmail.com";
            $admin_em = "TomboAti <admin@TomboAti>";
            $pastitle = "Forgot Password - TomboAti";
            $pastitle2 = "Forgot Password - TomboAti";

            $headers = "From: $admin_em\r\n";
            $headers .= "Reply-To: $admin_em\r\n";
            $headers .= "X-Priority: 1\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

//           mail($user_email, $pastitle, $newuser_msg, $headers);
//          mail($admin_varian, $pastitle2, $newuser_msg, $headers);

$userkey='kr14vq';
$passkey='kr14vq';

$message='
TomboAti. Sdr/i. '.$user_name.', password Anda '.$user_passwd.'. Segera login dan update password Anda!
';

$url = 'https://reguler.zenziva.net/apps/smsapi.php';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$user_hphone.'&pesan='.urlencode
($message));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);

header('location:login.php?error=TERIMA KASIH... silahkan check Email anda dan demi keamanan, gantilah Password anda melalui Mitra AREA');	
;}

?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login Lifeforwin</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="password-login.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login-password">
							Forgot Password
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="login.php">
							Mitra Login
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