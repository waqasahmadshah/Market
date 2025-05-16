<?php
include 'configure.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Delete query
    $sql = "DELETE FROM ourvalues WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        // Redirect back with success message
        header("Location: ourvalues.php?status=deleted");
        exit();
    } else {
        // Redirect back with error message
        $error = urlencode(mysqli_error($con));
        header("Location: ourvalues.php?status=error&message=$error");
        exit();
    }
} else {
    // If no ID provided, redirect back
    header("Location: ourvalues.php");
    exit();
}
