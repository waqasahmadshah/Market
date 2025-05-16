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
        // Get form data
     $page_name = mysqli_real_escape_string($con, $_POST['page_name']);
     $title = mysqli_real_escape_string($con, $_POST['title']);
     $description = mysqli_real_escape_string($con, $_POST['description']);
        
        // Insert into database
        $sql =  $sql = "INSERT INTO hero_sections 
             (page_name, title, description,image_url) 
             VALUES ('$page_name', '$title', '$description','$file[name]')";
            //  "INSERT INTO services 
            //     (title,short_desc,description,icon_class, image_url) 
            //     VALUES ('$title','$short','$description','$icon', '$file[name]')";
        
        if (mysqli_query($con, $sql)) {
            header("Location: http://localhost/Marketxsolution/admin/hero.php");
            exit();
        } else {
            die("Database error: " . mysqli_error($con));
        }
    } else {
        die("Error uploading file.");
    }
}

//  // Move uploaded file
//  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//      // Get form data
//      $page_name = mysqli_real_escape_string($con, $_POST['page_name']);
//      $title = mysqli_real_escape_string($con, $_POST['title']);
//      $description = mysqli_real_escape_string($con, $_POST['description']);
     
//      // Insert into database
//      $sql = "INSERT INTO hero_sections 
//              (page_name, title, description) 
//              VALUES ('$page_name', '$title', '$description')";
     
//      if (mysqli_query($con, $sql)) {
//          header("Location: http://localhost/Marketxsolution/admin/hero.php");
//          exit();
//      } else {
//          die("Database error: " . mysqli_error($con));
//      }   

//     }
?>