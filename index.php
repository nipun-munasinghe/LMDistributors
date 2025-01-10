<?php
    // start sessions
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

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
        <p class="animate__animated animate__fadeInUp animate__delay-1s">At L. M. Distributors, we take pride in delivering 
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

    <?php include 'footer.php'; ?>

    <script src="./js/index.js" ></script>
</body>
</html>