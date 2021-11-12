<?php

$hostname = "tomboatitour.biz";
$database = "dash_tombo";
$username = "tomboati";
$password = "1sampaitomboati";
$connect =  mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>