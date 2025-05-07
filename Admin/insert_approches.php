<?php
include "configure.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Insert into database
    $sql = "INSERT INTO process (`name`, `description`) VALUES ('$title','$description')";
    
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/apporaches.php");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
}