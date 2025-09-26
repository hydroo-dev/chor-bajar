<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "chor_bajar";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
