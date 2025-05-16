<?php
include "configure.php";

// Get the ID from URL and sanitize it
$id = $_GET['id']; // Use intval to ensure it's an integer

// Delete query
// $sql = "DELETE FROM companycontact WHERE id = '$id'"; 
$sql="DELETE FROM companycontact WHERE `companycontact`.`contact_id` = '$id'";// Corrected SQL syntax

// Execute query
if (mysqli_query($con, $sql)) {
    // Redirect on success
    header("Location: http://localhost/Marketxsolution/admin/compeny_contact.php");
    exit(); // Important to stop script execution after redirect
} else {
    // Show error if query fails
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Record. Error: " . mysqli_error($con) . "</p>";
}

// Close connection
mysqli_close($con);
?>
