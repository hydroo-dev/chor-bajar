<?php
include '../config/db.php';
session_start();

// Admin check
if($_SESSION['user_role'] != 'admin'){
    header("Location: ../public/index.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM products WHERE id='$id'");
}
header("Location: products.php");
exit();
