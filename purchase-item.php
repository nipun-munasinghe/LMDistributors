<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Item</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/purchase-item.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Purchase Section -->
    <section class="purchase-section">
        <h1>Purchase Item</h1>
        <form id="purchase-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="phone1">Phone Number 1</label>
                <input type="tel" id="phone1" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="phone2">Phone Number 2</label>
                <input type="tel" id="phone2" placeholder="Enter alternate phone number">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" rows="3" placeholder="Enter your address" required></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" min="1" value="1" required>
            </div>

            <p class="price-display"> Total Price: Rs. <span id="price">25</span></p>

            <div class="form-group">
                <h2>Select Payment Method</h2>
                
                <div class="payment-options"> 
                    <input type="radio" name="payment-method" value="cod" checked>
                    <label>Cash on Delivery</label>
                    
                    <input type="radio" name="payment-method" value="card">
                    <label>Credit/Debit Card</label>
                </div>
            </div>

            <!-- Hidden Card Details -->
            <div class="card-details" id="card-details" style="display: none;">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" placeholder="Enter card number">
                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry-date" placeholder="MM/YY">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" placeholder="CVV">
            </div>

            <button type="button" id="submit-btn">
                Submit <i class="fas fa-rocket"></i>
            </button>
        </form>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/purchase-item.js"></script>
</body>
</html>