<?php
    //start sessions
    session_start();

    // Include database configuration
    include_once 'config.php';

    if (isset($_GET['productid'])) {
        $productid = intval($_GET['productid']);

        // Fetch the product details from the database
        $sql = "SELECT * FROM product WHERE productid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productid);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the product exists
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }
    }
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
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
            </div>
            
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="product-price">Rs. <?php echo number_format($product['price'], 2); ?></p>
                
                <!-- Purchase Button -->
                <form action="purchase-item.php" method="POST">
                    <input type="hidden" name="productid" value="<?php echo htmlspecialchars($product['productid']); ?>">
                    <button type="submit" class="purchase-button">Purchase Now</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/product-details.js"></script>
</body>
</html>