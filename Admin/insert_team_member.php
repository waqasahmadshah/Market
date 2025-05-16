<?php
include "configure.php";

if (isset($_FILES['image_url'])) {
    $file = $_FILES['image_url'];
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
        $Postion = mysqli_real_escape_string($con, $_POST['Postion']);
        $facebook = mysqli_real_escape_string($con, $_POST['facebook']);
        $instagram = mysqli_real_escape_string($con, $_POST['instagram']);
        $linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        
        // Insert into database
        $sql = "INSERT INTO teammember 
                (name,position,facebook_url,linkedin_url,instagram_url,phone_no, image_url) 
                VALUES ('$title','$short','$facebook','$linkedin','$instagram', '$phone','$file[name]')";
        
        if (mysqli_query($con, $sql)) {
            header("Location: http://localhost/Marketxsolution/admin/team_member.php");
            exit();
        } else {
            die("Database error: " . mysqli_error($con));
        }
    } else {
        die("Error uploading file.");
    }
}
?>