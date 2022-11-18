<?php 
session_start();
require "../util/calculations.php";
require "../config/connection.php";

$query = "SELECT Filename FROM Uploads WHERE Username = :Username;";
$cat = array("Username" => $_SESSION["logintoken"]);
try {
    $statement = $pdo->prepare($query);
    $statement->execute($cat);
    $dbinfo = $statement->fetchAll();
} catch (PDOException $e) {
    unset($_SESSION["logintoken"]);
    $_SESSION["message"] = "There was an error, you have been logged out.";

    header("Location: account.php");
    exit();
}

?>

<html>
    <head>
        <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
        <script>
            var uploads = <?=json_encode($dbinfo);?>;
            <?php
            if(isset($_SESSION["message"])) {
                echo "alert('" . $_SESSION["message"] . "');";
                unset($_SESSION["message"]);
            }
            if(isset($_POST["graph"]) || isset($_POST["download"])) {
                $packedfile;
                try {
                    $query = "SELECT File FROM Uploads WHERE Username = :Username AND Filename = :Filename;";
                    $args = array("Username" => $_SESSION["logintoken"]);

                    if(isset($_POST["graph"])) {
                        $args["Filename"] = $_POST["graph"];
                    }
                    if(isset($_POST["download"])) {
                        $args["Filename"] = $_POST["download"];
                    }

                    $statement = $pdo->prepare($query);
                    $statement->execute($args);
                    $packedfile = $statement->fetch();
                } catch(PDOException $e) {
                    $packedfile = null;
                }
                if($packedfile != null && isset($_POST["graph"])) {
                    echo "var x =" . unpacktoJSArr(unpack("I*",$packedfile["File"])) . ";\n";
                }
                if($packedfile != null && isset($_POST["download"])) {
                    $file = uniqid('', true) . '.txt';
                    $handle = fopen("./downloads/" . $file ,"wb");
                    $rawfile = unpack("I*",$packedfile["File"]);
                    foreach($rawfile as $value) {
                        fwrite($handle,$value.PHP_EOL);
                    }
                    fclose($handle);
                    
                    $_SESSION["download"] = "./downloads/".$file;
                    header("Location: ./downloads/download.php");
                }
            }
            ?>
        </script>
        <script src="../../script/plot.js"></script>
        <script src="../../script/util.js"></script>
        <script>
            function initView() {
                showFiles('files',uploads);
                <?=isset($_POST["graph"]) ? "drawGraph();" : "";?>
            }
        </script>
    </head>
    <body onload="return initView()">
        <div <?=isset($_POST["graph"]) ? "class='graphdiv'" : "";?> id="graph"></div>
        <div class="uploadForm">
            <form action="../util/uploadDB.php" enctype="multipart/form-data" method="POST">
                <label>Upload a file (.txt,.csv):</label>
                <input type="file" name="file">
                <button class="btn btn-primary" type="submit" name="submit" value="submit">UPLOAD</button>
            </form>
        </div>
        <hr>
        <div class="dbfiles">
            <form method="POST"><div class="filetable" id="files"></div></form>
        </div>
    </body>
</html>