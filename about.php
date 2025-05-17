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
              <a class="nav-link active" href="about.php">About</a>
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

  <!-- About Hero Section -->
   <?php
   include("configure.php");
   $current_page = 'about';
   $sql = "SELECT * FROM hero_sections Where page_name = '$current_page' LIMIT 1";
   $result = mysqli_query($con, $sql) or die("unsuccessful");
   if(mysqli_num_rows($result) > 0) {
     while ($row = $result->fetch_assoc()) {
  ?>
  <section class="about-hero" style="background-image:
    linear-gradient(rgba(14, 5, 70, 0.6)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
          <span class="subheading">ABOUT US</span>
          <h1 class="display-4 fw-bold mb-4 text-gradient main-heading"><?php echo htmlspecialchars($row['title'])?></h1>
          <!-- echo htmlspecialchars($row['sub_title']) -->
          <p class="lead"><?php echo htmlspecialchars($row["description"]);?></p>
          <!-- We're a multidisciplinary digital agency on a mission to help bold businesses thrive in a digital-first world. From strategy to pixel-perfect execution, we believe great work starts with a great relationship. -->
        </div>
      </div>
    </div>
  </section>
  <?php } }?>

  <!-- Founders Section -->
   <?php
      $sql="SELECT * FROM aboutus WHERE id";
      $result=mysqli_query($con, $sql) or die("Unsucessful");
      if(mysqli_num_rows($result)>0){
        while($row=$result->fetch_assoc()){
    ?>
  <section class="py-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
          <img src="./Admin/upload/<?php echo htmlspecialchars($row['image_url']); ?>" style="width:90%; height:70vh;" alt="Founders" class="img-fluid rounded-3">
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <span class="subheading">OUR STORY</span>
          <h2 class="section-title"><?php echo htmlspecialchars($row['heading']); ?></h2>
          <p class="mb-4">"<?php echo htmlspecialchars($row['description']); ?>"</p>
          <div class="d-flex align-items-center">
            <div class="me-4">
              <img src="./Admin/upload/<?php echo htmlspecialchars($row['image_url']); ?>" style="width: 50px;height: 50px; border-radius: 50%;" alt="Faheem Khan" class="rounded-circle">
            </div>
            <div>
              <h5 class="mb-1"><?php echo htmlspecialchars($row['name']); ?></h5>
              <p class="text-muted mb-0"><?php echo htmlspecialchars($row['position']); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php }
      } ?>

  <!-- Core Values Section -->
  <section class="py-5 bg-light">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'OUR VALUES'
      $section_name = "OUR VALUES";
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

      <div class="row g-4">
        <?php
          include "configure.php";

          $sql = "SELECT * FROM ourvalues ORDER BY id ASC";
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
              $delay = 100;
              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                      <div class="value-card text-center">
                          <div class="value-icon">
                              <i class="<?= htmlspecialchars($row['icon']) ?>"></i>
                          </div>
                          <h3><?= htmlspecialchars($row['name']) ?></h3>
                          <p><?= htmlspecialchars($row['description']) ?></p>
                      </div>
                  </div>
                  <?php
                  $delay += 100; // Optional: increment animation delay
              }
          } else {
              echo "<p>No values found.</p>";
          }
          ?>
      </div>
    </div>
  </section>

  <!-- Timeline Section -->
  <section class="py-5">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'OUR JOURNEY'
      $section_name = "OUR JOURNEY";
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
          <ul class="timeline">

          <?php
            $sql="SELECT * FROM milestone WHERE id";
            $result=mysqli_query($con,$sql) or die("unsucessful");
            if(mysqli_num_rows($result)>0){
              while($row=$result->fetch_assoc()){

             
          ?>

            <li class="timeline-item" data-aos="fade-up">
              <div class="timeline-badge">
                <i class="<?php echo htmlspecialchars($row['icon']);?>"></i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="mb-2"><?php echo htmlspecialchars($row['year']);?></h4>
                  <h5 class="text-primary mb-3"><?php echo htmlspecialchars($row['name']);?></h5>
                </div>
                <div class="timeline-body">
                  <p><?php echo htmlspecialchars($row['description']);?></p>
                </div>
              </div>
            </li>
            <?php  }
            }?>
            <!-- <li class="timeline-item" data-aos="fade-up" data-aos-delay="100">
              <div class="timeline-badge">
                <i class="fas fa-globe"></i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="mb-2">2020</h4>
                  <h5 class="text-primary mb-3">First global client signed</h5>
                </div>
                <div class="timeline-body">
                  <p>Expanded our reach beyond local markets to serve clients internationally.</p>
                </div>
              </div>
            </li>
            <li class="timeline-item" data-aos="fade-up" data-aos-delay="200">
              <div class="timeline-badge">
                <i class="fas fa-trophy"></i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="mb-2">2021</h4>
                  <h5 class="text-primary mb-3">100+ projects delivered</h5>
                </div>
                <div class="timeline-body">
                  <p>Reached a significant milestone with over 100 successful projects completed.</p>
                </div>
              </div>
            </li>
            <li class="timeline-item" data-aos="fade-up" data-aos-delay="300">
              <div class="timeline-badge">
                <i class="fas fa-users"></i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="mb-2">2023</h4>
                  <h5 class="text-primary mb-3">Team expands across 4 continents</h5>
                </div>
                <div class="timeline-body">
                  <p>Grew our team to include talented professionals from around the world.</p>
                </div>
              </div>
            </li>
            <li class="timeline-item" data-aos="fade-up" data-aos-delay="400">
              <div class="timeline-badge">
                <i class="fas fa-award"></i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="mb-2">2024</h4>
                  <h5 class="text-primary mb-3">Featured in Awwwards & Webby shortlist</h5>
                </div>
                <div class="timeline-body">
                  <p>Recognized for our exceptional work with industry awards and accolades.</p>
                </div>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-5 bg-light">
    <div class="container py-5">
      <?php
      include("configure.php");

      // Fetch the section data for 'OUR TEAM'
      $section_name = "OUR TEAM";
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

      <div class="row g-4">


        <?php
        include "configure.php";

        // Fetch only active team members
        $sql = "SELECT * FROM teammember WHERE status = 'active' ORDER BY id ASC";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member text-center">
                        <div class="member-img">
                            <img src="./Admin/upload/<?php echo htmlspecialchars($row['image_url']); ?>" alt="Team Member" class="img-fluid" style="object-fit: cover; height: 250px; width: 100%;">
                        </div>
                       <style>
                          .member-info .social-links a {
                              display: inline-flex;
                              align-items: center;
                              justify-content: center;
                              width: 40px;
                              height: 40px;
                              border-radius: 4px;
                              background: var(--dark-color);
                              margin-right: 10px;
                              transition: var(--transition);
                          }

                          .member-info .social-links a:hover {
                              background: var(--secondary-color);
                              color: var(--white-color);
                              transform: translateY(-5px);
                              font-size: 20px;
                          }
                      </style>

                      <div class="member-info mt-4">
                          <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                          <span class="text-muted d-block mb-3"><?php echo htmlspecialchars($row['position']); ?></span>
                          <div class="social-links" style="color:black;">
                              <a href="<?php echo htmlspecialchars($row['facebook_url']); ?>" target="_blank">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="<?php echo htmlspecialchars($row['linkedin_url']); ?>" target="_blank">
                                  <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a href="<?php echo htmlspecialchars($row['instagram_url']); ?>" target="_blank">
                                  <i class="fab fa-instagram"></i>
                              </a>
                          </div>
                      </div>

                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No active team members found.</p>";
        }
        ?>


      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section id="cta" class="py-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cta-inner text-center" data-aos="zoom-in">
            <h2 class="mb-4">Ready to Work Together?</h2>
            <p class="lead mb-4">Let's discuss how we can help your brand reach its full potential.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Get in Touch</a>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Footer -->
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


<!-- WhatsApp -->
<?php
    $result = mysqli_query($con, "SELECT whatsapp FROM companyinfo LIMIT 1");
    if ($row = $result->fetch_assoc()):
  ?>
  <a href="https://wa.me/<?= $row['whatsapp'] ?>" class="whatsapp-link" target="_blank" aria-label="Contact via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
<?php endif; ?>

  <!-- Back to top button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="fas fa-arrow-up"></i>
  </a>


  <!-- Scripts -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/script.js"></script>

  
</body>
</html>
