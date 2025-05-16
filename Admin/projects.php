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
    <!-- <link href="./assets/css/style.css" rel="stylesheet"> -->
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
                <img class="logo-abbr" src="./images/logo.png" alt="">
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
                        <a href="projects.php" aria-expanded="false">
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
        <div class="content-body">
    <div class="container-fluid">
        <h1 class="main text-primary">Projects Overview</h1>
        
        <?php
        include "configure.php";

        // Initialize counts for each status
        $status_counts = [
            'active' => 0,
            'pending' => 0,
            'complete' => 0,
        ];

        // Normalize status values and count
        $status_sql = "SELECT LOWER(TRIM(status)) AS status, COUNT(*) AS count FROM projects GROUP BY status";
        $status_result = $con->query($status_sql);
        if ($status_result) {
            while ($row = $status_result->fetch_assoc()) {
                $status = $row['status'];
                if (isset($status_counts[$status])) {
                    $status_counts[$status] = $row['count'];
                }
            }
        }

        // Pagination setup with validation
        $limit = 10;
        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;

        // Get total record count for pagination
        $sql_count = "SELECT COUNT(*) AS total_records FROM projects";
        $result_count = $con->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        $total_records = $row_count['total_records'];
        $total_page = max(1, ceil($total_records / $limit));

        if ($page > $total_page) {
            $page = $total_page;
        }

        $offset = ($page - 1) * $limit;

        // Prepare and execute query to fetch paginated projects
        $sql = "SELECT * FROM projects ORDER BY id ASC LIMIT ?, ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <!-- Summary cards -->
        <div class="row">
            <!-- Active Projects -->
            <div class="col-lg-4">
                <div class="card" style="padding: 30px 10px">
                    <div class="stat-widget-one d-flex align-items-center">
                        <div class="stat-icon dib"><i class="ti-briefcase color-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Active Project</div>
                            <div class="stat-digit"><?= $status_counts['active'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Projects -->
            <div class="col-lg-4">
                <div class="card" style="padding: 30px 10px">
                    <div class="stat-widget-one d-flex align-items-center">
                        <div class="stat-icon dib"><i class="ti-timer color-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Pending Project</div>
                            <div class="stat-digit"><?= $status_counts['pending'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Complete Projects -->
            <div class="col-lg-4">
                <div class="card" style="padding: 30px 10px">
                    <div class="stat-widget-one d-flex align-items-center">
                        <div class="stat-icon dib"><i class="ti-check-box color-info border-info"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Complete Projects</div>
                            <div class="stat-digit"><?= $status_counts['complete'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Project Records</h4>
                        <a href="projects_add.php"><button class="btn btn-primary">Add Project</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if ($result->num_rows > 0): ?>
                                <table class="table w-100">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Name</th>
                                            <th>Client Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial_no = $offset + 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr class='text-dark'>";
                                            echo "<td>" . $serial_no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['project_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['client']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "<td>" . ucfirst(htmlspecialchars($row['status'])) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                                            echo "<td>
                                                    <a href='projects_update.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                                                    <a href='delete_projects.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-center">No projects found.</p>
                            <?php endif; ?>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <?php
                                echo '<ul class="pagination justify-content-center">';

                                if ($page > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Prev</a></li>';
                                }

                                for ($i = 1; $i <= $total_page; $i++) {
                                    $active = ($i == $page) ? 'active' : '';
                                    echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                }

                                if ($page < $total_page) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                                }

                                echo '</ul>';
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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