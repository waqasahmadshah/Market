<?php
include "configure.php";

// Get the ID from URL
$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM process WHERE id= {$id}";

// Execute query
if(mysqli_query($con, $sql)) {
    // Redirect on success
    header("Location: http://localhost/Marketxsolution/admin/apporaches.php");
    exit(); // Important to stop script execution after redirect
} else {
    // Show error if query fails
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Record. Error: " . mysqli_error($con) . "</p>";
}

// Close connection
mysqli_close($con);
?>