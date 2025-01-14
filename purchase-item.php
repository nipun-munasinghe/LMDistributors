<?php
    // Start sessions
    session_start();

    // Include database config file
    include_once 'config.php';

    // Check if user is logged in
    if(isset($_SESSION['user_fName'])) {
        /*if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productid'])) {
            $productid = intval($_POST['productid']);
            
            // Fetch the product details from the database
            $sql = "SELECT * FROM product WHERE productid =?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                echo "<script>
                    alert('Invalid product selected.');
                    window.location.href = 'products.php';
                </script>";
                exit;
            }

            $row = $result->fetch_assoc();

            $unitPrice = number_format($row['price'],2);
            $productName = $row['name'];
            $productQTY = $row['quantity'];

            if(isset($_POST['submit-btn'])) {
                $date = date('Y-m-d');
                $orderName = trim($_POST['name']);
                $phone1 = trim($_POST['phone1']);
                $phone2 = trim($_POST['phone2']);
                $address = trim($_POST['address']);
                $quantity = intval($_POST['quantity']);
                $totalPrice = number_format($unitPrice*$quantity,2);
                $status = 'pending';

                // insert order data into database
                $sql = "INSERT INTO order(`date`, `name`, `phone1`, `phone2`, `address`, productName, productid, quantity, itemPrice, totalPrice, `status`)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiissiidds", $date, $orderName, $phone1, $phone2, $address, $productName, $productid, $quantity, $unitPrice, $totalPrice, $status);
                $stmt->execute();

                // calculate & insert available quantity after an order
                $newQuantity = $productQTY - $quantity;

                $sql = "UPDATE product SET quantity =? WHERE productid =?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $newQuantity, $productid);
                $stmt->execute();
                
                echo "<script>
                        window.location.href = 'purchase-item.php';
                      </script>";
            }
        }
        else {
            echo "No product selected.";
        }*/
    }
    else {
        echo "<script>
                alert('Please login to purchase this product');
                window.location.href = 'products.php';
              </script>";
    }
?>

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

        <form action="purchase-item.php?productid=<?php echo $productid; ?>" method="POST" id="purchase-form">
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <!-- Phone Numbers -->
            <div class="form-group">
                <label for="phone1">Phone Number 1</label>
                <input type="tel" id="phone1" name="phone1" placeholder="Enter phone number" required>
            </div>
            <div class="form-group">
                <label for="phone2">Phone Number 2</label>
                <input type="tel" id="phone2" name="phone2" placeholder="Enter alternate phone number">
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
            </div>

            <!-- Quantity -->
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>
            </div>

            <!-- Total Price -->
            <p id="unitPrice" style="display:none;"><?php echo $unitPrice; ?></p>
            <p class="price-display">
                Total Price: Rs. <span id="totalPriceDisplay"><?php echo $unitPrice; ?></span>
            </p>

            <!-- Payment Method -->
            <h2>Select Payment Method</h2>
            <div class="payment-options">
                <label>
                    <input type="radio" name="payment-method" value="cod" id="cod" checked>
                    <br><br>
                    <input type="radio" name="payment-method" value="card" id="card">
                </label>
                    
                <label id="labels">
                    Cash on Delivery
                    <br><br>
                    Credit / Debit Card
                </label>
            </div>

            <!-- Card Details (Hidden by Default) -->
            <div class="card-details" id="card-details">
                <div class="form-group">
                    <label for="bank-name">Bank Name</label>
                    <input type="text" id="bank-name" name="bank-name" placeholder="Enter bank name">
                </div>

                <div class="form-group">
                    <label for="branch">Branch Name</label>
                    <input type="text" id="branch" name="branch" placeholder="Enter branch name">
                </div>

                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="Enter card number">
                </div>

                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY">
                </div>

                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="password" id="cvv" name="cvv" placeholder="CVV">
                </div>

                <p class="note">Note: We do not keep your card details</p>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submit-btn" name="submit-btn" title="Submit details">
                Submit <i class="fas fa-plane"></i>
            </button>
        </form>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/purchase-item.js"></script>
</body>
</html>