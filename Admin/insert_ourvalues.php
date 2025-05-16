<?php
// Database connection
include 'configure.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape and validate inputs
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // SQL insert query
    $sql = "INSERT INTO ourvalues (name, icon, description, created_at) 
            VALUES ('$name', '$icon', '$description', NOW())";

    // Execute query
    if (mysqli_query($con, $sql)) {
        // Redirect or show success
        header("Location: ourvalues.php?status=success");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

} else {
    // If not POST, redirect back to form
    header("Location: ourvalues_add.php");
    exit();
}
?>
