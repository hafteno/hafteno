<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'hafteno';

// Create a connection
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
