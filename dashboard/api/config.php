<?php

$hostname = "dash-tombo.bgskr-project.my.id";
$database = "dash_tombo";
$username = "dash_tombo";
$password = "1sampaitombo";
$connect =  mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?>