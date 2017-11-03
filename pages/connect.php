<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="johnatar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('Asia/Bangkok');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>