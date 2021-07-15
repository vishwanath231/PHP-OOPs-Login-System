<?php


include_once '../controller/Controller.php';

//Define key variable for custom error message

//Define key variable for connection
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'pdo';

// set DNS --> Data Source Name
$DNS = 'mysql:host=' . $DB_HOST . '; dbname=' . $DB_NAME;

// set PDO --> PHP Data Object

try {
    $db_conn = new PDO($DNS, $DB_USER, $DB_PASSWORD);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
   echo $e->getMessage();
}

$user = new User($db_conn);

   
?>

