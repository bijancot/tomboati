<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Cara aman khusus kita untuk memulai sebuah sesi PHP.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // Kata kunci yang sudah disandikan.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../protected_page.php');
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
    }
} else {
    // Variabel-variabel POST yang benar tidak dikirimkan ke halaman ini.
    echo 'Invalid Request';
}