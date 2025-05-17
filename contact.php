<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assests/WhatsApp Image 2025-04-22 at 1.57.27 PM.jpeg">
  <title>Contact Us | MaretxSolutions - Creative Digital Agency</title>


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
              <a class="nav-link " href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio.php">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ms-lg-3" href="contact.php">Let's Talk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- Contact Hero Section -->
    <?php
    $current_page='contact';
    $sql="SELECT * FROM hero_sections Where page_name = '$current_page' LIMIT 1";
    $result=mysqli_query($con,$sql) or die("unsuccessful");
    if(mysqli_num_rows($result)>0){
      while($row=$result->fetch_assoc()){

      
  ?>
  <section class="about-hero" style="background-image:
    linear-gradient(rgba(14, 5, 70, 0.6)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
          <span class="subheading">CONTACT US</span>
          <h1 class="display-4 fw-bold mb-4 text-gradient main-heading"><?php echo htmlspecialchars($row['title'])?></h1>
          <p class="lead"><?php echo htmlspecialchars($row["description"]);?></p>
        </div>
      </div>
    </div>
  </section>
  <?php } } ?>

  <!-- Contact Form Section -->
  <section class="py-5">
    <div class="container py-5">
      <div class="row g-4">
        <div class="col-lg-7" data-aos="fade-right">
          <div class="contact-form">
            <h2 class="mb-4">Send Us a Message</h2>
            <?php
              include "configure.php";

              $success = false; // Flag to track if form was successfully submitted

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $name = mysqli_real_escape_string($con, $_POST['name']);
                  $email = mysqli_real_escape_string($con, $_POST['email']);
                  $phone = mysqli_real_escape_string($con, $_POST['phone']);
                  $subject = mysqli_real_escape_string($con, $_POST['subject']);
                  $msg = mysqli_real_escape_string($con, $_POST['message']);

                  $sql = "INSERT INTO `messages` (`name`, `email`, `phone`, `subject`, `message`) 
                          VALUES ('$name', '$email', '$phone', '$subject', '$msg')";
                  
                  if (mysqli_query($con, $sql)) {
                      $success = true;
                  } else {
                      die("Database error: " . mysqli_error($con));
                  }
              }
              ?>



                <?php if ($success): ?>
                  <div class="alert alert-success" role="alert">
                    ✅ Your message has been successfully submitted.
                  </div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="contactForm">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone" class="form-label">Phone No</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg mt-3">Send Message</button>
                </form>
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-left">
          <?php
              // Fetch companycontact, LIMIT 2
              $sql = "SELECT * FROM companycontact LIMIT 2";
              $result = mysqli_query($con, $sql) or die("Error occurred");

              $contacts = [];
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $contacts[] = $row;
                  }
              }

              // Fetch companyinfo (only one row expected)
              $sql1 = "SELECT * FROM companyinfo";
              $result1 = mysqli_query($con, $sql1) or die("Error occurred");

              $companyInfo = null;
              if (mysqli_num_rows($result1) > 0) {
                  $companyInfo = mysqli_fetch_assoc($result1);
              }

              if (!empty($contacts)) {
              ?>
              <div class="contact-info-card">
                  <h2 class="mb-4">Get in Touch</h2>

                  <div class="contact-info-item">
                      <div class="contact-info-icon">
                          <i class="fas fa-envelope"></i>
                      </div>
                      <div>
                          <h5>Email Us</h5>
                          <?php foreach ($contacts as $contact) { ?>
                              <p><?php echo htmlspecialchars($contact['email']); ?></p>
                          <?php } ?>
                      </div>
                  </div>

                  <div class="contact-info-item">
                      <div class="contact-info-icon">
                          <i class="fas fa-phone-alt"></i>
                      </div>
                      <div>
                          <h5>Call Us</h5>
                          <?php foreach ($contacts as $contact) { ?>
                              <p><?php echo htmlspecialchars($contact['phone_number']); ?></p>
                          <?php } ?>
                      </div>
                  </div>

                  <div class="contact-info-item">
                      <div class="contact-info-icon">
                          <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div>
                          <h5>Visit Us</h5>
                          <?php foreach ($contacts as $contact) { ?>
                              <p><?php echo htmlspecialchars($contact['address']); ?></p>
                          <?php } ?>
                      </div>
                  </div>
              </div>



              <?php if ($companyInfo) { ?>
                  <div class="mt-4 links">
                      <h5>Follow Us</h5>
                      <div class="social-links mt-3">
                          <?php if (!empty($companyInfo['twitter_link'])) { ?>
                              <a href="<?php echo htmlspecialchars($companyInfo['twitter_link']); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                          <?php } ?>
                          <?php if (!empty($companyInfo['facebook_link'])) { ?>
                              <a href="<?php echo htmlspecialchars($companyInfo['facebook_link']); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                          <?php } ?>
                          <?php if (!empty($companyInfo['instagram_link'])) { ?>
                              <a href="<?php echo htmlspecialchars($companyInfo['instagram_link']); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                          <?php } ?>
                          <?php if (!empty($companyInfo['linkedin_link'])) { ?>
                              <a href="<?php echo htmlspecialchars($companyInfo['linkedin_link']); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                          <?php } ?>
                      </div>
                  </div>
              <?php } ?>

          </div>
          <?php } ?>
      </div>


      </div>
    </div>
  </section>

  <!-- Map Section -->
  <section class="py-5 bg-light">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto" data-aos="fade-up">
          <span class="subheading">LOCATION</span>
          <h2 class="section-title">Find Us</h2>
          <p class="section-description">Based in NYC — Serving clients worldwide</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12" data-aos="zoom-in">
          <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.11976397304605!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1645564562986!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
