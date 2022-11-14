<?php
require "config.php";

$options = array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false);

$pdo;
$dsn = db_type.":host=".db_server.";dbname=".db_database.";port=".db_port.";charset=".db_charset; 

try {
    $pdo = new PDO($dsn, db_user, db_pass, $options);
} catch (PDOException $e) {
    echo "Connection has failed.\n";
    echo $e->getMessage();
    $pdo = null;
} 
?>