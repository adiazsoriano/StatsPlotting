<?php
session_start();
require "../config/connection.php";

$user = $_POST["user"];
$name = $_POST["name"];
$pass = hash("sha256",$_POST["password"]);

$query = "INSERT INTO Users(Username,Name,Password)
    VALUES(:Username,:Name,:Password);";
$cat = array("Username" => $user, "Name" => $name, "Password"=> $pass);

try {
    $pdo->beginTransaction();
    $statement = $pdo->prepare($query);
    $statement->execute($cat);
    $pdo->commit();
    $_SESSION["message"] = "Successfully registered. Please log in.";
} catch (PDOException $e) {
    $pdo->rollback();
    $_SESSION["message"] = "Failed to register, please try again";
}

header("Location: ../page/account.php");
exit();   
?>