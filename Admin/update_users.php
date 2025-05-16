<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    $Username = mysqli_real_escape_string($con, $_POST['Username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $Phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);
    
    // Hash the password
    $password_hashed = $Password;

    $image_update = '';
    $old_image = '';

    if (isset($_FILES['image_url'])) {
        $file = $_FILES['image_url'];
        
        if ($file['error'] == UPLOAD_ERR_OK) {
            $allowed_types = ["jpeg", "jpg", "png"];
            $max_size = 2 * 1024 * 1024;
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            
            if (!in_array($ext, $allowed_types)) {
                die("Error: Only JPG, JPEG, PNG files are allowed.");
            }
            
            if ($file['size'] > $max_size) {
                die("Error: File must be 2MB or smaller.");
            }
            
            $new_filename = uniqid('hero_') . '.' . $ext;
            $target_path = "upload/" . $new_filename;
            
            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $image_update = $new_filename;
                
                $result = mysqli_query($con, "SELECT profile_picture_url FROM users WHERE user_id = $id");
                if ($row = mysqli_fetch_assoc($result)) {
                    $old_image = $row['profile_picture_url'];
                }
            } else {
                die("Error uploading file.");
            }
        }
    }

    $sql = "UPDATE users SET 
            username = '$Username',
            email = '$email',
            password_hash = '$password_hashed',
            full_name = '$full_name',
            date_of_birth = '$dob',
            phone_number = '$Phone'";
    
    if (!empty($image_update)) {
        $sql .= ", profile_picture_url = '$image_update'";
    }
    
    $sql .= " WHERE user_id = $id";
    
    if (mysqli_query($con, $sql)) {
        if (!empty($image_update) && !empty($old_image)) {
            @unlink("upload/" . $old_image);
        }
        
        header("Location: http://localhost/Marketxsolution/admin/users.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }
} else {
    header("Location: http://localhost/Marketxsolution/admin/users.php");
    exit();
}
?>
