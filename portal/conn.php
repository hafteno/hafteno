<?php
$dbhost = 'localhost';
$dbusername = 'project';
$dbpassword = '70127074';
$dbname = 'hafteno';

// Create a connection
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
