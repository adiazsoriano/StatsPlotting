<?php
session_start();
require "../config/connection.php";

if(isset($_POST["submit"])) {
    $file = $_FILES["file"];

    $fileExt = explode('.', $file["name"]);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("txt", "csv");

    if(in_array($fileActualExt,$allowed)) {

        if(filesize($file["tmp_name"]) <= 0) {
            $_SESSION["message"] = "Please do not submit empty files!";
            header("Location: ../page/databaseStatsPage.php");
            exit();
        }

        $handle = fopen($file["tmp_name"], "rb");

        $filecontent;
        if($fileActualExt == 'csv') {
            $filecontent = fgetcsv($handle);
        } else {
            $rawcontent = fread($handle,filesize($file["tmp_name"]));
            $filecontent = explode(PHP_EOL,$rawcontent);
        }
        $packedfile = pack("I*", ...$filecontent);

        try {
            $pdo->beginTransaction();
            $query = "INSERT INTO Uploads(Username, Filename, File)
                    VALUES(:Username,:Filename,:File);";
            $args = array("Username" => $_SESSION["logintoken"],"Filename" => $file["name"],"File" => $packedfile);

            $statement = $pdo->prepare($query);
            $statement->execute($args);

            $pdo->commit();
            $_SESSION["message"] = "Successfully uploaded to the database!";
        } catch (PDOException $e) {
            $pdo->rollBack();
            $_SESSION["message"] = "Error in uploading, please try again.";
        }

        fclose($handle);
        header("Location: ../page/databaseStatsPage.php");
        exit();
    } else {
        $_SESSION["message"] = "Please upload either a csv or txt file!";

        header("Location: ../page/databaseStatsPage.php");
        exit();
    }
}
?>