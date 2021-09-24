<?php
include('config.php');
include('fungsi.php');

// session_start();

// if(cek_login($mysqli) == false){ // Jika user tidak login
// 	header('location: login.php'); // Alihkan ke halaman login (login.php)
// 	exit();	
// }

// $stmt = $mysqli->prepare("SELECT userid FROM mebers WHERE id = ?");
// $stmt->bind_param('i', $_SESSION['id']);
// $stmt->execute();
// $stmt->store_result();
// $stmt->bind_result($username);
// $stmt->fetch();

// $sql = mysqli_query($koneksi, "SELECT * FROM mebers WHERE id = '$_SESSION[id]' ");
// $row = mysqli_fetch_assoc($sql);
// $usernamex = $row[userid];

// $dbres = mysqli_query($koneksi,"DELETE FROM login_session WHERE username='$usernamex'");

// $now = gmdate("d-m-Y H:i:s", gmmktime(gmdate("H")+$conf['mytime']));
// $savehistorylogin="UPDATE mebers SET last_login=now() WHERE userid='$usernamex'";
// $resupdate=mysqli_query($koneksi,$savehistorylogin);

// session_start();
// session_destroy();

header('location:../backoffice/dashboard.php');
?>