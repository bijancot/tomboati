<?php

$hostname = "tomboatitour.biz";
$database = "tomboati";
$username = "tomboati";
$password = "1sampaitomboati";
$connect2 =  mysqli_connect($hostname, $username, $password, $database);

if (!$connect2) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>