<?php
define("HOST", "tomboati.bgskr-project.my.id");
define("USER", "tomboati");
define("PASSWORD", "1sampaitombo");
define("DATABASE", "tomboati");

$mysqli_tombo = new mysqli(HOST, USER, PASSWORD, DATABASE);
$koneksi_tombo = new mysqli(HOST, USER, PASSWORD, DATABASE);
// mengecek koneksi
if (!$koneksi_tombo) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";
?>