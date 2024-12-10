<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- link the stylesheet -->
    <link rel="stylesheet" href="./css/index.css">

    
    <!-- set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>

    <?php include 'header.php'; ?>

    <section class="hero">
        <img src="./images/banner1.jpg" alt="Coconut Farms"> <!-- Image size: 1920x600px -->
        <div class="hero-text">
            <h2>Welcome to L. M. Distributors</h2>
            <p>Your trusted partner for high-quality<br> coconut products.</p>
            <a href="products.php" class="btn-primary" title="Browse Products">Explore Products</a>
        </div>
    </section>

    <section class="info">
        <h2>Why Choose Us?</h2>
        <p>At L. M. Distributors, we take pride in delivering, <strong>premium-quality coconuts</strong>  carefully sourced from the finest farms, 
            ensuring unmatched taste and natural goodness. Whether you're a buyer, supplier, or coconut enthusiast, we guarantee an experience that 
            prioritizes freshness, quality, and sustainability.</p>
        <br>

        <div class="info-cards">
            <div class="card">
                <!-- Expected image size: 150x150px -->
                <img src="./images/beach-background-with-two-coconuts.jpg" alt="Fresh Coconut">
                <h4>Freshness Guaranteed</h4>
                <p>Direct from farms to ensure freshness and quality.</p>
            </div>

            <div class="card">
                <!-- Expected image size: 150x150px -->
                <img src="./images/tropical-coconut-cocktail-decorated-plumeria-table.jpg" alt="Quality Control">
                <h4>Strict Quality Control</h4>
                <p>Every coconut is carefully inspected before dispatch.</p>
            </div>

            <div class="card">
                <!-- Expected image size: 150x150px -->
                <img src="./images/firm-handshake.jpg" alt="Quality Control">
                <h4>Trustworthy Partnership</h4>
                <p>We are a reliable partner committed to your satisfaction.</p>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>