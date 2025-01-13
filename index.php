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

    <!-- Set favicon -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>

    <?php include 'header.php'; ?>

    <section class="hero">
        <img src="./images/banner1.jpg" alt="Coconut Farms">
        <div class="hero-text animate__animated animate__fadeInRight">
            <h2>Welcome to L. M. Distributors</h2>
            <p>Your trusted partner for high-quality<br> coconut products.</p>
            <a href="products.php" class="btn-primary" title="Browse Products">Explore</a>
        </div>
    </section>

    <section class="info">
        <h2 class="animate__animated animate__fadeInUp">Why Choose Us?</h2>
        <p class="animate__animated animate__fadeInUp animate__delay-1s infoP">At L. M. Distributors, we take pride in delivering 
            <strong>premium-quality coconuts</strong> carefully sourced from the finest farms, ensuring unmatched taste and natural goodness. 
            Whether you're a buyer, supplier, or coconut enthusiast, we guarantee an experience that prioritizes freshness, quality, 
            and sustainability.</p>
            
        <div class="info-cards">
            <div class="card animate__animated animate__zoomIn">
                <img src="./images/beach-background-with-two-coconuts.jpg" alt="Fresh Coconut">
                <h4>Freshness Guaranteed</h4>
                <p>Direct from farms to ensure freshness and quality.</p>
            </div>

            <div class="card animate__animated animate__zoomIn animate__delay-1s">
                <img src="./images/tropical-coconut-cocktail-decorated-plumeria-table.jpg" alt="Quality Control">
                <h4>Strict Quality Control</h4>
                <p>Every coconut is carefully inspected before dispatch.</p>
            </div>

            <div class="card animate__animated animate__zoomIn animate__delay-2s">
                <img src="./images/firm-handshake.jpg" alt="Trustworthy Partnership">
                <h4>Trustworthy Partnership</h4>
                <p>We are a reliable partner committed to your satisfaction.</p>
            </div>
        </div>
    </section>

    <!-- staff cards -->
    <section class="staff">
        <h2 class="animate__animated animate__fadeInUp">Meet Our Managers</h2>
        <p class="animate__animated animate__fadeInUp animate__delay-1s">Our experienced team of managers ensures smooth operations and exceptional service quality at L. M. Distributors.</p>
        
        <div class="staff-cards">
            <!-- Manager 1 -->
            <div class="staff-card animate__animated animate__zoomIn animate__delay-2s">
                <img src="./images/bohemian-man-with-his-arms-crossed.jpg" alt="Manager 1">
                <h4>Noel Fernando</h4>
                <p>Operations Manager</p>
                <p>With 10+ years of experience, Noel specializes in supply chain management and ensures timely delivery of quality products.</p>
            </div>
            <!-- Manager 2 -->
            <div class="staff-card animate__animated animate__zoomIn animate__delay-3s">
                <img src="./images/manager1.jpg" alt="Manager 2">
                <h4>Nurawi Wijesinghe</h4>
                <p>Customer Relations Manager</p>
                <p>Nurawi is dedicated to building lasting relationships with our clients by ensuring exceptional service.</p>
            </div>
            <!-- Manager 3 -->
            <div class="staff-card animate__animated animate__zoomIn animate__delay-4s">
                <img src="./images/attendant.jpg" alt="Manager 3">
                <h4>Asitha Perera</h4>
                <p>Quality Assurance Manager</p>
                <p>Asitha ensures all products meet the highest standards, maintaining our reputation for premium quality.</p>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements">
        <h2 class="animate__animated animate__fadeInUp">Our Achievements</h2>
        <p class="animate__animated animate__fadeInUp animate__delay-2s achievementsP">We are proud of our journey and the trust our community has placed in us. Here are some of our milestones:</p>
        
        <div class="achievement-cards">
            <!-- Products -->
            <div class="achievement-card animate__animated animate__zoomIn animate__delay-2s">
                <h3>100+</h3>
                <p>Products</p>
            </div>
            <!-- Buyers -->
            <div class="achievement-card animate__animated animate__zoomIn animate__delay-3s">
                <h3>100+</h3>
                <p>Buyers</p>
            </div>
            <!-- Suppliers -->
            <div class="achievement-card animate__animated animate__zoomIn animate__delay-4s">
                <h3>100+</h3>
                <p>Suppliers</p>
            </div>
            <!-- Users -->
            <div class="achievement-card animate__animated animate__zoomIn animate__delay-5s">
                <h3>1000+</h3>
                <p>Users</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Link the script -->
    <script src="./js/index.js" ></script>
</body>
</html>