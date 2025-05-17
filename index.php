<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MarketxSolutions | Creative Digital Agency</title>
  <meta name="description" content="MarketxSolutions is a creative digital agency delivering innovative solutions in web design, development, branding, and digital marketing.">
  <meta name="keywords" content="MarketxSolutions, digital agency, creative agency, web development, branding, SEO, digital marketing">
  <meta name="author" content="MarketxSolutions">
  <meta property="og:title" content="MarketxSolutions | Creative Digital Agency">
  <meta property="og:description" content="Creative digital solutions for your brand. We specialize in web development, SEO, branding, and marketing.">
  <meta property="og:image" content="https://yourwebsite.com/path-to-social-image.jpg">
  <meta property="og:url" content="https://yourwebsite.com">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" type="image/png" href="./assets/WhatsApp Image 2025-04-22 at 1.57.27 PM.jpeg">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./css/aos.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousal.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/styles.css">


</head>
<body>
  <!-- Preloader -->
  <!-- <div id="preloader">
    <div class="loader">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
    </div>
  </div> -->
  <?php 
    include("configure.php");
  ?>

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
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.php">Portfolio</a>
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


  <?php
    $current_page='home';
    $sql="SELECT * FROM hero_sections Where page_name = '$current_page' LIMIT 1";
    $result=mysqli_query($con,$sql) or die("unsuccessful");
    if(mysqli_num_rows($result)>0){
      while($row=$result->fetch_assoc()){

      
  ?>
  <!-- Hero Section -->
  <section id="hero" class="d-flex align-items-center" style="background-image:
    linear-gradient(rgba(14, 5, 70, 0.6)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12" data-aos="fade-right">
          <h1 class="display-3 fw-bold text-gradient text-center"><?php echo htmlspecialchars($row['title'])?></h1>
          <h2 class="display-5 fw-bold text-gradient text-center"></h2>
          <p class="lead my-4 text-center"><?php echo htmlspecialchars($row["description"]);?></p>
          <div class="hero-buttons justify-content-center">
            <a href="contact.php" class="btn btn-primary btn-lg me-3">Start Your Project</a>
            <a href="portfolio.php" class="btn btn-outline-light btn-lg">Explore Our Work</a>
          </div>
        </div>
        <!-- <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
          <div class="hero-image">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <img src="./assests/gettyimages-1478316499-612x612.jpg" alt="Creative Agency" class="img-fluid rounded-2">
          </div>
        </div> -->
      </div>
    </div>
    <div class="hero-scroll-indicator">
      <a href="#services">
        <div class="mouse">
          <div class="wheel"></div>
        </div>
        <div>
          <span class="scroll-arrow">
            <span></span>
            <span></span>
          </span>
        </div>
      </a>
    </div>
  </section>
  <?php  }

    } ?>

  <!-- Services Section -->
  <section id="services" class="py-5">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'Our Expertise'
      $section_query = $con->prepare("SELECT * FROM websitesections WHERE section_name = ?");
      $section_name = "Our Expertise";
      $section_query->bind_param("s", $section_name);
      $section_query->execute();
      $result = $section_query->get_result();

      if ($result && $row = $result->fetch_assoc()) {
          $title = htmlspecialchars($row['title']);
          $description = htmlspecialchars($row['description']);
      } else {
          // Fallback values if not found
          $title = "Default Title";
          $description = "Default description for this section.";
      }
      ?>

      <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto" data-aos="fade-up">
              <span class="subheading"><?php echo htmlspecialchars($section_name); ?></span>
              <h2 class="section-title"><?php echo $title; ?></h2>
              <p class="section-description"><?php echo $description; ?></p>
          </div>
      </div>

      
      <!-- Services Categories -->
      <div class="row g-4">
        <?php
        $sql="SELECT * FROM services WHERE service_id LIMIT 6";
        $result=mysqli_query($con,$sql) or die("Error occure");
        if(mysqli_num_rows($result)>0){
          while($row=$result->fetch_assoc()){

      ?>
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card">
            <div class="service-icon">
              <?php echo "<i class='{$row['icon_class']}'></i>"?>
            </div>
            <h3><?php echo htmlspecialchars($row['title']);?></h3>
            <p><?php echo htmlspecialchars($row['short_desc']);?></p>
            <a href="services.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <?php } } ?>
      </div>
      
      <!-- Service Stats -->
      <div class="row mt-5 pt-4" style="background-color:#2b2f80;">
        <div class="col-12" data-aos="fade-up">
          <div class="row service-stats">
            <div class="col-3 stat-item text-center">
              <h3 class="text-light">250+</h3>
              <p class="text-light">Projects Completed</p>
            </div>
            <div class="col-3 stat-item text-center">
              <h3 class="text-light">98%</h3>
              <p class="text-light">Client Satisfaction</p>
            </div>
            <div class="col-3 stat-item text-center">
              <h3 class="text-light">15+</h3>
              <p class="text-light">Industry Awards</p>
            </div>
            <div class="col-3 stat-item1 text-center">
              <h3 class="text-light">24/7</h3>
              <p class="text-light">Support Available</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio" class="py-5 bg-light">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'FEATURED WORK'
      $section_name = "FEATURED WORK";
      $stmt = $con->prepare("SELECT * FROM websitesections WHERE section_name = ?");
      $stmt->bind_param("s", $section_name);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result && $row = $result->fetch_assoc()) {
          $title = htmlspecialchars($row['title']);
          $description = htmlspecialchars($row['description']);
      } else {
          $title = "Default Title";
          $description = "Default description for this section.";
      }
      ?>

      <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto mb-3" data-aos="fade-up">
              <span class="subheading"><?php echo htmlspecialchars($section_name); ?></span>
              <h2 class="section-title"><?php echo $title; ?></h2>
              <p class="section-description"><?php echo $description; ?></p>
          </div>
      </div>

      
     
      
      <!-- Owl Carousel Portfolio Items -->
      <div class="owl-carousel portfolio-carousel" data-aos="fade-up">
        <?php
          $sql="SELECT * FROM portfolio WHERE portfolio_id";
          $result=mysqli_query($con,$sql) or die("unseccessful");
          if(mysqli_num_rows($result)>0){
            while($row=$result->fetch_assoc()){
        ?>
        <div class="portfolio-item">
          <div class="portfolio-img">
            <?php echo "<img src='./Admin/upload/" . htmlspecialchars($row['image_urle']) . "' alt='Wavely App' class='img-fluid'>";?>
          </div>
          <div class="portfolio-info">
            <h4><?php echo htmlspecialchars($row['portfolio_name']);?></h4>
            <p><?php echo htmlspecialchars($row['portfolio_sub']);?></p>
            <div class="portfolio-links">
              <a href="portfolio-details.html" class="portfolio-details-link">
                <span>View Project</span>
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <?php
         }
          }
        ?>
      </div>
      
      <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
        <a href="portfolio.php" class="btn btn-primary btn-lg">Explore All Projects</a>
      </div>
    </div>
  </section>




  <!-- Process Section -->
  <section id="process" class="py-5 bg-light">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'OUR APPROACH'
      $section_name = "OUR APPROACH";
      $stmt = $con->prepare("SELECT * FROM websitesections WHERE section_name = ?");
      $stmt->bind_param("s", $section_name);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result && $row = $result->fetch_assoc()) {
          $title = htmlspecialchars($row['title']);
          $description = htmlspecialchars($row['description']);
      } else {
          $title = "Default Title";
          $description = "Default description for this section.";
      }
      ?>

      <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto" data-aos="fade-up">
              <span class="subheading"><?php echo htmlspecialchars($section_name); ?></span>
              <h2 class="section-title"><?php echo $title; ?></h2>
              <p class="section-description"><?php echo $description; ?></p>
          </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="process-timeline" data-aos="fade-up">

          <?php
            $sql="SELECT * FROM process WHERE id";
            $result=mysqli_query($con,$sql) or die("Error occure");
            $offset=1;
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){
              

          ?>
            <div class="process-step">
              <div class="process-number"><?php echo $offset++;?></div>
              <div class="process-content">
                <h4><?php echo htmlspecialchars($row['name']);?></h4>
                <p><?php echo htmlspecialchars($row['description']);?></p>
              </div>
            </div>
          <?php } } ?>

            <!-- <div class="process-step">
              <div class="process-number">02</div>
              <div class="process-content">
                <h4>Strategy</h4>
                <p>Based on our findings, we develop a comprehensive strategy tailored to your specific needs.</p>
              </div>
            </div>
            <div class="process-step">
              <div class="process-number">03</div>
              <div class="process-content">
                <h4>Design & Development</h4>
                <p>Our creative team brings the strategy to life through thoughtful design and meticulous development.</p>
              </div>
            </div>
            <div class="process-step">
              <div class="process-number">04</div>
              <div class="process-content">
                <h4>Testing & Launch</h4>
                <p>We rigorously test everything to ensure quality, then execute a smooth launch of your project.</p>
              </div>
            </div>
            <div class="process-step">
              <div class="process-number">05</div>
              <div class="process-content">
                <h4>Measure & Optimize</h4>
                <p>After launch, we continuously monitor performance and make data-driven improvements.</p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Testimonials Section -->
  <section id="testimonials" class="py-5">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'CLIENT FEEDBACK'
      $section_name = "CLIENT FEEDBACK";
      $stmt = $con->prepare("SELECT * FROM websitesections WHERE section_name = ?");
      $stmt->bind_param("s", $section_name);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result && $row = $result->fetch_assoc()) {
          $title = htmlspecialchars($row['title']);
          $description = htmlspecialchars($row['description']);
      } else {
          $title = "Default Title";
          $description = "Default description for this section.";
      }
      ?>

      <div class="row text-center mb-5">
          <div class="col-lg-8 mx-auto" data-aos="fade-up">
              <span class="subheading"><?php echo htmlspecialchars($section_name); ?></span>
              <h2 class="section-title"><?php echo $title; ?></h2>
              <p class="section-description"><?php echo $description; ?></p>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="testimonial-slider" data-aos="fade-up" data-aos-delay="100">
            <?php 
              $sql="SELECT * FROM testimonial wHERE id";
              $result = mysqli_query($con,$sql) or die("unsucessful");
              if(mysqli_num_rows($result)>0){
                while($row=$result->fetch_assoc()){
            ?>

            <div class="testimonial-item active">
              <div class="testimonial-content">
                <p>"<?php echo htmlspecialchars($row['description']); ?>"</p>
                <div class="testimonial-author">
                  <div class="testimonial-author-img">
                    <img src="./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>" alt="Lena Marshall" class="rounded-circle">
                  </div>
                  <div class="testimonial-author-info">
                    <h5><?php echo htmlspecialchars($row['name']); ?></h5>
                    <span><?php echo htmlspecialchars($row['position']); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <?php   }
              }?>
          </div>
          <div class="testimonial-controls">
            <button class="testimonial-prev"><i class="fas fa-arrow-left"></i></button>
            <div class="testimonial-dots">
              <span class="dot active"></span>
              <span class="dot"></span>
              <span class="dot"></span>
            </div>
            <button class="testimonial-next"><i class="fas fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- Client Logos Section -->
    <section class="py-5">
      <div class="container py-5">
        <?php
        include("configure.php");

        // Fetch the section data for 'OUR CLIENTS'
        $section_name = "OUR CLIENTS";
        $stmt = $con->prepare("SELECT * FROM websitesections WHERE section_name = ?");
        $stmt->bind_param("s", $section_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            $title = htmlspecialchars($row['title']);
            $description = htmlspecialchars($row['description']);
        } else {
            $title = "Default Title";
            $description = "Default description for this section.";
        }
        ?>

        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <span class="subheading"><?php echo htmlspecialchars($section_name); ?></span>
                <h2 class="section-title"><?php echo $title; ?></h2>
                <p class="section-description"><?php echo $description; ?></p>
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
                      echo '<img src="./Admin/upload/' . $image_url . '" alt="' . $name . '" class="img-fluid">';
                      echo '</div>';
                  }
              } else {
                  echo '<p>No client logos found.</p>';
              }
              ?>
            </div>
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
            <h2 class="mb-4">Ready to Transform Your Digital Presence?</h2>
            <p class="lead mb-4">Let's discuss how we can help your business achieve its goals and stand out in the digital landscape.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Schedule Your Free Consultation</a>
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
             <a href="<?php echo htmlspecialchars($row['facebook_link']);?>"><i class="fab fa-facebook-f"></i></a>
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
          <div class="row">
            <div class="footer-links">
            <h4>Services</h4>
            <ul>
            <?php 
              $sql="SELECT * FROM services WHERE service_id limit 5";
              $result=mysqli_query($con,$sql) or die("unsucessful");
              if(mysqli_num_rows($result)>0){
                while($row=$result->fetch_assoc()){
  
            ?>
              <li><a href="services.php"><i class="fas fa-angle-double-right"></i><?php echo htmlspecialchars($row['title']);?></a></li>
              <?php } } ?>
            </ul>
          </div>
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
  <?php
    // Database connection
    include "configure.php";

    // Check connection


    // Query to fetch the WhatsApp number
      $sql = "SELECT whatsapp FROM companyinfo LIMIT 1";
      $result = mysqli_query($con,$sql);

      if ($result && $row = $result->fetch_assoc()) {
          $phone = $row['whatsapp'];
          ?>
          
          <!-- WhatsApp Button -->
          <a href="https://wa.me/<?php echo $phone; ?>?" class="whatsapp-link" target="_blank" aria-label="Contact via WhatsApp">
              <i class="fab fa-whatsapp"></i>
          </a>
          
          <?php
      } else {
          echo "WhatsApp number not found.";
      }

  ?>

  <!-- Back to top button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="fas fa-arrow-up"></i>
  </a>


  <!-- Scripts -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/owl.carousal.min.js"></script>


  <script>
        $(document).ready(function(){
          $(".portfolio-carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800, // Adjust this value for smoother/faster transitions
            fluidSpeed: 800, // Matches smartSpeed for consistent behavior
            slideTransition: 'ease-in-out', // Smooth easing transition
            responsive: {
              0: {
                items: 1
              },
              768: {
                items: 2
              },
              992: {
                items: 3
              }
            }
          });
        });



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

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"> -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->