<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Build the update query (FIXED EXTRA COMMA)
    $sql = "UPDATE process SET 
            name = '$title',
            description = '$description'
             WHERE id = $id";
    
    // Execute the update
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/apporaches.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    header("Location: approches.php");
    exit();
}