<?php
    //start sessions
    session_start();

    // Include database configuration
    include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/product-details.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Product Details Section -->
    <section class="product-details">
        <div class="product-card">
            <div class="product-image">
                <img src="./images/slide2.jpg" alt="Product Image" />
            </div>
            
            <div class="product-info">
                <h1>Premium Coconut Oil</h1>
                <p class="product-description">
                    This high-quality coconut oil is perfect for cooking, skincare, and more. Extracted from the freshest coconuts, it ensures purity and natural goodness.
                </p>
                <p class="product-price">Price: Rs. 250.00</p>
                <button class="purchase-button" title="Click to buy">Purchase Now</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/product-details.js"></script>
</body>
</html>