<?php

$hostname = "tomboatitour.biz";
$database = "dash_tombo";
$username = "tomboati";
$password = "tomboati";
$connect2 =  mysqli_connect($hostname, $username, $password, $database);

if (!$connect2) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>