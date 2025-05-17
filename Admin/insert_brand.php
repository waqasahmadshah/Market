<?php
include "configure.php";

if (isset($_FILES['image_url'])) {
    $file = $_FILES['image_url'];
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
    
    // Move uploaded file
    $target_path = "upload/" . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        // Get form data
        $title = mysqli_real_escape_string($con, $_POST['title']);
        
        // Insert into database
        $sql = "INSERT INTO brand
                (name,image_url) 
                VALUES ('$title','$file[name]')";
        
        if (mysqli_query($con, $sql)) {
            header("Location: http://localhost/Marketxsolution/admin/brand.php");
            exit();
        } else {
            die("Database error: " . mysqli_error($con));
        }
    } else {
        die("Error uploading file.");
    }
}
?>