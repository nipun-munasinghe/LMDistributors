<?php
    // start sessions
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L.M. Distributors-Home</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="./css/index.css">

    <!-- Include Animate.css library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Set favicon -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    
    <!-- Add AOS library for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Add Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>
<body>

    <div class="headerFile>
        <?php include 'header.php'; ?>
    </div>

    <section class="hero">
        <div class="hero-image">
            <img src="./images/banner1.jpg" alt="Coconut Farms">
        </div>
        <div class="hero-content">
            <div class="hero-text animate__animated animate__fadeInRight">
                <h1>L. M. Distributors</h1>
                <p>Your trusted partner for high-quality coconut products.</p>
                <div class="hero-buttons">
                    <a href="products.php" class="btn-primary" title="Browse Products">
                        <span>Explore</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="contact.php" class="btn-secondary" title="Contact Us">
                        <span>Contact Us</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <div>
                <span class="scroll-text">Scroll Down</span>
            </div>
        </div>
    </section>

    <section class="info">
        <h2 data-aos="fade-up">Why Choose Us?</h2>
        <p data-aos="fade-up" data-aos-delay="200" class="infoP">At L. M. Distributors, we take pride in delivering 
            <strong>premium-quality coconuts</strong> carefully sourced from the finest farms, ensuring unmatched taste and natural goodness. 
            Whether you're a buyer, supplier, or coconut enthusiast, we guarantee an experience that prioritizes freshness, quality, 
            and sustainability.</p>
            
        <div class="info-cards">
            <div class="card" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <img src="./images/beach-background-with-two-coconuts.jpg" alt="Fresh Coconut">
                <h4>Freshness Guaranteed</h4>
                <p>Direct from farms to ensure freshness and quality.</p>
                <a href="about.php#freshness" class="card-link">Learn More <i class="fas fa-chevron-right"></i></a>
            </div>

            <div class="card" data-aos="zoom-in" data-aos-delay="300">
                <div class="card-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <img src="./images/tropical-coconut-cocktail-decorated-plumeria-table.jpg" alt="Quality Control">
                <h4>Strict Quality Control</h4>
                <p>Every coconut is carefully inspected before dispatch.</p>
                <a href="about.php#quality" class="card-link">Learn More <i class="fas fa-chevron-right"></i></a>
            </div>

            <div class="card" data-aos="zoom-in" data-aos-delay="500">
                <div class="card-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <img src="./images/firm-handshake.jpg" alt="Trustworthy Partnership">
                <h4>Trustworthy Partnership</h4>
                <p>We are a reliable partner committed to your satisfaction.</p>
                <a href="about.php#partnership" class="card-link">Learn More <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products">
        <div class="section-header" data-aos="fade-up">
            <h2>Featured Products</h2>
            <p>Discover our premium selection of coconut products</p>
        </div>
        
        <div class="product-carousel" data-aos="fade-up" data-aos-delay="200">
            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconutA.jpg" alt="Fresh Coconut">
                    <div class="product-overlay">
                        <a href="products.php?id=1" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Fresh Coconuts</h4>
                    <p>Premium quality young coconuts</p>
                </div>
            </div>
            
            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconut-oil.jpg" alt="Coconut Oil">
                    <div class="product-overlay">
                        <a href="products.php?id=2" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Virgin Coconut Oil</h4>
                    <p>100% pure and organic</p>
                </div>
            </div>
            
            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconutMilk.jpg" alt="Coconut Water">
                    <div class="product-overlay">
                        <a href="products.php?id=3" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Coconut Milk</h4>
                    <p>Refreshing natural hydration</p>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconutA.jpg" alt="Fresh Coconut">
                    <div class="product-overlay">
                        <a href="products.php?id=1" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Fresh Coconuts</h4>
                    <p>Premium quality young coconuts</p>
                </div>
            </div>
            
            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconut-oil.jpg" alt="Coconut Oil">
                    <div class="product-overlay">
                        <a href="products.php?id=2" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Virgin Coconut Oil</h4>
                    <p>100% pure and organic</p>
                </div>
            </div>
            
            <div class="product-item">
                <div class="product-image">
                    <img src="./images/products/coconutMilk.jpg" alt="Coconut Water">
                    <div class="product-overlay">
                        <a href="products.php?id=3" class="view-product">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h4>Coconut Water</h4>
                    <p>Refreshing natural hydration</p>
                </div>
            </div>
        </div>
        
        <div class="view-all-container" data-aos="fade-up" data-aos-delay="400">
            <a href="products.php" class="btn-view-all">View All Products <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <!-- staff cards -->
    <section class="staff">
        <div class="section-header" data-aos="fade-up">
            <h2>Meet Our Managers</h2>
            <p>Our experienced team of managers ensures smooth operations and exceptional service quality at L. M. Distributors.</p>
        </div>
        
        <div class="staff-cards">
            <!-- Manager 1 -->
            <div class="staff-card" data-aos="zoom-in" data-aos-delay="100">
                <div class="staff-image">
                    <img src="./images/bohemian-man-with-his-arms-crossed.jpg" alt="Manager 1">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="staff-info">
                    <h4>Noel Fernando</h4>
                    <span class="position">Operations Manager</span>
                    <p>With 10+ years of experience, Noel specializes in supply chain management and ensures timely delivery of quality products.</p>
                </div>
            </div>
            
            <!-- Manager 2 -->
            <div class="staff-card" data-aos="zoom-in" data-aos-delay="300">
                <div class="staff-image">
                    <img src="./images/manager1.jpg" alt="Manager 2">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="staff-info">
                    <h4>Nurawi Wijesinghe</h4>
                    <span class="position">Customer Relations Manager</span>
                    <p>Nurawi is dedicated to building lasting relationships with our clients by ensuring exceptional service.</p>
                </div>
            </div>
            
            <!-- Manager 3 -->
            <div class="staff-card" data-aos="zoom-in" data-aos-delay="500">
                <div class="staff-image">
                    <img src="./images/attendant.jpg" alt="Manager 3">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="staff-info">
                    <h4>Asitha Perera</h4>
                    <span class="position">Quality Assurance Manager</span>
                    <p>Asitha ensures all products meet the highest standards, maintaining our reputation for premium quality.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements">
        <div class="achievements-bg"></div>
        <div class="achievements-content">
            <div class="section-header" data-aos="fade-up">
                <h2>Our Achievements</h2>
                <p class="achievementsP">We are proud of our journey and the trust our community has placed in us. Here are some of our milestones:</p>
            </div>
            
            <div class="achievement-cards">
                <!-- Products -->
                <div class="achievement-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="achievement-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3 class="counter" data-target="100">0</h3>
                    <p>Products</p>
                </div>
                
                <!-- Buyers -->
                <div class="achievement-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="achievement-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="counter" data-target="100">0</h3>
                    <p>Buyers</p>
                </div>
                
                <!-- Suppliers -->
                <div class="achievement-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="achievement-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="counter" data-target="100">0</h3>
                    <p>Suppliers</p>
                </div>
                
                <!-- Users -->
                <div class="achievement-card" data-aos="zoom-in" data-aos-delay="700">
                    <div class="achievement-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="counter" data-target="1000">0</h3>
                    <p>Users</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="section-header" data-aos="fade-up">
            <h2>What Our Clients Say</h2>
            <p>Hear from our satisfied customers about their experience with L. M. Distributors</p>
        </div>
        
        <div class="testimonial-carousel" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"As a successful restaurant owner, I choose the quality of coconuts from L. M. Distributors is exceptional. Their commitment to freshness and timely delivery has made them our preferred supplier for years."</p>
                    <div class="testimonial-author">
                        <img src="./images/profiles/6781889894230-supplier1.jpg" alt="Testimonial Author">
                        <div class="author-info">
                            <h4>Shehanie Perera</h4>
                            <p>Restaurant Owner</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"As always choosing a very good and quality product, I appreciate their consistent quality and professional approach. Their coconut products are always in high demand among my customers."</p>
                    <div class="testimonial-author">
                        <img src="./images/profiles/6781877c37e52-customer2.jpg" alt="Testimonial Author">
                        <div class="author-info">
                            <h4>Bubi Mendis</h4>
                            <p>Retail Store Owner</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"I appreciate their exceptional coconut oil and fresh products. Their coconut ingredients enhance our authentic dishes and are always praised by our diners for superior taste and quality."</p>
                    <div class="testimonial-author">
                        <img src="./images/profiles/avatar-3.png" alt="Testimonial Author">
                        <div class="author-info">
                            <h4>Mehesini Peris</h4>
                            <p>Restaurant Owner</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"I appreciate their organic coconut range and reliable service. Their coconut products are always popular with health-conscious customers who value pure, natural ingredients."</p>
                    <div class="testimonial-author">
                        <img src="./images/profiles/avatar-1.png" alt="Testimonial Author">
                        <div class="author-info">
                            <h4>Sihal Fernando</h4>
                            <p>Health Store Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p>"I appreciate their premium coconut flour and desiccated coconut. Their coconut products give our cakes exceptional texture and are always cakes with their products requested by customers for special orders."</p>
                    <div class="testimonial-author">
                        <img src="./images/profiles/avatar-4.png" alt="Testimonial Author">
                        <div class="author-info">
                            <h4>Ishini Weegoda</h4>
                            <p>Bakery Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="newsletter-content" data-aos="fade-up">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter to receive updates on new products, special offers, and industry insights.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit" class="btn-subscribe">Subscribe <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="./js/index.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const increment = target / 100;
            
            const updateCounter = () => {
                const value = +counter.innerText;
                if (value < target) {
                    counter.innerText = Math.ceil(value + increment);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.innerText = target;
                }
            };
            
            updateCounter();
        });
        
        // Initialize carousels
        $(document).ready(function(){
            $('.product-carousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            
            $('.testimonial-carousel').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                dots: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>