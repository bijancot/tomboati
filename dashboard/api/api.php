<?php
header("Content-Type: application/json");
require_once('Aksi.php');

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function aksi()
{
    return new Aksi();
}

function register()
{
    return aksi()->register();
}

function login()
{
    return aksi()->login();
}

function logout()
{
    return aksi()->logout();
}

function poin()
{
    return aksi()->poin();
}
