<?php
function login($username, $password, $mysqli)
{
	// Menggunakan perintah prepared statement untuk menghindari SQL injection

	if ($stmt = $mysqli->prepare("SELECT id, passw FROM mebers WHERE userid = ?")) {
		$stmt->bind_param('s', $username); // Menyimpan data inputan username ke variabel "$username"
		$stmt->execute(); // Menjalankan perintah query MySQL diatas
		$stmt->store_result();
		$stmt->bind_result($id, $dbpassword); // Menyimpan nilai hasil query ke variabel
		$stmt->fetch();

		if ($stmt->num_rows == 1) { // Jika user ada/ditemukan
			if ($dbpassword == $password) { // Lakukan pengecekan password sesuai atau tidak dengan data di database
				// Jika sama ciptakan SESSION id dan password_login
				$id = preg_replace("/[^0-9]+/", "", $id);
				$_SESSION['id'] = $id;
				$_SESSION['password_login'] = $password;
				// Login berhasil
				return true;
			} else {
				// Password tidak sesuai
				return false;
			}
		} else {
			// User tidak ditemukan
			return false;
		}
	}
}

function cek_login($mysqli)
{
	// Cek apakah semua variabel session ada / tidak
	if (isset($_SESSION['id'], $_SESSION['password_login'])) {
		$id = $_SESSION['id'];
		$password_login = $_SESSION['password_login'];

		if ($stmt = $mysqli->prepare("SELECT passw FROM mebers WHERE id = ? LIMIT 1")) {
			$stmt->bind_param('i', $id); // Menyimpan data id user ke variabel "$id"
			$stmt->execute(); // Menjalankan perintah query MySQL diatas
			$stmt->store_result();

			if ($stmt->num_rows == 1) { // Jika user ada/ditemukan
				$stmt->bind_result($password);
				$stmt->fetch();

				if ($password_login == $password) { // Jika passwordnya sesuai
					// User melakukan login
					return true;
				} else {
					// User tidak melakukan login
					return false;
				}
			} else {
				// User tidak melakukan login
				return false;
			}
		} else {
			// User tidak melakukan login
			return false;
		}
	} else {
		// User tidak melakukan login
		return false;
	}
}

// BASE URL
if (!function_exists('base_url')) {
	function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
	{
		if (isset($_SERVER['HTTP_HOST'])) {
			$http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
			$hostname = $_SERVER['HTTP_HOST'];
			$dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			$core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
			$core = $core[0];
			$tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
			$end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
			$base_url = sprintf($tmplt, $http, $hostname, $end);
		} else $base_url = 'http://localhost/';
		if ($parse) {
			$base_url = parse_url($base_url);
			if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
		}
		return $base_url;
	}
}
$base_url = base_url();
?>