<?php
session_start();
if(isset($_SESSION["download"]) && is_readable(basename($_SESSION["download"]))) {
    $file = basename($_SESSION["download"]);
    

    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Length: ' . filesize($file));

    $handle = fopen($file,"rb");
    echo fread($handle,filesize($file));
    fclose($handle);
    ob_flush();
    flush(); 

    unset($_SESSION["download"]);
}
?>