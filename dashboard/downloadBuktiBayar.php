<?php

$file = $_GET['file'];

if(!$file)
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
         die('File tidak ada !');
    }
    else
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        ob_clean();
        flush();
        readfile($file);
        exit;
     }
?>