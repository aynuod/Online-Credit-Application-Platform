<?php
// Database connection information
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "salafin";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>