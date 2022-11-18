<?php
session_start();
require "../config/connection.php";

if(isset($_POST["user"]) && isset($_POST["password"])) {
    $query = "SELECT Username, Password FROM Users WHERE Username = :Username AND Password = :Password;";
    $args = array("Username" => $_POST["user"], "Password" => hash("sha256",$_POST["password"]));

    $userinfo;
    try {
        $statement = $pdo->prepare($query);
        $statement->execute($args);
        $userinfo = $statement->fetch();
    } catch (PDOException $e) {
        $_SESSION["message"] = "An error occured, please try again.";
        $userinfo = null;
    }

    if($userinfo != null && !empty($userinfo)) {
        
        $_SESSION["logintoken"] = $userinfo["Username"];
    } else {
        $_SESSION["message"] = "Please make sure the following fields are correct.";
    }

} else {
    $_SESSION["message"] = "Make sure all fields are filled before entering.";
}

header("Location: ../page/account.php");
exit();
?>