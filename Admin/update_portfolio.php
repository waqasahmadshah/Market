<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    // Make sure the 'service_id' field matches the select's name attribute
    $service_id = isset($_POST['service_id']) ? (int)$_POST['service_id'] : 0;
    if ($service_id <= 0) die("Invalid service selected");

    $title = mysqli_real_escape_string($con, $_POST['project']);
    $url = mysqli_real_escape_string($con, $_POST['url']);
    $short = mysqli_real_escape_string($con, $_POST['tech']);

    // Initialize image variables
    $image_update = '';
    $old_image = '';

    // Handle image upload if provided
    if (isset($_FILES['image_urle'])) {
        $file = $_FILES['image_urle'];

        // Only process if file was actually uploaded
        if ($file['error'] == UPLOAD_ERR_OK) {
            $allowed_types = ["jpeg", "jpg", "png"];
            $max_size = 12 * 1024 * 1024; // 2MB

            // Get file extension
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            // Check file type and size
            if (!in_array($ext, $allowed_types)) {
                die("Error: Only JPG, JPEG, PNG files are allowed.");
            }

            if ($file['size'] > $max_size) {
                die("Error: File must be 12MB or smaller.");
            }

            // Generate unique filename
            $new_filename = uniqid('hero_') . '.' . $ext;
            $target_path = "upload/" . $new_filename;

            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $image_update = $new_filename;

                // Get old image path for deletion
                $result = mysqli_query($con, "SELECT image_urle FROM portfolio WHERE portfolio_id = $id");
                if ($row = mysqli_fetch_assoc($result)) {
                    $old_image = $row['image_urle'];
                }
            } else {
                die("Error uploading file.");
            }
        }
    }

    // Build the update query
    $sql = "UPDATE portfolio SET 
            service_id = $service_id,
            portfolio_name = '$title',
            portfolio_sub = '$short',
            project_link = '$url'";

    // Add image to query if new one was uploaded
    if (!empty($image_update)) {
        $sql .= ", image_urle = '$image_update'";
    }

    $sql .= " WHERE portfolio_id = $id";

    // Execute the update
    if (mysqli_query($con, $sql)) {
        // Delete old image if new one was uploaded
        if (!empty($image_update) && !empty($old_image)) {
            @unlink("upload/" . $old_image);
        }

        // Redirect with success status
        header("Location: http://localhost/Marketxsolution/admin/portfolio.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    // If not a POST request, redirect
    header("Location: http://localhost/Marketxsolution/admin/portfolio.php");
    exit();
}
