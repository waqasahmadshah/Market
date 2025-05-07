<?php
include "configure.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = mysqli_real_escape_string($con, $_POST['service']);
    $short = mysqli_real_escape_string($con, $_POST['card_title']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Insert into database
    $sql = "INSERT INTO services_card (`services_card_name`, `services_card_description`, `icon`, `service_id`) VALUES ('$short', '$description','$icon','$service_name' )";
    
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/services.php");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
}