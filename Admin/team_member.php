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
            <a href="index.html" class="brand-logo">
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
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
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
                            </li>
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
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="./index.php" aria-expanded="false">
                       <span class="nav-text">Dashboard</span></a>
                    </li>
                    <li class="nav-label">Users</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">User</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./uerses.php">Admin</a></li>
                        </ul>
                    </li>


                    <!-- <li class="nav-label">Apps</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="./app-calender.html">Calendar</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-label">Components</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Bootstrap</span></a>
                        <ul aria-expanded="false">
                        </ul>
                    </li>

                    <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-plug"></i><span class="nav-text">Plugins</span></a>
                        <ul aria-expanded="false">
                            
                        </ul>
                    </li> -->
                    <li class="nav-label">Forms</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./form-element.php">Hero-section.php</a></li>
                            
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                        <ul aria-expanded="false">
                            <li><a href="hero.php">Hero Section</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="about.php">About Section</a></li>
                            <li><a href="testimonial.php">Testmial</a></li>
                            <li><a href="team_member.php">Team Member</a></li>
                            <li><a href="brand.php">Brands </a></li>
                            <li><a href="apporaches.php">Approaches</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Extra</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-login.html">Login</a></li>
                            <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    
                                </ul>
                            </li> -->
                            <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Logout</li>
                    <li><a><i class="ti-close"></i> Logout</a></li>
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
                <h1 class="main text-primary">Services</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Services</h4>
                                <a href="services-add.php"><button class="btn btn-primary">Insert</button></a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                    <?php
                                    include "configure.php";
                                   
                                    $limit = 10;
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
                                                        <td><a href='delete-services.php?id=".htmlspecialchars($row['service_id'])."'><button class='btn btn-danger'>Delete</button></a>
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
                                        $sql1 = "SELECT * FROM hero_sections";
                                        $result1 = mysqli_query($con, $sql1) or die("Query failed");
                                        
                                        if (mysqli_num_rows($result1) > 0) {
                                            $total_records = mysqli_num_rows($result1);
                                            $total_page = ceil($total_records / $limit);
                                            
                                            echo '<ul class="pagination justify-content-center">';
                                            
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

                <h1 class="main text-primary">Services Features</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Feature about Services</h4>
                                <a href="service_feature_add.php"><button class="btn btn-primary">Insert</button></a>
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
                                                    echo "<td><a href='Delet_feature_service.php?id=" . htmlspecialchars($row['feature_id']) . "'><button class='btn btn-danger'>Delete</button></a></td>";
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
                                            
                                            echo '<ul class="pagination justify-content-center">';
                                            
                                            // Previous button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="service_feature.php?page=' . ($page - 1) . '">Prev</a></li>';
                                            }
                                            
                                            // Page number links
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                $active = ($i == $page) ? "active" : "";
                                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="service_feature.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                            
                                            // Next button
                                            if ($page < $total_page) {
                                                echo '<li class="page-item"><a class="page-link" href="service_feature.php?page=' . ($page + 1) . '">Next</a></li>';
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



                <h1 class="main text-primary">Services card Features</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Feature about Services</h4>
                                <a href="service_card_add.php"><button class="btn btn-primary">Insert</button></a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <?php
                            include "configure.php";

                            // Pagination logic
                            $limit = 10;
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
                                                    echo "<td><a href='delete_service_card.php?id=" . htmlspecialchars($row['services_card_id']) . "'><button class='btn btn-danger'>Delete</button></a></td>";
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
                                            
                                            echo '<ul class="pagination justify-content-center">';
                                            
                                            // Previous button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="service_feature.php?page=' . ($page - 1) . '">Prev</a></li>';
                                            }
                                            
                                            // Page number links
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                $active = ($i == $page) ? "active" : "";
                                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="service_feature.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                            
                                            // Next button
                                            if ($page < $total_page) {
                                                echo '<li class="page-item"><a class="page-link" href="service_feature.php?page=' . ($page + 1) . '">Next</a></li>';
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