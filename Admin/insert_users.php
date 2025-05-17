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
        $Username = mysqli_real_escape_string($con, $_POST['Username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
        $Password=mysqli_real_escape_string($con, $_POST['Password']);  
        
        // Insert into database
        $sql = "INSERT INTO users 
                (username,email,password_hash,full_name, date_of_birth, phone_number, profile_picture_url) 
                VALUES ('$Username','$email','$Password','$full_name','$dob','$Phone', '$file[name]')";
        
        if (mysqli_query($con, $sql)) {
            header("Location: http://localhost/Marketxsolution/admin/users.php");
            exit();
        } else {
            die("Database error: " . mysqli_error($con));
        }
    } else {
        die("Error uploading file.");
    }
}
?>