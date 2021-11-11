<?php
$hostname = "tomboatitour.biz";
$database = "tomboati";
$username = "tomboati";
$password = "1sampaitomboati";
$koneksi_tombo =  mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi_tombo) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>