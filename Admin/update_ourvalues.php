<?php
include 'configure.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get and sanitize inputs
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $icon = mysqli_real_escape_string($con, $_POST['icon']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Update query
    $sql = "UPDATE ourvalues 
            SET name = '$name', icon = '$icon', description = '$description' 
            WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        // Redirect with success message
        header("Location: ourvalues_edit.php?id=$id&status=success");
        exit();
    } else {
        // Redirect with error message
        $error = urlencode(mysqli_error($con));
        header("Location: ourvalues_edit.php?id=$id&status=error&message=$error");
        exit();
    }

} else {
    // If accessed directly without POST data, redirect back to listing
    header("Location: ourvalues.php");
    exit();
}
