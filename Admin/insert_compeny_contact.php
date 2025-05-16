<?php
include "configure.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Company_name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['Address']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $website = mysqli_real_escape_string($con, $_POST['Website']);
    $contact = mysqli_real_escape_string($con, $_POST['Contact']);

    // Insert into database
    $sql = "INSERT INTO companycontact (`company_id`, `address`, `email`, `website`, `phone_number`) VALUES ('$Company_name', '$address','$email','$website','$contact' )";
    
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Marketxsolution/admin/compeny_contact.php");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
}