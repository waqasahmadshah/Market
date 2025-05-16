<?php
include("configure.php");

if (isset($_GET['service'])) {
    $service_slug = mysqli_real_escape_string($con, $_GET['service']);

    // Find service by slug (title converted)
    $sql = "SELECT * FROM services";
    $result = mysqli_query($con, $sql) or die("Service query failed");

    $service = null;

    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['title'])));
            if ($slug === $service_slug) {
                $service = $row;
                break;
            }
        }
    }

    if ($service) {
        $service_id = $service['service_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($service['title']); ?> | MaretxSolutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Navbar -->
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

<!-- Service Hero Section -->
<section class="service-detail-hero" style="background-image:
    linear-gradient(rgba(0, 0, 0, 0.5), rgba(20, 12, 68, 0.5)),
    url('./Admin/upload/<?php echo htmlspecialchars($row['image_url'])?>');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12" data-aos="fade-right">
                <a href="services.php" class="back-link mb-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to Services
                </a>
                <h1 class="display-4 fw-bold mb-4 text-gradient"><?php echo htmlspecialchars($service['title']); ?></h1>
                <p class="lead mb-4"><?php echo htmlspecialchars($service['short_desc']); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Service Overview Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="subheading">OVERVIEW</span>
                <h2 class="section-title"><?php echo htmlspecialchars($service['title']); ?></h2>
                <?php 
                $paragraphs = explode("\n", $service['description']);
                foreach ($paragraphs as $para) {
                    echo '<p>' . htmlspecialchars(trim($para)) . '</p>';
                }
                ?>
                
                <div class="service-detail-list mt-4">
                <?php
                $feature_sql = "SELECT * FROM service_features WHERE services_id = $service_id";
                $feature_result = mysqli_query($con, $feature_sql) or die("Feature query failed");

                if (mysqli_num_rows($feature_result) > 0) {
                    while ($feature = $feature_result->fetch_assoc()) {
                ?>
                    <div class="service-detail-list-item">
                        <div class="service-detail-list-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h5 class="mb-1"><?php echo htmlspecialchars($feature['feature_name']); ?></h5>
                            <p class="mb-0"><?php echo htmlspecialchars($feature['feature_des']); ?></p>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
                </div>
            </div>
            <div class="col-lg-5 py-5" data-aos="fade-left">
                <img src="./Admin/upload/<?php echo htmlspecialchars($service['image_url']); ?>" class="img-fluid" alt="Service Image" style="border-radius: 10px; margin-top: 50px;">
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <span class="subheading">OUR TECH STACK</span>
                <h2 class="section-title">Our Comprehensive <?php echo htmlspecialchars($service['title']); ?> Services</h2>
            </div>
        </div>
        <div class="row g-4">
        <?php
        $sql = "SELECT * FROM services_card WHERE service_id = $service_id";
        $result = mysqli_query($con, $sql) or die("Tech stack query failed");

        if (mysqli_num_rows($result) > 0) {
            while ($card = $result->fetch_assoc()) {
        ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="<?php echo htmlspecialchars($card['icon']); ?>"></i>
                    </div>
                    <h3><?php echo htmlspecialchars($card['services_card_name']); ?></h3>
                    <p><?php echo htmlspecialchars($card['services_card_description']); ?></p>
                </div>
            </div>
        <?php
            }
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

<?php
    } else {
        echo "<h2>Service Not Found</h2>";
    }
} else {
    echo "<h2>No Service Selected</h2>";
}
?>
