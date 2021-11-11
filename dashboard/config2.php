<?php

$hostname = "tomboatitour.biz";
$database = "tomboati";
$username = "tomboati";
$password = "1sampaitombo";
$koneksi2 =  mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi2) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>