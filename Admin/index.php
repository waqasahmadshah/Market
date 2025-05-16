<?php
session_start();
include "configure.php";

// Auto-login using "remember me"
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    $_SESSION['user_id'] = $_COOKIE['remember_me'];
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "All fields must be entered.";
    } else {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = $_POST['password'];

        // Note: use password_hash() and password_verify() in production
        $sql = "SELECT user_id, username FROM users WHERE username = '$username' AND password_hash = '$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["username"] = $row['username'];
            $_SESSION["user_id"] = $row['user_id'];

            if (!empty($_POST['remember'])) {
                setcookie("remember_me", $row['user_id'], time() + (86400 * 30), "/"); // 30 days
            }

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Username and Password do not match.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="auth-form">
                            <h4 class="text-center mb-4">Sign in to your account</h4>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label><strong>Username</strong></label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group position-relative">
                                    <label><strong>Password</strong></label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-white border-left-0" style="cursor: pointer;" onclick="togglePassword()">
                                                <i id="toggleIcon" class="fas fa-eye text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
                                </div>
                            </form>

                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .input-group-text:hover i {
            color: #007bff;
        }
    </style>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
