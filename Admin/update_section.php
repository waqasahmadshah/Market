<?php
include("configure.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Allowed ENUM values for section_name
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

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $section_name = $_POST['section_name'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validate section_name against allowed values
    if (!in_array($section_name, $allowed_sections)) {
        die("Invalid section name.");
    }

    // Basic validation for other fields (you can expand as needed)
    if (empty($title) || empty($description)) {
        die("Title and Description are required.");
    }

    // Prepare and bind
    $stmt = $con->prepare("UPDATE websitesections SET section_name = ?, title = ?, description = ? WHERE id = ?");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("sssi", $section_name, $title, $description, $id);

    if ($stmt->execute()) {
        header("Location: website_section.php?status=success&message=" . urlencode("Section updated successfully"));
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
