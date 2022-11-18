<?php
session_start();
if(isset($_SESSION["logintoken"])) {
    header("Location: databaseStatsPage.php");
    exit();
}   
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../../CSS/background.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../../script/validation.js"></script>
    <script>
        <?php
        if(isset($_SESSION["message"])) {
            echo "alert('" . $_SESSION["message"] . "');";
            unset($_SESSION["message"]);
        }
        ?>
        function scrollView() {
            document.getElementById("login-box").scrollIntoView({behavior: "smooth",block: "center"});
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
                        <a class="nav-link" href="inputStatsPage.php">Input Data</a>
                    <li class="nav-item">
                        <a class="nav-link" href="uploadStatsPage.php">Upload Data</a>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div id="login-box" class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2> Login Here </h2>
                    <form action="../util/validation.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="loginpass" type="password" name="password" class="form-control" required>
                            <label>Show Password</label>
                            <input type="checkbox" onclick="showPassword('loginpass')">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2> Register here </h2>
                    <form action="../util/registration.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                            <label>Show Password</label>
                            <input type="checkbox" onclick="showPassword('password')">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="confirm" type="password" name="password" class="form-control" oninput="confirmPassword()" required>
                            <label>Show Confirm Password</label>
                            <input type="checkbox" onclick="showPassword('confirm')">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>