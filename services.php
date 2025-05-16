<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assests/WhatsApp Image 2025-04-22 at 1.57.27 PM.jpeg">
  <title>Our Services | MaretxSolutions - Creative Digital Agency</title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./css/aos.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
              <a class="nav-link active" href="services.php">Services</a>
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

  <!-- Services Hero Section -->
   <?php
    
    $current_page='service';
    $sql="SELECT * FROM hero_sections WHERE page_name='$current_page'";
    $result=mysqli_query($con, $sql) or die("connection failed");
    if(mysqli_num_rows($result)>0){
      while($row=$result->fetch_assoc()){
   ?>
  <section class="services-hero" style="background-image:
    linear-gradient(rgba(0, 0, 0, 0.5), rgba(20, 12, 68, 0.5)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
          <span class="subheading">OUR SERVICES</span>
          <h1 class="display-4 fw-bold mb-4 text-gradient main-heading"><?php echo htmlspecialchars($row['title'])?></h1>
          <p class="lead"><?php echo htmlspecialchars($row['description'])?></p>
        </div>
      </div>
    </div>
  </section>
  <?php } }?>

  <!-- Services Overview Section -->
  <section class="py-5">
    <div class="container py-5">
      <div class="row g-4">
          <?php
          // Fetch all services
          $sql = "SELECT * FROM services";
          $result = mysqli_query($con, $sql) or die("Service query failed");

          if (mysqli_num_rows($result) > 0) {
              while ($service = $result->fetch_assoc()) {
                  // Create a URL slug from the service title
                  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $service['title'])));
          ?>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-card-large">
                      <div class="service-card-img">
                          <img src="./Admin/upload/<?php echo htmlspecialchars($service['image_url']); ?>" alt="Service Image">
                      </div>
                      <div class="service-card-content">
                          <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                          <p><?php echo htmlspecialchars($service['short_desc']); ?></p>
                          <div class="service-features">
                              <?php
                              // Fetch features related to this service
                              $service_id = $service['service_id'];
                              $feature_sql = "SELECT * FROM service_features WHERE services_id = $service_id";
                              $feature_result = mysqli_query($con, $feature_sql) or die("Feature query failed");

                              if (mysqli_num_rows($feature_result) > 0) {
                                  while ($feature = $feature_result->fetch_assoc()) {
                              ?>
                                  <div class="service-feature-item">
                                      <div class="service-feature-icon">
                                          <i class="fas fa-check"></i>
                                      </div>
                                      <span><?php echo htmlspecialchars($feature['feature_name']); ?></span>
                                  </div>
                              <?php
                                  }
                              } else {
                                  echo "<p>No features listed.</p>";
                              }
                              ?>
                          </div>
                          <a href="sub-category.php?service=<?php echo urlencode($slug); ?>" class="btn btn-primary service-link-btn">Learn More</a>
                      </div>
                  </div>
              </div>
          <?php
              }
          } else {
              echo "<p>No services found.</p>";
          }
          ?>
      </div>
    </div>
  </section>


  <!-- Our Process Section
  <section id="process" class="py-5 bg-light">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto" data-aos="fade-up">
          <span class="subheading">OUR APPROACH</span>
          <h2 class="section-title">How We Work</h2>
          <p class="section-description">Our proven methodology ensures every project delivers exceptional results that exceed expectations.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="process-timeline" data-aos="fade-up">
            <div class="process-step">
              <div class="process-number">01</div>
              <div class="process-content">
                <h4>Discovery</h4>
                <p>We start by understanding your business, goals, audience, and market to establish a solid foundation.</p>
              </div>
            </div>
            <div class="process-step">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- FAQ Section -->
  <!-- <section class="py-5">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto" data-aos="fade-up">
          <span class="subheading">QUESTIONS</span>
          <h2 class="section-title">Frequently Asked Questions</h2>
          <p class="section-description">Find answers to common questions about our services and process.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item" data-aos="fade-up">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  How long does a typical project take?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Project timelines vary based on scope and complexity. A typical website project takes 6-8 weeks, while a comprehensive branding project might take 8-12 weeks. During our initial consultation, we'll provide a more accurate timeline based on your specific needs.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  What is your pricing structure?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We offer both project-based and retainer pricing models. Each proposal is customized based on your specific requirements, timeline, and objectives. We're transparent about costs and provide detailed breakdowns so you know exactly what you're investing in.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Do you work with clients outside your location?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We work with clients worldwide. Our collaborative process and communication tools make remote partnerships seamless and effective. We've successfully completed projects for clients across North America, Europe, Asia, and Australia.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  What makes your agency different?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We combine strategic thinking with creative execution and technical expertise. Our approach is collaborative and transparent, treating clients as partners. We focus on measurable results, not just aesthetics, ensuring your investment drives real business growth.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Do you offer ongoing support after project completion?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes, we offer various maintenance and support packages to ensure your digital assets continue to perform optimally. From website maintenance to ongoing marketing support, we can tailor a solution that meets your needs and budget.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- CTA Section -->
  <section id="cta" class="py-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cta-inner text-center" data-aos="zoom-in">
            <h2 class="mb-4">Ready to Start Your Project?</h2>
            <p class="lead mb-4">Let's discuss how our services can help you achieve your business goals.</p>
            <a href="contact.php" class="btn btn-primary btn-lg">Get in Touch</a>
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
  
    
</body>
</html>
