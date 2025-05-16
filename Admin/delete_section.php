<?php
include("configure.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Optional: Check if the record exists
    $stmt_check = $con->prepare("SELECT id FROM websitesections WHERE id = ?");
    $stmt_check->bind_param("i", $id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows === 0) {
        $stmt_check->close();
        die("Section not found.");
    }
    $stmt_check->close();

    // Perform deletion with prepared statement
    $stmt_delete = $con->prepare("DELETE FROM websitesections WHERE id = ?");
    if (!$stmt_delete) {
        die("Prepare failed: " . $con->error);
    }

    $stmt_delete->bind_param("i", $id);

    if ($stmt_delete->execute()) {
        $stmt_delete->close();
        header("Location: website_section.php?status=success&message=" . urlencode("Section deleted successfully"));
        exit();
    } else {
        echo "Error deleting record: " . $stmt_delete->error;
    }

    $stmt_delete->close();
} else {
    echo "Invalid request.";
}
?>
