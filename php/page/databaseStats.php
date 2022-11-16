<?php
// session_start();
require_once "../util/calculations.php";
require "../config/connection.php";


//get num of rows from DB
$q1 = "SELECT COUNT(*) FROM Uploads WHERE username = 'test'";
$rCount = $pdo->query("SELECT COUNT(*) FROM Uploads WHERE username = 'test'")->fetchColumn();
echo $rCount;

//get files from db
$i = 0;
while ($i < $rCount) {
    $q2 = "SELECT file FROM Uploads WHERE username = 'test'";
    $sth = $pdo->prepare($q2);
    $sth->execute();
    $resArr = $sth->fetchAll(\PDO::FETCH_ASSOC);

    $i++;
}
print_r($resArr);
echo "<br>";
echo "<br>";
$str = $resArr[1]['file'];
echo "str: " . var_dump($str);
$file = uniqid('', true) . '.txt';
file_put_contents('./downloads/' . $file, $str);
$arrX = file('./downloads/' . $file, FILE_SKIP_EMPTY_LINES);
echo "<br>";
echo "<br>";
var_dump($arrX);

/* $query = "SELECT * FROM Uploads";
$s1 = $pdo->query($query);
$table = $s1->fetchAll();


echo json_encode(unpack("I*", $table[0]["File"])) . "\n";
echo json_encode(unpack("I*", $table[1]["File"])) . "\n"; */


?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
    <script src="../../script/plot.js"></script>
    <script>
        var x = <?php echo json_encode($arrX); ?>
        drawGraph();
    </script>
</head>

<body <?php if (!empty($resArr)) {
            echo "onload=' return drawGraph()'";
        } ?>>
    <?php if (!empty($resArr)) {
        while ($i < $rCount) {
            echo "<div class='graphdiv" . "$i' id='graph" . "$i'></div>";
        }
    } ?>

    </div>

</body>

</html>