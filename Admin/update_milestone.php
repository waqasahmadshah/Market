<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $year= mysqli_real_escape_string($con, $_POST['year']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Build the update query (FIXED EXTRA COMMA)
    $sql = "UPDATE milestone SET 
            icon ='$icon',
            name = '$title',
            description = '$description',
            year='$year'
             WHERE id = $id";
    
    // Execute the update
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/mile_stone.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    header("Location: http://localhost/Marketxsolution/admin/.php");
    exit();
}