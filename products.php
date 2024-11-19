<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/products.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Products Section -->
    <section class="product-container">
        <h1>Our Products</h1>
        <p>Explore our wide range of high-quality coconuts.</p>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search for products...">
            <button id="searchButton"><i class="fas fa-search"></i></button>
        </div>

        <!-- Product Cards -->
        <div class="product-grid" id="productGrid">
            
            <div class="product-card">
                <img src="./images/coconut1.jpg" alt="Coconut Premium Quality">
                <h3>Premium Coconut</h3>
                <p>Price: Rs. 500.00</p>
                <button class="view-details"  onclick="window.location.href='./product-details.php'">View Details</button>
            </div>
            <div class="product-card">
                <img src="./images/coconut2.jpg" alt="Organic Coconut">
                <h3>Organic Coconut</h3>
                <p>Price: Rs. 650.00</p>
                <button class="view-details"  onclick="window.location.href='./product-details.php'">View Details</button>
            </div>
            <div class="product-card">
                <img src="./images/coconut3.jpg" alt="Large Coconut">
                <h3>Large Coconut</h3>
                <p>Price: Rs. 790.00</p>
                <button class="view-details" onclick="window.location.href='./product-details.php'">View Details</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/products.js"></script>
</body>
</html>