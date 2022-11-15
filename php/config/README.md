# Config
This is the information needed to connect to a local database.

## config.php
Inside this file, you'll need the following:
```php
<?php
DEFINE('db_type', 'database-type'); //usually 'mysql'
DEFINE('db_server', 'database-host'); //localhost if local
DEFINE('db_database', 'database-name');
DEFINE('db_port','database-port'); //default is 3306
DEFINE('db_charset','utf8mb4'); //or any 'database-charset'
DEFINE('db_user', 'database-username');
DEFINE('db_pass', 'database-password');
?>
```

***

## connection.php
Inside this file, you'll need the following:
```php
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
```

## otherfile.php
Inside this file, you'll need the following:
```php
<?php
require "connection.php";

//Other code here.
?>
```