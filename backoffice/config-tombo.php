<?php
$hostname = "tomboati.bgskr-project.my.id";
$database = "tomboati";
$username = "tomboati";
$password = "1sampaitombo";
$koneksi_tombo =  mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi_tombo) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>