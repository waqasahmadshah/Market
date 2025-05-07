<?php
$servername = "localhost"; // usually localhost
$username = "root";
$password = "";
$database = "marketxsolution";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";
?>
