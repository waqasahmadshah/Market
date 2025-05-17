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
            <div class="container-fluid mb-4">
                <div class="nav nav-pills gap-2">
                    <button class="nav-link btn btn-primary active" data-section-target="services">Services</button>
                    <button class="nav-link btn btn-primary" data-section-target="features">Features</button>
                    <button class="nav-link btn btn-primary" data-section-target="cards">Cards</button>
                </div>
            </div>
            <div class="container-fluid section-container active-section" data-section="services">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Services Record</h4>
                                <a href="services-add.php"><button class="btn btn-primary">Add Service</button></a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                    <?php
                                    include "configure.php";
                                   
                                    $limit = 9;
                                    if(isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }

                                    $offset = ($page - 1) * $limit;
                                    // Changed ORDER BY from DESC to ASC to show oldest records first
                                    $sql = "SELECT * FROM services ORDER BY service_id ASC LIMIT {$offset},{$limit}";
                                    $result = mysqli_query($con, $sql) or die("unsuccessful");
                                    
                                    if(mysqli_num_rows($result) > 0) {
                                    ?>
                                    <table class="table table-responsive-sm">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Service Name</th>
                                                <th>Short Intro</th>
                                                <th>Discription</th>
                                                <th>icon</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $serial_no = $offset+1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr class='text-dark'>";
                                                echo "<td>" . $serial_no++. "</td>";
                                                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['short_desc']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                                echo "<td><i class='{$row['icon_class']}'</td>";
                                                echo "<td><img src='upload/" . htmlspecialchars($row['image_url']) . "' width='50' height='50' style='object-fit: cover;'></td>";
                                                echo "<td>
                                                <a href='service-update.php?id=".htmlspecialchars($row['service_id'])."'><button class='btn btn-warning'>Edit</button></a></td>
                                                        <td><a href='delete-services.php?id=" . htmlspecialchars($row['service_id']) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <?php } else { ?>
                                        <tr><td colspan='10' class='text-center'>No data found.</td></tr>
                                    <?php } ?>
                                    
                                    <nav aria-label="Page navigation">
                                        <?php
                                        $sql1 = "SELECT * FROM services";
                                        $result1 = mysqli_query($con, $sql1) or die("Query failed");
                                        
                                        if (mysqli_num_rows($result1) > 0) {
                                            $total_records = mysqli_num_rows($result1);
                                            $total_page = ceil($total_records / $limit);
                                            
                                            echo '<ul class="pagination justify-content-center" id="pagination">';
                                            
                                            // Previous button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page - 1) . '">Prev</a></li>';
                                            }
                                            
                                            // Page number links
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                $active = ($i == $page) ? "active" : "";
                                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="services.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                            
                                            // Next button
                                            if ($page < $total_page) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page + 1) . '">Next</a></li>';
                                            }
                                            
                                            echo '</ul>';
                                        }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="container-fluid section-container" data-section="features">
                <!-- <h1 class="main text-primary">Services Features</h1> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Services Feature Record</h4>
                                <a href="service_feature_add.php"><button class="btn btn-primary">Add Feature</button></a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                    <?php
                                    include "configure.php";
                                    // Pagination logic
                                    $limit = 10;
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                    $offset = ($page - 1) * $limit;

                                    // Fetch records
                                    $sql = "SELECT * FROM service_features LEFT JOIN services ON service_features.services_id = services.service_id ORDER BY service_features.feature_id ASC LIMIT {$offset}, {$limit}";
                                    $result = mysqli_query($con, $sql) or die("unsuccessful");

                                    ?>

                                    <table class="table table-responsive-sm">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Service Name</th>
                                                <th>Feature Title</th>
                                                <th>Description</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                $serial_no = $offset+1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='text-dark'>";
                                                    echo "<td>" . $serial_no++ . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['feature_name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['feature_des']) . "</td>";
                                                    echo "<td><a href='service_feature_updat.php?id=" . htmlspecialchars($row['feature_id']) . "'><button class='btn btn-warning'>Edit</button></a></td>";
                                                    echo "<td><a href='Delet_feature_service.php?id=" . htmlspecialchars($row['feature_id']) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No data found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                    <nav aria-label="Page navigation">
                                        <?php
                                        $sql1 = "SELECT * FROM service_features";
                                        $result1 = mysqli_query($con, $sql1) or die("Query failed");
                                        
                                        if (mysqli_num_rows($result1) > 0) {
                                            $total_records = mysqli_num_rows($result1);
                                            $total_page = ceil($total_records / $limit);
                                            
                                            echo '<ul class="pagination justify-content-center" id="pagination">';
                                            
                                            // Previous button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page - 1) . '">Prev</a></li>';
                                            }
                                            
                                            // Page number links
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                $active = ($i == $page) ? "active" : "";
                                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="services.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                            
                                            // Next button
                                            if ($page < $total_page) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page + 1) . '">Next</a></li>';
                                            }
                                            
                                            echo '</ul>';
                                        }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid section-container active" data-section="cards">
                <!-- <h1 class="main text-primary">Comprehensive Service</h1> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Records</h4>
                                <a href="service_card_add.php"><button class="btn btn-primary">Add Card</button></a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <?php
                            include "configure.php";

                            // Pagination logic
                            $limit = 5;
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $offset = max(0, ($page - 1) * $limit);

                            // Fixed SQL with correct column names
                            $sql = "SELECT * 
                                    FROM services_card 
                                    LEFT JOIN services 
                                        ON services_card.service_id = services.service_id 
                                    ORDER BY services_card.services_card_id ASC 
                                    LIMIT {$offset}, {$limit}";

                            $result = mysqli_query($con, $sql) or die("Query failed: " . mysqli_error($con));
                            ?>

                                    <table class="table table-responsive-sm">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Service Name</th>
                                                <th>Card Title</th>
                                                <th>Description</th>
                                                <th>Icon</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                $serial_no = $offset+1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='text-dark'>";
                                                    echo "<td>" . $serial_no++ . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['services_card_name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['services_card_description']) . "</td>";
                                                    echo "<td><i class='{$row['icon']}'</td>";
                                                    echo "<td><a href='service_card_update.php?id=" . htmlspecialchars($row['services_card_id']) . "'><button class='btn btn-warning'>Edit</button></a></td>";
                                                    echo "<td><a href='delete_service_card.php?id=" . htmlspecialchars($row['services_card_id']) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No data found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                    <nav aria-label="Page navigation">
                                        <?php
                                        $sql1 = "SELECT * FROM services_card";
                                        $result1 = mysqli_query($con, $sql1) or die("Query failed");
                                        
                                        if (mysqli_num_rows($result1) > 0) {
                                            $total_records = mysqli_num_rows($result1);
                                            $total_page = ceil($total_records / $limit);
                                            
                                            echo '<ul class="pagination justify-content-center" id="pagination">';
                                            
                                            // Previous button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page - 1) . '">Prev</a></li>';
                                            }
                                            
                                            // Page number links
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                $active = ($i == $page) ? "active" : "";
                                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="services.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                            
                                            // Next button
                                            if ($page < $total_page) {
                                                echo '<li class="page-item"><a class="page-link" href="services.php?page=' . ($page + 1) . '">Next</a></li>';
                                            }
                                            
                                            echo '</ul>';
                                        }
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add this button group at the top of your content-body -->

        <!-- Add this CSS -->
        <style>
            .section-container {
                display: none;
            }
            .active-section {
                display: block;
            }
            .nav-pills .nav-link.active {
                background-color: #0d6efd;
                color: white;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Set default section
                const defaultSection = document.querySelector('[data-section="services"]');
                defaultSection.classList.add('active-section');

                // Handle navigation clicks
                document.querySelectorAll('[data-section-target]').forEach(button => {
                    button.addEventListener('click', function() {
                        const targetSection = this.dataset.sectionTarget;
                        
                        // Remove active states
                        document.querySelectorAll('.nav-link, .section-container').forEach(el => {
                            el.classList.remove('active', 'active-section');
                        });
                        
                        // Add active states
                        this.classList.add('active');
                        document.querySelector(`[data-section="${targetSection}"]`).classList.add('active-section');
                    });
                });
            });
      

            document.addEventListener('DOMContentLoaded', function() {
                // Section switching logic
                let activeSection = 'services';
                
                function loadSection(section, page = 1) {
                    const params = new URLSearchParams(window.location.search);
                    params.set('section', section);
                    params.set('page', page);
                    
                    fetch(`services.php?${params.toString()}`)
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.querySelector(`[data-section="${section}"]`);
                            
                            // Update content
                            document.querySelectorAll('.section-container').forEach(container => {
                                container.style.display = 'none';
                            });
                            const targetContainer = document.querySelector(`[data-section="${section}"]`);
                            targetContainer.innerHTML = newContent.innerHTML;
                            targetContainer.style.display = 'block';
                            
                            // Update URL without reload
                            history.replaceState({ section, page }, '', `?${params.toString()}`);
                            
                            // Rebind pagination handlers
                            bindPaginationHandlers();
                        });
                }

                function bindPaginationHandlers() {
                    document.querySelectorAll('.pagination a').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            const page = new URL(this.href).searchParams.get('page');
                            loadSection(activeSection, page);
                        });
                    });
                }

                // Initial load
                const urlParams = new URLSearchParams(window.location.search);
                const initialSection = urlParams.get('section') || 'services';
                const initialPage = urlParams.get('page') || 1;
                loadSection(initialSection, initialPage);

                // Navigation button clicks
                document.querySelectorAll('[data-section-target]').forEach(button => {
                    button.addEventListener('click', function() {
                        activeSection = this.dataset.sectionTarget;
                        loadSection(activeSection);
                    });
                });
            });
        </script>


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