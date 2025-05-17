<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the record ID to update
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Get form data
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short = mysqli_real_escape_string($con, $_POST['short-description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $icon=mysqli_real_escape_string($con,$_POST['icon']);

    // Initialize image variables
    $image_update = '';
    $old_image = '';

    // Handle image upload if provided
    if (isset($_FILES['image_url'])) {
        $file = $_FILES['image_url'];
        
        // Only process if file was actually uploaded
        if ($file['error'] == UPLOAD_ERR_OK) {
            $allowed_types = ["jpeg", "jpg", "png"];
            $max_size = 15 * 1024 * 1024; // 2MB
            
            // Get file extension
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            
            // Check file type and size
            if (!in_array($ext, $allowed_types)) {
                die("Error: Only JPG, JPEG, PNG files are allowed.");
            }
            
            if ($file['size'] > $max_size) {
                die("Error: File must be 15MB or smaller.");
            }
            
            // Generate unique filename
            $new_filename = uniqid('hero_') . '.' . $ext;
            $target_path = "upload/" . $new_filename;
            
            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $image_update = $new_filename;
                
                // Get old image path for deletion
                $result = mysqli_query($con, "SELECT image_url FROM services WHERE service_id = $id");
                if ($row = mysqli_fetch_assoc($result)) {
                    $old_image = $row['image_url'];
                }
            } else {
                die("Error uploading file.");
            }
        }
    }

    // Build the update query
    $sql = "UPDATE services SET 
            title = '$title',
            short_desc='$short',
            description = '$description',
            icon_class='$icon'";
    
    // Add image to query if new one was uploaded
    if (!empty($image_update)) {
        $sql .= ", image_url = '$image_update'";
    }
    
    $sql .= " WHERE service_id = $id";
    
    // Execute the update
    if (mysqli_query($con, $sql)) {
        // Delete old image if new one was uploaded
        if (!empty($image_update) && !empty($old_image)) {
            @unlink("upload/" . $old_image);
        }
        
        // Redirect with success status
        header("Location: services.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    // If not a POST request, redirect
    header("Location: http://localhost/Marketxsolution/admin/.php");
    exit();
}
?>