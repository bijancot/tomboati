<?php
include('config.php');
include('fungsi.php');

if(isset($_POST['add-member'])){

$sponsor = $_POST['sponsor'];
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$email = $_POST['email'];
$kota = $_POST['kota'];

$insert = mysqli_query($koneksi, "INSERT INTO order_pin 
(username, nama, handphone, email, sponsor, kota, timer )
VALUES
('$email', '$nama', '$handphone', '$email', '$sponsor', '$kota', now() )") or die(mysqli_error());

$userkey='kr14vq';
$passkey='kr14vq';
$message='
Tombo Ati 
Sdr ' . $nama . ' terimakasih Anda telah registrasi. Silahkan akses halaman https://lifeforwin.co.id/backoffice/info.php?username= ' . $email . ' untuk memengetahui cara upgrade membership.
';
// $url = 'https://reguler.zenziva.net/apps/smsapi.php';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$handphone.'&pesan='.urlencode($message));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);

header("Location:../$sponsor");
}
?>