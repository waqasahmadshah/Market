<?php
include "configure.php";

// Show errors (for development)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get values from the form
    $project_name = $_POST['project_name'];
    $client = $_POST['client'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : null;

    // Prepare SQL statement
    $sql = "INSERT INTO projects (project_name, client, description, status, start_date, end_date) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Create prepared statement
    $stmt = $con->prepare($sql);

    // Bind values to the statement
    $stmt->bind_param("ssssss", $project_name, $client, $description, $status, $start_date, $end_date);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to another page after success
        header("Location: http://localhost/Marketxsolution/admin/projects.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>
