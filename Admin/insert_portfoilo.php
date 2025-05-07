<?php
include "configure.php";

if (isset($_FILES['image_urle'])) {
    $file = $_FILES['image_urle'];
    $allowed_types = ["jpeg", "jpg", "png"];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    // Get file extension
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    // Check file type and size
    if (!in_array($ext, $allowed_types)) {
        die("Error: Only JPG, JPEG, PNG files are allowed.");
    }
    
    if ($file['size'] > $max_size) {
        die("Error: File must be 2MB or smaller.");
    }
    
    // Move uploaded file
    $target_path = "upload/" . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        // Get form data
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $tech = mysqli_real_escape_string($con, $_POST['tech']);
        $service = mysqli_real_escape_string($con, $_POST['service']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        
        // Insert into database
        $sql = "INSERT INTO `portfolio` (`portfolio_name`, `portfolio_sub`, `portfolio_description`, `image_urle`, `service_id`) VALUES ('$title', '$tech', '$description', '$file[name]', '$service')";
        
        if (mysqli_query($con, $sql)) {
            header("Location: http://localhost/Marketxsolution/admin/portfolio.php");
            exit();
        } else {
            die("Database error: " . mysqli_error($con));
        }
    } else {
        die("Error uploading file.");
    }
}
?>
