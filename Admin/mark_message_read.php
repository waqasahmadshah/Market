<?php
// mark_message_read.php

// Include the database connection
include('configure.php');

// Check if 'id' is passed via GET
if (isset($_GET['id'])) {
    $messageId = (int) $_GET['id'];

    // Query to update the message status to "read"
    $query = "UPDATE messages SET status = 'read' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $messageId);
    $stmt->execute();

    // Query to count unread messages
    $countQuery = "SELECT COUNT(*) FROM messages WHERE status = 'unread'";
    $countResult = $conn->query($countQuery);
    $unreadCount = $countResult->fetch_row()[0];

    // Return JSON response
    echo json_encode([
        'status' => 'success',
        'unread_count' => $unreadCount
    ]);
}
?>
