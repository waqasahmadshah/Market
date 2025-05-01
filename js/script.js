// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
  // Initialize AOS animation library if it exists
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false,
      disable: 'mobile'
    });
  }

  // Preloader
  const preloader = document.getElementById("preloader");
  if (preloader) {
    window.addEventListener("load", () => {
      setTimeout(() => {
        preloader.classList.add("fade-out");
        setTimeout(() => {
          preloader.style.display = "none";
        }, 500);
      }, 800);
    });
  }

  // Navbar scroll effect with enhanced performance
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    let lastScrollTop = 0;
    let ticking = false;

    window.addEventListener("scroll", () => {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      
      if (!ticking) {
        window.requestAnimationFrame(() => {
          if (scrollTop > 50) {
            navbar.classList.add("scrolled");
          } else {
            navbar.classList.remove("scrolled");
          }
          lastScrollTop = scrollTop;
          ticking = false;
        });
        
        ticking = true;
      }
    });
  }

  // Testimonial slider with improved transitions
  const testimonialItems = document.querySelectorAll(".testimonial-item");
  const dots = document.querySelectorAll(".dot");
  const prevBtn = document.querySelector(".testimonial-prev");
  const nextBtn = document.querySelector(".testimonial-next");
  
  if (testimonialItems.length > 0 && dots.length > 0 && prevBtn && nextBtn) {
    let currentIndex = 0;
    let isAnimating = false;
    let autoSlideInterval;

    function showTestimonial(index) {
      if (isAnimating || index < 0 || index >= testimonialItems.length) return;
      isAnimating = true;
      
      testimonialItems.forEach((item) => {
        item.classList.remove("active");
      });
      dots.forEach((dot) => {
        dot.classList.remove("active");
      });

      testimonialItems[index].classList.add("active");
      dots[index].classList.add("active");
      
      setTimeout(() => {
        isAnimating = false;
      }, 600); // Match this with CSS transition time
    }

    function nextTestimonial() {
      currentIndex = (currentIndex + 1) % testimonialItems.length;
      showTestimonial(currentIndex);
    }

    function prevTestimonial() {
      currentIndex = (currentIndex - 1 + testimonialItems.length) % testimonialItems.length;
      showTestimonial(currentIndex);
    }

    function startAutoSlide() {
      stopAutoSlide(); // Clear any existing interval
      autoSlideInterval = setInterval(nextTestimonial, 5000);
    }

    function stopAutoSlide() {
      if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
      }
    }

    // Event listeners for testimonial controls
    nextBtn.addEventListener("click", () => {
      stopAutoSlide();
      nextTestimonial();
      startAutoSlide();
    });
    
    prevBtn.addEventListener("click", () => {
      stopAutoSlide();
      prevTestimonial();
      startAutoSlide();
    });

    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        if (currentIndex !== index) {
          stopAutoSlide();
          currentIndex = index;
          showTestimonial(currentIndex);
          startAutoSlide();
        }
      });
    });

    // Start auto slide
    startAutoSlide();
    
    // Pause auto slide when hovering over testimonial
    const testimonialContainer = document.querySelector(".testimonial-slider");
    if (testimonialContainer) {
      testimonialContainer.addEventListener("mouseenter", stopAutoSlide);
      testimonialContainer.addEventListener("mouseleave", startAutoSlide);
    }

    // Initialize first testimonial
    showTestimonial(0);
  }

  // Back to top button with smooth animation
  const backToTopBtn = document.querySelector(".back-to-top");
  if (backToTopBtn) {
    const scrollThreshold = 300;
    let ticking = false;
    
    window.addEventListener("scroll", () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          if (window.scrollY > scrollThreshold) {
            backToTopBtn.classList.add("active");
          } else {
            backToTopBtn.classList.remove("active");
          }
          ticking = false;
        });
        
        ticking = true;
      }
    });

    backToTopBtn.addEventListener("click", (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  // Set current year in footer
  const yearElement = document.getElementById("current-year");
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  }

  // Service Categories with improved interaction
  const serviceCategories = document.querySelectorAll(".service-category");
  if (serviceCategories.length > 0) {
    serviceCategories.forEach(category => {
      category.addEventListener("click", () => {
        // Remove active class from all categories
        serviceCategories.forEach(cat => cat.classList.remove("active"));
        
        // Add active class to clicked category
        category.classList.add("active");
        
        // Get filter value
        const filterValue = category.getAttribute("data-category");
        
        // Add filtering logic here if needed
        console.log("Selected service category:", filterValue);
        
        // Add subtle animation to indicate selection
        category.style.transform = "scale(1.05)";
        setTimeout(() => {
          category.style.transform = "";
        }, 300);
      });
    });
  }
  
  // Portfolio Categories with enhanced filtering
  const portfolioCategories = document.querySelectorAll(".portfolio-category, .filter-btn");
  const portfolioItems = document.querySelectorAll(".portfolio-item");
  
  if (portfolioCategories.length > 0 && portfolioItems.length > 0) {
    portfolioCategories.forEach(category => {
      category.addEventListener("click", () => {
        // Remove active class from all categories
        portfolioCategories.forEach(cat => cat.classList.remove("active"));
        
        // Add active class to clicked category
        category.classList.add("active");
        
        // Get filter value
        const filterValue = category.getAttribute("data-filter");
        
        // Filter portfolio items with animation
        portfolioItems.forEach(item => {
          // First set all items to fade out
          item.style.opacity = "0";
          item.style.transform = "scale(0.95)";
          
          setTimeout(() => {
            // Then show/hide based on filter
            if (filterValue === "all" || !filterValue) {
              item.style.display = "block";
              setTimeout(() => {
                item.style.opacity = "1";
                item.style.transform = "scale(1)";
              }, 50);
            } else {
              if (item.getAttribute("data-category") && item.getAttribute("data-category").includes(filterValue)) {
                item.style.display = "block";
                setTimeout(() => {
                  item.style.opacity = "1";
                  item.style.transform = "scale(1)";
                }, 50);
              } else {
                item.style.display = "none";
              }
            }
          }, 300);
        });
      });
    });
  }

  // Animate elements when they come into view
  const animateElements = document.querySelectorAll(".animate");
  if (animateElements.length > 0) {
    let ticking = false;
    
    function checkIfInView() {
      animateElements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < window.innerHeight - elementVisible) {
          element.classList.add("active");
        }
      });
    }

    window.addEventListener("scroll", () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          checkIfInView();
          ticking = false;
        });
        
        ticking = true;
      }
    });
    
    // Initial check
    checkIfInView();
  }

  // Portfolio hover effect with improved performance
  const portfolioImgs = document.querySelectorAll(".portfolio-img, .portfolio-card-img");
  portfolioImgs.forEach((img) => {
    const imgElement = img.querySelector("img");
    if (imgElement) {
      img.addEventListener("mouseenter", () => {
        imgElement.style.transform = "scale(1.1)";
      });

      img.addEventListener("mouseleave", () => {
        imgElement.style.transform = "scale(1)";
      });
    }
  });

  // Smooth scroll for navigation links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const targetId = this.getAttribute("href");
      if (targetId === "#" || !targetId) return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        
        window.scrollTo({
          top: targetElement.offsetTop - 80,
          behavior: "smooth",
        });

        // Close mobile menu if open
        const navbarCollapse = document.querySelector(".navbar-collapse");
        if (navbarCollapse && navbarCollapse.classList.contains("show")) {
          const navbarToggler = document.querySelector(".navbar-toggler");
          if (navbarToggler) {
            navbarToggler.click();
          }
        }
      }
    });
  });

  // Enhanced form validation for contact form
  const contactForm = document.querySelector("form");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Comprehensive validation
      let valid = true;
      const inputs = this.querySelectorAll("input, textarea, select");
      const errorMessages = {};

      inputs.forEach((input) => {
        // Remove previous validation styling
        input.classList.remove("is-invalid");
        input.classList.remove("is-valid");
        
        // Check for required fields
        if (input.hasAttribute("required") && input.value.trim() === "") {
          valid = false;
          input.classList.add("is-invalid");
          errorMessages[input.name] = "This field is required";
        } 
        // Check email format
        else if (input.type === "email" && input.value.trim() !== "") {
          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(input.value.trim())) {
            valid = false;
            input.classList.add("is-invalid");
            errorMessages[input.name] = "Please enter a valid email address";
          } else {
            input.classList.add("is-valid");
          }
        } 
        // Mark other filled fields as valid
        else if (input.value.trim() !== "") {
          input.classList.add("is-valid");
        }
      });

      if (valid) {
        // Simulate form submission
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
          const originalText = submitBtn.textContent;

          submitBtn.disabled = true;
          submitBtn.textContent = "Sending...";

          // Remove any existing messages
          const existingAlerts = contactForm.querySelectorAll('.alert');
          existingAlerts.forEach(alert => alert.remove());

          setTimeout(() => {
            // Show success message
            const successMessage = document.createElement("div");
            successMessage.className = "alert alert-success mt-3";
            successMessage.innerHTML = '<i class="fas fa-check-circle me-2"></i> Your message has been sent successfully!';

            this.reset();
            
            // Reset validation classes
            inputs.forEach(input => {
              input.classList.remove("is-valid");
              input.classList.remove("is-invalid");
            });
            
            this.appendChild(successMessage);

            submitBtn.disabled = false;
            submitBtn.textContent = originalText;

            // Remove success message after 5 seconds
            setTimeout(() => {
              successMessage.classList.add("fade-out");
              setTimeout(() => {
                successMessage.remove();
              }, 500);
            }, 5000);
          }, 2000);
        }
      } else {
        // Display error summary if needed
        console.log("Form has errors:", errorMessages);
      }
    });
  }

  // Counter animation for stats with improved performance
  const statItems = document.querySelectorAll('.stat-item h3, .featured-stat h3');
  
  if (statItems.length > 0) {
    function animateCounter(el) {
      // Parse the target number, handling formats like "250+" or "98%"
      const text = el.textContent;
      const hasPlus = text.includes('+');
      const hasPercent = text.includes('%');
      const target = parseInt(text.replace(/[^\d]/g, '')) || 0;
      
      // Animation settings
      const duration = 2000; // 2 seconds
      const step = 50; // Update every 50ms
      const steps = duration / step;
      const increment = target / steps;
      let current = 0;
      
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          // Format the final number with any special characters
          if (hasPlus) {
            el.textContent = Math.floor(target) + '+';
          } else if (hasPercent) {
            el.textContent = Math.floor(target) + '%';
          } else {
            el.textContent = Math.floor(target);
          }
          clearInterval(timer);
        } else {
          // Format the current number with any special characters
          if (hasPlus) {
            el.textContent = Math.floor(current) + '+';
          } else if (hasPercent) {
            el.textContent = Math.floor(current) + '%';
          } else {
            el.textContent = Math.floor(current);
          }
        }
      }, step);
    }
    
    // Use Intersection Observer for stats animation
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    statItems.forEach(item => {
      observer.observe(item);
    });
  }
  
  // Add parallax effect to hero sections
  const heroSections = document.querySelectorAll('#hero, .portfolio-hero, .about-hero, .contact-hero, .services-hero, .service-detail-hero, .case-study-hero');
  
  if (heroSections.length > 0) {
    let ticking = false;
    
    window.addEventListener('scroll', () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          const scrollPosition = window.scrollY;
          
          heroSections.forEach(section => {
            // Only apply effect if section is in viewport
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
              // Apply subtle parallax effect to background
              section.style.backgroundPosition = `center ${scrollPosition * 0.1}px`;
            }
          });
          
          ticking = false;
        });
        
        ticking = true;
      }
    });
  }
  
  // Initialize any accordions
  const accordionButtons = document.querySelectorAll('.accordion-button');
  if (accordionButtons.length > 0) {
    accordionButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Add a subtle animation to the icon
        const icon = this.querySelector('i');
        if (icon) {
          icon.style.transform = 'rotate(180deg)';
          setTimeout(() => {
            icon.style.transform = '';
          }, 300);
        }
      });
    });
  }
  
  // Portfolio pagination
  const paginationButtons = document.querySelectorAll('.pagination-btn');
  if (paginationButtons.length > 0) {
    paginationButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Remove active class from all pagination buttons
        paginationButtons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // Here you would add pagination logic
        console.log("Pagination button clicked:", this.textContent.trim());
      });
    });
  }
  
  // Client logo hover effects
  const clientLogos = document.querySelectorAll('.client-logo');
  if (clientLogos.length > 0) {
    clientLogos.forEach(logo => {
      const img = logo.querySelector('img');
      if (img) {
        logo.addEventListener('mouseenter', function() {
          img.style.filter = 'grayscale(0%)';
          img.style.opacity = '1';
        });
        
        logo.addEventListener('mouseleave', function() {
          img.style.filter = 'grayscale(100%)';
          img.style.opacity = '0.7';
        });
      }
    });
  }
  
  // Add animation classes to elements when they come into view
  const animatedElements = document.querySelectorAll('[data-aos]');
  if ('IntersectionObserver' in window && animatedElements.length > 0) {
    const animationObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('aos-animate');
        }
      });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(element => {
      animationObserver.observe(element);
    });
  }
});
