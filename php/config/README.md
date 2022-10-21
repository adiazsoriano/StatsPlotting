# Config
This is the information needed to connect to a local database.

## config.php
Inside this file, you'll need the following:
```php
<?php
DEFINE('db_user', 'database-username-here');
DEFINE('db_password', 'database-password-here');
DEFINE('db_host', 'database-host-here'); //localhost is used if it's a local database.
DEFINE('db_name', 'database-name-here');
?>
```
--
## connection.php
Inside this file, you'll need the following:
```php
<?php
require_once "config.php";

echo "Welcome to the connection system.";

$connect = mysqli_connect(db_host, db_user, db_password, db_name);

if($connection->connect_errno) {
    echo "There was an issue connecting to the database.";
    die();
} else {
    //code and queries go here.
}

?>
```