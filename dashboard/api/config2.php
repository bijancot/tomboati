<?php

$hostname = "tomboati.bgskr-project.my.id";
$database = "tomboati";
$username = "tomboati";
$password = "1sampaitombo";
$connect2 =  mysqli_connect($hostname, $username, $password, $database);

if (!$connect2) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>