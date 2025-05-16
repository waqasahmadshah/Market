<?php
include("configure.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $project_name = trim($_POST['project_name']);
    $client = trim($_POST['client']);
    $description = trim($_POST['description']);
    $status = strtolower(trim($_POST['status']));
    $start_date = $_POST['start_date'];
    $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : "";

    // Validate allowed statuses
    $allowed_statuses = ['active', 'pending', 'complete'];
    if (!in_array($status, $allowed_statuses)) {
        header("Location: projects_update_form.php?id=$id&status=error&message=Invalid status value");
        exit();
    }

    $sql = "UPDATE projects SET project_name=?, client=?, description=?, status=?, start_date=?, end_date=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssi", $project_name, $client, $description, $status, $start_date, $end_date, $id);

    try {
        $stmt->execute();
        header("Location: projects.php?id=$id&status=success");
        exit();
    } catch (Exception $e) {
        $error_message = urlencode($e->getMessage());
        header("Location: projects.php?id=$id&status=error&message=$error_message");
        exit();
    }
} else {
    header("Location: projects.php");
    exit();
}
?>
