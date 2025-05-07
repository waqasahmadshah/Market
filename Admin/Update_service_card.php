<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    $service = mysqli_real_escape_string($con, $_POST['service']);
    $title = mysqli_real_escape_string($con, $_POST['card']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Build the update query (FIXED EXTRA COMMA)
    $sql = "UPDATE services_card SET 
            services_card_name = '$title',
            services_card_description = '$description', 
            icon = '$icon'
            WHERE services_card_id = $id";
    
    // Execute the update
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/services.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    header("Location: http://localhost/Marketxsolution/admin/.php");
    exit();
}