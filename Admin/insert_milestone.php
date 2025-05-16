<?php
include "configure.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short = mysqli_real_escape_string($con, $_POST['year']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Insert into database
    $sql = "INSERT INTO milestone (`icon`, `name`, `description`, `year`) VALUES ('$icon','$title', '$description','$short' )";
    
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/mile_stone.php");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
}