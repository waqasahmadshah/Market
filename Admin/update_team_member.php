<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize ID
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if ($id <= 0) die("Invalid record ID");

    // Sanitize inputs
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $facebook = mysqli_real_escape_string($con, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($con, $_POST['instagram']);
    $linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $image_update = '';
    $old_image = '';

    // Handle image upload if provided
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['image_url'];
        $allowed_types = ['jpeg', 'jpg', 'png'];
        $max_size = 2 * 1024 * 1024;

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed_types)) {
            die("Error: Only JPG, JPEG, PNG files are allowed.");
        }

        if ($file['size'] > $max_size) {
            die("Error: File must be 2MB or smaller.");
        }

        $new_filename = uniqid('team_') . '.' . $ext;
        $target_path = "upload/" . $new_filename;

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            $image_update = $new_filename;

            // Fetch old image name
            $result = mysqli_query($con, "SELECT image_url FROM teammember WHERE id = $id");
            if ($row = mysqli_fetch_assoc($result)) {
                $old_image = $row['image_url'];
            }
        } else {
            die("Error uploading file.");
        }
    }

    // Construct update SQL
    $sql = "UPDATE teammember SET 
                name = '$title',
                position = '$position',
                facebook_url = '$facebook',
                linkedin_url = '$linkedin',
                instagram_url = '$instagram',
                phone_no = '$phone'";

    if (!empty($image_update)) {
        $sql .= ", image_url = '$image_update'";
    }

    $sql .= " WHERE id = $id";

    // Execute query
    if (mysqli_query($con, $sql)) {
        if (!empty($image_update) && !empty($old_image) && file_exists("upload/" . $old_image)) {
            @unlink("upload/" . $old_image);
        }

        header("Location: http://localhost/Marketxsolution/admin/team_member.php?status=success");
        exit();
    } else {
        die("Database error: " . mysqli_error($con));
    }

} else {
    // Redirect if not POST
    header("Location: http://localhost/Marketxsolution/admin/team_member.php");
    exit();
}
?>
