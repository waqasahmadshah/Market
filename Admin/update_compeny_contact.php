<?php
include "configure.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = trim($_POST['name']);
    $address = trim($_POST['Address']);
    $email = trim($_POST['Email']);
    $website = trim($_POST['Website']);
    $contact = trim($_POST['Contact']);

    // Basic validation
    if ($id <= 0 || empty($name) || empty($address) || empty($email) || empty($website) || empty($contact)) {
        $message = urlencode("All fields are required.");
        header("Location: compeny_contact.php?id=$id&status=error&message=$message");
        exit();
    }

    // Update only contact fields in the database
    $stmt = $con->prepare("UPDATE companycontact 
                           SET address = ?, email = ?, website = ?, phone_number = ?
                           WHERE contact_id = ?");
    if (!$stmt) {
        $message = urlencode("Prepare failed: " . $con->error);
        header("Location: compeny_contact.php?id=$id&status=error&message=$message");
        exit();
    }

    $stmt->bind_param("ssssi", $address, $email, $website, $contact, $id);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: compeny_contact.php?id=$id&status=success");
        exit();
    } else {
        $message = urlencode("Update failed: " . $stmt->error);
        header("Location: compeny_contact.php?id=$id&status=error&message=$message");
        exit();
    }
} else {
    header("Location: compeny_contact.php");
    exit();
}
?>
