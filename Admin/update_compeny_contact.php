<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    $Company_name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['Address']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $website = mysqli_real_escape_string($con, $_POST['Website']);
    $contact = mysqli_real_escape_string($con, $_POST['Contact']);

    // Build the update query (FIXED EXTRA COMMA)
    $sql = "UPDATE companycontact SET 
            address = '$address',
            email = '$email',
            website = '$website',
            phone_number = '$contact' 
            WHERE contact_id  = $id";
    
    // Execute the update
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/compeny_contact.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    header("Location: http://localhost/Marketxsolution/admin/.php");
    exit();
}