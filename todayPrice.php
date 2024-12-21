<?php
// start sessions
session_start();

//include database config file
include_once 'config.php';

// Check if user is logged in
if(!isset($_SESSION['user_fName'])) {
    //user is not logged in redirect to login page
    header('Location: login.php');
    exit();
}
else {
    $dob = $_SESSION['user_dob'];
    $today = date('m-d');
    $birthday = date('m-d', strtotime($dob));

    //check user's birthday
    if($today == $birthday) {
        $greeting = "Happy Birthday ".htmlspecialchars($_SESSION['user_fName']). "!";
    }
    else {
        $greeting = "Welcome ".htmlspecialchars($_SESSION['user_fName'])."!";
    }

    // Price For Buyers
    if(isset($_POST['buyerPriceBtn'])) {
        $buyerPrice = trim($_POST['buyerPrice']);
        $today = date('Y-m-d');

        $sql = "UPDATE buyerprice SET price = ?, date = ? WHERE bPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dsi", $buyerPrice, $today, $bPID);
        $bPID = 1;
        $result = $stmt->execute();

        if ($result) {
            echo "<script>alert('Buyer price updated successfully!');</script>";
        }
        else {
            echo "<script>alert('Failed to update buyer price. Please try again!');</script>";
        }
    }
    $sql = "SELECT price FROM buyerprice WHERE bPID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bPID);
    $bPID = 1;
    $stmt->execute();
    $result = $stmt->get_result();
    $buyerPrice = $result->fetch_assoc();

    //price for suppliers
    if(isset($_POST['supplierPriceBtn'])) {
        $supplierPrice = trim($_POST['supplierPrice']);
        $today = date('Y-m-d');

        $sql = "UPDATE supplyerprice SET price=?, date=? WHERE sPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt ->bind_param("dsi", $supplierPrice, $today, $sPID);
        $sPID = 1;
        $result = $stmt->execute();

        if ($result) {
            echo "<script>alert('Supplier price updated successfully!');</script>";
        }
        else {
            echo "<script>alert('Failed to update supplier price. Please try again!');</script>";
        }
    }
    $sql = "SELECT price FROM supplyerprice WHERE sPID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sPID);
    $sPID = 1;
    $stmt->execute();
    $result = $stmt->get_result();
    $supplierPrice = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Prices List</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/todayPrice.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Container -->
    <div class="container">
        <!-- Hidden Sidebar -->
        <aside id="sidebar" class="sidebar">
            <?php include 'sidebar.php'; ?>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1><?php echo $greeting; ?></h1>
            </div>

            <div class="bodySeparation">
                <div class="toBuyers">
                    <h2><i class="fa-regular fa-handshake"></i> Price For Buyers  <i class="fa-solid fa-arrow-up"></i></h2>
                    <div class="inputCard">
                        <form action="todayPrice.php" method="POST">
                            <input type="number" min="0" step="0.01" id="buyerPrice" name="buyerPrice" placeholder="Enter Today's Price for Buyers..." required>
                            <button class="addBtn" id="buyerPriceBtn" name="buyerPriceBtn" type="submit" title="Add Price for Buyers">Add Buyer's Price</button>
                        </form>
                    </div>
                    <br>
                    <div class="displayCard">
                        <p class="priceLabel">Today's Price for Buyers:</p>
                        <div class="displayPrices"><p>Rs. <strong><?php echo $buyerPrice['price']; ?></strong> Per kg</p></div>
                    </div>
                </div>

                <div class="toSuppliers">
                    <h2><i class="fa-solid fa-cubes"></i> Price For Suppliers  <i class="fa-solid fa-arrow-down"></i></h2>
                    <div class="inputCard">
                        <form action="todayPrice.php" method="POST">
                            <input type="number" min="0" step="0.01" id="supplierPrice" name="supplierPrice" placeholder="Enter Today's Price for Suppliers..." required>
                            <button class="addBtn" id="supplierPriceBtn" name="supplierPriceBtn" type="submit" title="Add Price for Suppliers">Add Supplier's Price</button>
                        </form>
                    </div>
                    <br>
                    <div class="displayCard">
                        <p class="priceLabel">Today's Price for Suppliers:</p>
                        <div class="displayPrices"><p>Rs. <strong><?php echo $supplierPrice['price']; ?></strong> Per kg</p></div>
                    </div>
                </div>
            </div>

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./manageManagers.php" title="Managers Management"><i class="fas fa-user-tie"></i><br>Manage Managers</a>
                </div>
                <div class="card">
                    <a href="./manageProducts.php" title="Products Management"><i class="fa-solid fa-store"></i><br>Manage Products</a>
                </div>
                <div class="card">
                    <a href="./manageOrders.php" title="Orders Management"><i class="fa-solid fa-cart-shopping"></i><br>Manage Orders</a>
                </div>
                <div class="card">
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
                <div class="card">
                    <a href="./supplyManagement.php" title="Suppliers Management"><i class="fa-solid fa-business-time"></i><br>Manage Suppliers</a>
                </div>
                <div class="card">
                    <a href="./buyersManagement.php" title="Buyers Management"><i class="fa-solid fa-handshake"></i><br>Manage Buyers</a>
                </div>
            </div>
        </div>
    </div>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>