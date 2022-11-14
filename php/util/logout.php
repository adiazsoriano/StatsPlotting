<?php
session_start();

if(isset($_SESSION["logintoken"])) {
    unset($_SESSION["logintoken"]);
}

$_SESSION["message"] = "You have been successfully logged out.";
header("Location: ../page/account.php");
exit();
?>