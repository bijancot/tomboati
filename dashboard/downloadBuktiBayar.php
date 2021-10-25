<?php
session_start();
include 'config.php';
$file = $_GET['file'];
// if (!$file) {
//     $_SESSION["error"] = 'File Bukti Bayar Tidak Ada !';
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// } else {
//     $maxRead = 1 * 1024 * 1024; // 1MB
//     $fileName = basename($file);

//     // Open a file in read mode.
//     $fh = fopen($file, 'r');

//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="' . $fileName . '"');

//     while (!feof($fh)) {
//         // Read and output the next chunk.
//         echo fread($fh, $maxRead);
//         fclose($fh);
//         // ob_flush();

//     }
//     exit;
// }
// if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
// $file_name ='../backoffice/gambar_transfer'.DS.$_GET['file'];
// if (is_file($file_name)) {
//     if (ini_get('zlib.output_compression')) {
//         ini_set('zlib.output_compression', 'ON');
//     }
//     switch (strtolower(substr(strrchr($file_name, '.'), 1))) {
//         case 'jpeg':
//             $mime = 'image/jpeg';
//             break; // images jpeg
//         case 'jpg':
//             $mime = 'image/jpg';
//             break;
//         default:
//             $mime = 'application/force-download';
//     }
//     header('Content-Type:application/force-download');
//     header('Pragma: public');       // required
//     header('Expires: 0');           // no cache
//     header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//     header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($file_name)) . ' GMT');
//     header('Cache-Control: private', false);
//     header('Content-Type: ' . $mime);
//     header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
//     header('Content-Transfer-Encoding: binary');
//     // header('Content-Length: '.filesize($file_name));      // provide file size
//     header('Connection: close');
//     readfile($file_name);
//     exit();
// }
$url = $_GET['file'];
if ($url != '')
{
    $filename = end(explode('/', $url));
    $fileext = strtolower(end(explode('.', $filename)));
    
    if ($fileext == 'jpg' || $fileext == 'jpeg') { $type = 'image/jpeg'; }
    if ($fileext == 'png') { $type = 'image/png'; }
    if ($fileext == 'gif') { $type = 'image/gif'; }
    
    //$size = filesize($url);
    header("Content-Type: $type");
    header("Content-disposition: attachment; filename=\"" . $filename . "\"");
    header("Content-Transfer-Encoding: binary");
    //header("Content-Length: " . $size);
    readfile($url);
}else{
    $_SESSION["error"] = 'File Bukti Bayar Tidak Ada !';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
}
