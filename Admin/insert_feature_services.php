<?php
include "configure.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = mysqli_real_escape_string($con, $_POST['service']);
    $short = mysqli_real_escape_string($con, $_POST['feature_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Insert into database
    $sql = "INSERT INTO service_features (`services_id`, `feature_name`, `feature_des`) VALUES ('$service_name', '$short', '$description')";
    
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/services.php");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
}