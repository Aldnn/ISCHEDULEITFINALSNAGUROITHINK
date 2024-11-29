<?php
include "dbconnect.php"; 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST['teacher_id'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT TeacherUsername FROM teacherlist WHERE TeacherUsername = ? AND TeacherPassword = ?");
    $stmt->bind_param("ss", $teacher_id, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $teacher_id; 
        header("Location: TeacherWeb.php"); 
        exit; 

    } else {
        echo "Invalid Teacher ID or password.";
    }

    $stmt->close();
    $conn->close();
}

?>