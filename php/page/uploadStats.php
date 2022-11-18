<?php

require_once "../util/calculations.php";

//check submitted file
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('txt', 'cvs');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $array = file($fileDestination, FILE_SKIP_EMPTY_LINES);
                //print_r($array);
                //header("Location: ../../index.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "you cannot upload files of this type!";
    }
} //if statement (check submitted file)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
    <script src="../../script/plot.js"></script>
    <script>
        var x = <?php echo json_encode($array); ?>
    </script>
</head>

<body <?php if (!empty($_POST["submit"])) {
            echo "onload='return drawGraph()'";
        } ?>>
    <div <?php if (!empty($_POST["submit"])) {
                echo "class='graphdiv' id='graph'";
            } ?>>
    </div>
    <div class="uploadForm">
        <!-- uplaod file form -->
        <form method="POST" enctype="multipart/form-data" onsubmit="return notifyUser()">
            <input type="file" name="file">
            <button class="btn btn-primary" type="submit" name="submit" value="submit">UPLOAD</button>
        </form>
    </div>
</body>

</html>