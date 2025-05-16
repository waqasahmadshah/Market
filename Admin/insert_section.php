<?php
include "configure.php"; // DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define allowed ENUM values
    $allowed_sections = [
        'Our Expertise',
        'FEATURED WORK',
        'OUR APPROACH',
        'CLIENT FEEDBACK',
        'OUR CLIENTS',
        'OUR VALUES',
        'OUR JOURNEY',
        'OUR TEAM'
    ];

    // Retrieve POST values
    $section_name = $_POST['section_name'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validate section_name
    if (!in_array($section_name, $allowed_sections)) {
        die("Invalid section name.");
    }

    // Basic validation
    if (empty($title) || empty($description)) {
        die("Title and description are required.");
    }

    // Use prepared statement
    $stmt = $con->prepare("INSERT INTO WebsiteSections (section_name, title, description) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("sss", $section_name, $title, $description);

    if ($stmt->execute()) {
        header("Location: website_section.php?msg=success");
        exit();
    } else {
        echo "Insert failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
