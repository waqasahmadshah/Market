<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assests/WhatsApp Image 2025-04-22 at 1.57.27 PM.jpeg">
  <title>Our Portfolio | MaretxSolutions - Creative Digital Agency</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./css/aos.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousal.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/styles.css">
  
</head>
<?php 
    include("configure.php");
  ?>
<body>
  
   <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <?php
          $sql="SELECT * FROM companyinfo LIMIT 1";
          $result=mysqli_query($con,$sql) or die("failed");
          if(mysqli_num_rows($result)>0){
            while($row=$result->fetch_assoc()){
        ?>
        <a class="navbar-brand" href="index.php">
          <span class="logo-text"><img  src="./Admin/upload/<?php echo htmlspecialchars($row['logo_url']);?>" alt=""></span>
        </a>
        <?php  }
          }?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="portfolio.php">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ms-lg-3" href="contact.php">Let's Talk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  

  <!-- Portfolio Hero Section -->
   <?php
    include("configure.php");
    $current_page="portfolio";
    $sql="SELECT * FROM hero_sections WHERE page_name='$current_page'";
    $result=mysqli_query($con, $sql) or die("Unsuccefull");
    if(mysqli_num_rows($result)>0){
      while($row=$result->fetch_assoc()){

    
   ?>
  <section class="portfolio-hero" style="background-image:
    linear-gradient(rgba(0, 0, 0, 0.5), rgba(20, 12, 68, 0.5)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
          <span class="subheading">OUR WORK</span>
          <h1 class="display-4 fw-bold mb-4 text-gradient main-heading"><?php echo htmlspecialchars($row['title']);?></h1>
          <p class="lead"><?php echo htmlspecialchars($row['description']);?></p>
        </div>
      </div>
    </div>
  </section>
  <?php   }
    }?>

  <!-- Portfolio Filter Section -->
  <section class="py-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <div class="portfolio-filter text-center">
            <button class="filter-btn active" data-filter="all">All Projects</button>
        <?php
            $sql="SELECT * FROM services WHERE service_id";
            $result=mysqli_query($con, $sql) or die("Unsuccefull");
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){
          ?>
            <button class="filter-btn" data-filter="<?php echo htmlspecialchars($row['title']);?>"><?php echo htmlspecialchars($row['title']);?></button>
            <?php } }?>
          </div>
        </div>
      </div>
      
      <div class="row g-4 mt-4 portfolio-grid ">
        <!-- Project 1 -->

        <?php
            $limit = 6;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            // Fetch records
            $sql = "SELECT * FROM portfolio LEFT JOIN services ON portfolio.service_id = services.service_id ORDER BY portfolio.portfolio_id  ASC LIMIT {$offset}, {$limit}";
            $result=mysqli_query($con, $sql) or die("Unsuccefull");
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){
          ?>
        <div class="col-md-6 col-lg-4 portfolio-item" data-category="<?php echo htmlspecialchars($row['title']);?>" data-aos="fade-up" data-aos-delay="100">
          <div class="portfolio-card">
            <div class="portfolio-card-img">
              <img src="./Admin/upload/<?php echo htmlspecialchars($row['image_urle']);?>" alt="Wavely App" class="img-fluid">
              <div class="portfolio-card-overlay">
                <div class="portfolio-card-btns">
                  <a href="portfolio-details.php" class="portfolio-card-link">View Project</a>
                </div>
              </div>
            </div>
            <div class="portfolio-card-content">
              <h4><?php echo htmlspecialchars($row['portfolio_name']);?></h4>
              <p><?php echo htmlspecialchars($row['portfolio_sub']);?></p>
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      
      <div class="row mt-5">
        <div class="col-12 text-center" data-aos="fade-up">
         <?php
          $sql1 = "SELECT * FROM portfolio";
          $result1 = mysqli_query($con, $sql1) or die("Query failed");

          if (mysqli_num_rows($result1) > 0) {
              $total_records = mysqli_num_rows($result1);
              $total_page = ceil($total_records / $limit);

              echo '<div class="portfolio-pagination">';

              if ($page > 1) {
                  echo '<a class="pagination-btn" href="portfolio.php?page=' . ($page - 1) . '"><i class="fas fa-arrow-left"></i></a>';
              }

              for ($i = 1; $i <= $total_page; $i++) {
                  $active = ($i == $page) ? "active" : "";
                  echo '<a class="pagination-btn ' . $active . '" href="portfolio.php?page=' . $i . '">' . $i . '</a>';
              }

              if ($page < $total_page) {
                  echo '<a class="pagination-btn" href="portfolio.php?page=' . ($page + 1) . '"><i class="fas fa-arrow-right"></i></a>';
              }

              echo '</div>';
          }
          ?>

        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Detail Example -->
  <!-- <section class="py-5 bg-light">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
          <span class="subheading">FEATURED PROJECT</span>
          <h2 class="section-title">Wavely App Rebrand</h2>
          <p class="mb-4">Wavely approached us with a challenge: transform their fintech app from a functional tool into a beloved brand that resonates with millennials. The result? A complete rebrand and UX overhaul that increased signups by 120% and earned industry recognition.</p>
          <div class="featured-project-stats">
            <div class="featured-stat">
              <h3>120%</h3>
              <p>Increase in signups</p>
            </div>
            <div class="featured-stat">
              <h3>4.8</h3>
              <p>App Store rating</p>
            </div>
            <div class="featured-stat">
              <h3>35%</h3>
              <p>Increase in retention</p>
            </div>
          </div>
          <a href="portfolio-details.html" class="btn btn-primary mt-4">View Case Study</a>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="featured-project-img">
            <img src="https://via.placeholder.com/600x400" alt="Wavely App" class="img-fluid rounded-3">
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Client Logos Section -->
  <section class="py-5">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto" data-aos="fade-up">
          <span class="subheading">OUR CLIENTS</span>
          <h2 class="section-title">Trusted by Leading Brands</h2>
          <p class="section-description">We're proud to work with ambitious companies across industries and around the world.</p>
        </div>
      </div>
       <?php
        include 'configure.php';

        // Fetch all clients
        $sql = "SELECT * FROM brand ORDER BY created_at DESC";
        $result = $con->query($sql);
        ?>

        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <div class="owl-carousel client-logos">
              <?php
              if ($result && $result->num_rows > 0) {
                  while ($client = $result->fetch_assoc()) {
                      // Escape output to prevent XSS
                      $image_url = htmlspecialchars($client['image_url']);
                      $name = htmlspecialchars($client['name']);
                      echo '<div class="client-logo">';
                      echo '<img src="' . $image_url . '" alt="' . $name . '" class="img-fluid">';
                      echo '</div>';
                  }
              } else {
                  echo '<p>No client logos found.</p>';
              }
              ?>
            </div>
          </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section id="cta" class="py-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cta-inner text-center" data-aos="zoom-in">
            <h2 class="mb-4">Ready to Create Something Amazing?</h2>
            <p class="lead mb-4">Let's discuss how we can help bring your vision to life.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Start a Project</a>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Footer -->
  <footer class="footer">
    <div class="container-fluid px-5">
      <div class="row pt-5 justify-content-between">
        <div class="col-lg-4">
          <?php
            $sql="SELECT * FROM companyinfo LIMIT 1";
            $result=mysqli_query($con,$sql) or die("failed");
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){
          ?>
          <div class="footer-info justify-content-space-between">
            <h3 class="footer-logo"><?php echo htmlspecialchars($row['company_name']);?></h3>
            <p><?php echo htmlspecialchars($row['company_description']);?></p>
            <div class="social-links mt-3">
              <a href="<?php echo htmlspecialchars($row['facebook_link']);?>"><i class="fab fa-twitter"></i></a>
              <a href="<?php echo htmlspecialchars($row['twitter_link']);?>"><i class="fab fa-facebook-f"></i></a>
              <a href="<?php echo htmlspecialchars($row['instagram_link']);?>"><i class="fab fa-instagram"></i></a>
              <a href="<?php echo htmlspecialchars($row['linkedin_link']);?>"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        <?php  }
          }?>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="index.php"><i class="fas fa-angle-double-right"></i>Home</a></li>
              <li><a href="about.php"><i class="fas fa-angle-double-right"></i>About</a></li>
              <li><a href="services.php"><i class="fas fa-angle-double-right"></i>Services</a></li>
              <li><a href="portfolio.php"><i class="fas fa-angle-double-right"></i>Portfolio</a></li>
              <li><a href="contact.php"><i class="fas fa-angle-double-right"></i>Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-links">
            <h4>Services</h4>
            <ul>
            <?php 
              $sql="SELECT * FROM services WHERE service_id";
              $result=mysqli_query($con,$sql) or die("unsucessful");
              if(mysqli_num_rows($result)>0){
                while($row=$result->fetch_assoc()){
  
            ?>
              <li><a href="services.php"><i class="fas fa-angle-double-right"></i><?php echo htmlspecialchars($row['title']);?></a></li>
              <?php } } ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-links">
            <h4>Contact Now</h4>
            <?php 
              $sql="SELECT * FROM companycontact";
              $result=mysqli_query($con,$sql) or die("unsucessful");
              if(mysqli_num_rows($result)>0){
                while($row=$result->fetch_assoc()){
  
            ?>
            <ul class="address">
              <li><a href="#">
                <div><i class="fas fa-map-marker-alt"></i></div>
                <div class="cont"><?php echo htmlspecialchars($row['address']);?></div></a>
              </li>
              <li><a href="#">
                <div><i class="fas fa-envelope"></i></div>
                <div class="cont"><?php echo htmlspecialchars($row['email']);?></div></a>
              </li>
              <li><a href="#">
                <div><i class="fas fa-globe"></i></div>
                <div class="cont"><?php echo htmlspecialchars($row['website']);?></div></a>
              </li>
              <li><a href="#">
                <div><i class="fas fa-phone-alt"></i></div>
                <div class="cont"><?php echo htmlspecialchars($row['phone_number']);?></div></a>
              </li>
            </ul>
            <?php } } ?>
          </div>
        </div>

      </div>
      <div class="row mt-5">
        <div class="col-12">
          <?php
            $sql="SELECT * FROM companyinfo LIMIT 1";
            $result=mysqli_query($con,$sql) or die("failed");
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){
                $text = htmlspecialchars($row['copyright_text']);

                // Find and bold the first word after "2025"
                if (preg_match('/2025\s+(\w+)/', $text, $matches)) {
                    $wordToBold = $matches[1]; // the first word after 2025
                    $text = str_replace($wordToBold, '<strong>' . $wordToBold . '</strong>', $text);
                }
          ?>
          <div class="copyright text-center">
            <p>&copy;  <?php echo $text;?> </p>
          </div>
          <?php } }?>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to top button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="fas fa-arrow-up"></i>
  </a>
  
  <!-- whatsapp link -->
  <a  href="https://wa.me/923350055620?"  class="whatsapp-link" target="_blank" aria-label="Contact via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>

   <!-- Scripts -->
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/script.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/owl.carousal.min.js"></script>
  
   <script>
     // client brand carsoul
     $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
          loop: true,
          margin: 30,
          nav: false, // Hide navigation buttons
          dots: false, // Hide dots
          autoplay: true,
          responsive: {
            0: {
              items: 2
            },
            768: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        });
      });
   </script>
   
</body>
</html>
