<?php
include "configure.php";

// Validate and get the ID from URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Prepare delete query
    $stmt = $con->prepare("DELETE FROM projects WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("i", $id);

    // Execute query
    if ($stmt->execute()) {
        // Redirect on success
        header("Location: http://localhost/Marketxsolution/admin/projects.php");
        exit();
    } else {
        echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Record. Error: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();
} else {
    echo "<p style='color:red;margin: 10px 0;'>Invalid ID parameter.</p>";
}

// Close connection
mysqli_close($con);
?>
