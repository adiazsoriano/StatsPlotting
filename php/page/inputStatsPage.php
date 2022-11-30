<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Stats Visualization</title>
    <link rel="stylesheet" href="../../CSS/background.css">
    <link rel="stylesheet" href="../../CSS/input.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <style>
        <?php require "../../CSS/main.css"; ?>
    </style>
    <script>
         function scrollView() {
            document.getElementById(<?=isset($_POST["compute"]) ? "'graph'":"'inputdiv'";?>).scrollIntoView({behavior: "smooth",block: "end"});
            <?php if(!empty($_POST["compute"])) {echo  "drawGraph();";}?>
        }
    </script>
</head>

<body onload="scrollView();">
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;">Input Data</a>
                    <li class="nav-item">
                        <a class="nav-link" href="uploadStatsPage.php">Upload Data</a>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php"><?=isset($_SESSION["logintoken"]) ? "Account" : "Log In";?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php require_once "inputStats.php" ?>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>