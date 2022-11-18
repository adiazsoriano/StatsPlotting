<?php
session_start();
$file = basename($_SESSION["download"]);
sleep(2);

// header('Content-Description: File Transfer');
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=".$file);
// header('Content-Length: ' . filesize($file));
// readfile($file);
// ob_clean();
//
unset($_SESSION["download"]);
// header("Location: ../databaseStatsPage.php");
// exit();
?>