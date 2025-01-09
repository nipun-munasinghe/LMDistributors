<?php
    //start sessions
    session_start();

    // Include database configuration
    include_once 'config.php';

    // Fetch products from the database
    $sql = "SELECT * FROM product WHERE quantity > 0";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("Error - Query failed: ".mysqli_error($conn));
    }
?>

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
            <button id="searchButton" title="Search products"><i class="fas fa-search"></i></button>
        </div>

        <!-- Product Cards -->
        <div class="product-grid" id="productGrid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($row['image']);?>" alt="<?php echo htmlspecialchars($row['name']);?>">
                    <h3><?php echo htmlspecialchars($row['name']);?></h3>
                    <p>Rs. <?php echo number_format($row['price'], 2);?></p>
                    <button class="view-details" 
                            onclick="window.location.href='product-details.php?productid=<?php echo $row['productid']; ?>'" 
                            title="View Product">
                        View Details
                    </button>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/products.js"></script>
</body>
</html>