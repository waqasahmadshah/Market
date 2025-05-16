<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Enable error reporting for debugging - remove or disable in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'configure.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check database connection
    if (!$con) {
        echo "&lt;script&gt;alert('Database connection error');&lt;/script&gt;";
        exit;
    }

    // Debug: print POST data - you may remove this for production
    // Uncomment below line to debug inputs:
    // var_dump($_POST);

    // Collect and sanitize inputs
    $name = isset($_POST['name']) ? mysqli_real_escape_string($con, trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($con, trim($_POST['email'])) : '';
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($con, trim($_POST['subject'])) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($con, trim($_POST['phone'])) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($con, trim($_POST['message'])) : '';

    // Simple validation
    if (empty($name) || empty($email) || empty($subject) || empty($phone) || empty($message)) {
        echo "&lt;script&gt;alert('All fields are required.');&lt;/script&gt;";
    } else {
        $sql = "INSERT INTO messages (name, email, subject, phone, message) VALUES ('$name', '$email', '$subject', '$phone', '$message')";

        if (mysqli_query($con, $sql)) {
            echo "&lt;script&gt;alert('Message sent successfully.');&lt;/script&gt;";
        } else {
            // Detailed error alert
            $error = htmlspecialchars(mysqli_error($con), ENT_QUOTES);
            $debugSql = htmlspecialchars($sql, ENT_QUOTES);
            echo "&lt;script&gt;alert('Error inserting data: {$error}\\nSQL: {$debugSql}');&lt;/script&gt;";
        }
    }
}
?>

<!-- Contact Form -->
<form method="POST" id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" required autocomplete="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" class="form-control" id="email" name="email" required autocomplete="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" required value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="phone" class="form-label">Phone No</label>
        <input type="tel" class="form-control" id="phone" name="phone" required  title="Enter valid phone number" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
      </div>
    </div>
  </div>
  <div class="form-group mt-3">
    <label for="message" class="form-label">Message</label>
    <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary btn-lg mt-3">Send Message</button>
</form>

<!-- If your messages table is missing or setup is uncertain, run this SQL in your MySQL database: -->
<!--
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-->


</body>
</html>