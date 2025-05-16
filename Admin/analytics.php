<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="dashboard.php" class="brand-logo">
                <img class="logo-abbr" src="./images/maket x solution-01.jpg" style="width: 55px; border-radius: 50%;" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

         <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <?php
                            include "configure.php";

                            // Count unread messages
                            $unread_query = "SELECT COUNT(*) AS unread_count FROM messages WHERE status = 0";
                            $unread_result = mysqli_query($con, $unread_query);
                            $unread = mysqli_fetch_assoc($unread_result)['unread_count'];

                            // Fetch latest 5 messages
                            $query = "SELECT name, subject, created_at FROM messages ORDER BY created_at DESC LIMIT 5";
                            $result = mysqli_query($con, $query);
                            ?>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" id="notifDropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <?php if ($unread > 0): ?>
                                        <span class="badge badge-pill badge-primary"><?php echo $unread; ?></span>
                                    <?php endif; ?>
                                    <!-- <div class="pulse-css"></div> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <?php if ($result && mysqli_num_rows($result) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                <li class="media dropdown-item">
                                                    <span class="primary"><i class="ti-email"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong><?php echo htmlspecialchars($row['name']); ?></strong> sent a message: 
                                                            <strong><?php echo htmlspecialchars($row['subject']); ?></strong></p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time"><?php echo date("H:i a", strtotime($row['created_at'])); ?></span>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <li class="media dropdown-item text-center">
                                                <p class="mb-0 text-muted">No new messages</p>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <a class="all-notification" href="contact_message.php">
                                        See all messages <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </li>
                            <script>
                                document.getElementById('notifDropdown').addEventListener('click', function() {
                                    fetch('mark_notifications_read.php')
                                        .then(response => response.text())
                                        .then(data => {
                                            // Remove the notification badge
                                            const badge = document.querySelector('.badge.badge-pill.badge-danger');
                                            if (badge) badge.remove();
                                        });
                                });
                            </script>


                            <!-- <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">

                    <!-- 📂 Main Menu -->
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="dashboard.php" aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <!-- 👥 Users -->
                    <li class="nav-label">Users</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="users.php">
                                    <i class="fas fa-user-shield"></i> Admin
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-label">Projects</li>
                    <li>
                        <a href="contact_message.php" aria-expanded="false">
                            <i class="fas fa-folder"></i>
                            <span class="nav-text">Project</span>
                        </a>
                    </li>

                    <!-- 🛠 Control Website -->
                    <li class="nav-label">Control Website</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-tools"></i>
                            <span class="nav-text">Website Manage</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="hero.php"><i class="fas fa-image"></i> Hero Section</a></li>
                            <li><a href="about.php"><i class="fas fa-info-circle"></i> About Section</a></li>
                            <li><a href="services.php"><i class="fas fa-concierge-bell"></i> Services</a></li>
                            <li><a href="portfolio.php"><i class="fas fa-briefcase"></i>Portfolio section</a></li>
                            <li><a href="ourvalues.php"><i class="fas fa-briefcase"></i>Our values</a></li>
                            <li><a href="website_section.php"><i class="fas fa-briefcase"></i>Website Section</a></li>
                            <li><a href="apporaches.php"><i class="fas fa-rocket"></i> Approaches</a></li>
                            <li><a href="mile_stone.php"><i class="fas fa-flag-checkered"></i> MileStone</a></li>
                            <li><a href="brand.php"><i class="fas fa-flag"></i> Brands</a></li>
                            <li><a href="testimonial.php"><i class="fas fa-comment-dots"></i> Testimonial</a></li>
                        </ul>
                    </li>

                    <!-- 👨‍💼 Team Section -->
                    <li class="nav-label">Team</li>
                    <li>
                        <a href="team_member.php" aria-expanded="false">
                            <i class="fas fa-users-cog"></i>
                            <span class="nav-text">Team Member</span>
                        </a>
                    </li>

                    <!-- ⚙️ Settings -->
                    <li class="nav-label">Settings</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-cogs"></i>
                            <span class="nav-text">General Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="Compeny_info.php">
                                    <i class="fas fa-building"></i> Company Info
                                </a>
                            </li>
                            <li>
                                <a href="compeny_contact.php">
                                    <i class="fas fa-phone-square"></i> Company Contact
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 🔔 Notifications -->
                    <li class="nav-label">Notifications</li>
                    <li>
                        <a href="contact_message.php" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="nav-text">Notifications</span>
                        </a>
                    </li>

                    <!-- 🚪 Logout -->
                    <li class="nav-label">Logout</li>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <?php include "configure.php";?>
        <div class="content-body">
            <div class="container-fluid">
                <h1 class="main text-primary mb-4">Admin Analytics Dashboard</h1>

                <!-- Summary Cards -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5>Total Visitors</h5>
                                <h2>1,203</h2>
                                <small>Past 30 Days</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5>Total Messages</h5>
                                <h2><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM messages")); ?></h2>
                                <small>Contact Form Entries</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5>Total Users</h5>
                                <h2><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM users")); ?></h2>
                                <small>Admins / Clients</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5>Total Projects</h5>
                                <h2><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM portfolio")); ?></h2>
                                <small>Listed on website</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 Summary Cards -->
                <div class="row mt-3">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card border-left-primary">
                            <div class="card-body">
                                <h5>Team Members</h5>
                                <h2><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM teammember")); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card border-left-success">
                            <div class="card-body">
                                <h5>Testimonials</h5>
                                <h2><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM testimonial")); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Recent Messages</h5>
                                <ul class="list-group">
                                    <?php
                                    $msg_result = mysqli_query($con, "SELECT * FROM messages ORDER BY id DESC LIMIT 5");
                                    while ($msg = mysqli_fetch_assoc($msg_result)) {
                                        echo "<li class='list-group-item'>";
                                        echo "<strong>" . htmlspecialchars($msg['name']) . "</strong>: " . htmlspecialchars(substr($msg['message'], 0, 50)) . "...";
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Future: Chart.js Traffic Overview -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Website Traffic Overview (Placeholder)</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="trafficChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart.js CDN (for future use) -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Visitors',
                        data: [12, 19, 3, 5, 2, 3, 9],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
        <!-- content-body -->


        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    



</body>

</html>