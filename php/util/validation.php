<?php
session_start();
require "../config/connection.php";

if(isset($_POST["user"]) && isset($_POST["password"])) {
    $query = "SELECT Username, Password FROM Users;";
    $statement = $pdo->query($query);
    $fetch = $statement->fetch();

    $user = $fetch["Username"];
    $password = $fetch["Password"];

    if($user == $_POST["user"] && 
        $password == hash("sha256",$_POST["password"])) {
        
        $_SESSION["logintoken"] = uniqid("",true);
    } else {
        $_SESSION["message"] = "Please make sure the following fields are correct.";
    }

} else {
    $_SESSION["message"] = "Make sure all fields are filled before entering.";
}

header("Location: ../page/account.php");
exit();
?>