<?php
 include "dbconnect.php";
session_start(); 

$admin_id = $_POST['admin_id']; 
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT AdminID FROM adminlist WHERE AdminID = ? AND Password = ?");
$stmt->bind_param("ss", $admin_id, $password); 
$stmt->execute();

$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $admin_id; 
    header("Location: homepage.php"); 
    exit; 
} else {
    echo "Invalid AdminID or password.";
}
$stmt->close();
$conn->close();
?>