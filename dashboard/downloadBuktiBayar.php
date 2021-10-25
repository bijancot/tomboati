<?php
session_start();
include 'config.php';
$file = $_GET['file'];
if (!$file) {
    $_SESSION["error"] = 'File Bukti Bayar Tidak Ada !';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $maxRead = 1 * 1024 * 1024; // 1MB
    $fileName = basename($file);

    // Open a file in read mode.
    $fh = fopen($file, 'r');

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    while (!feof($fh)) {
        // Read and output the next chunk.
        echo fread($fh, $maxRead);
        ob_end_clean();
    }
    exit;
}
?>