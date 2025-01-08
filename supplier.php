<?php
    // start sessions
    session_start();

    // include database config file
    include_once 'config.php';

    // check user is logged or not
    if(!isset($_SESSION['user_fName'])) {
        // user is not logged in, redirect to login page
        header('Location: login.php');
        exit();
    }
    else {
        // check user's birthday
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));

        if($birthday == $today) {
            $greeting = "Happy birthday ".htmlspecialchars($_SESSION['user_fName'])."!";
        }
        else {
            $greeting = "Welcome ".htmlspecialchars($_SESSION['user_fName'])."!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/supplier.css">

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

            <!-- Supplier Profile -->
            <section class="supplier-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" alt="Supplier Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['fullName'])?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email'])?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['user_phone'])?></p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'" title="Edit Profile"><i class="fa-solid fa-pen"></i> Edit Profile</button>
                    </div>
                </div>
            </section>

            <div class="todayPrice">
                <h2>L.M. Distributors' Today Price</h2>
                <div class="priceContainer">
                    <p>Today Price: <strong>Rs. 125.50</strong> per 1kg</p>
                </div>
            </div>

            <div class="requestSupply">
                <h2>Request to supply</h2>
                <center>
                    <form action="#" method="POST" class="reqForm">
                        <div class="separation">
                            <label for="supplyName">Supplier/Company name: </label>
                            <input type="text" id="supplyName" name="supplyName" value="Supplier Name" required>
                        </div>
                        <div class="separation">
                            <label for="phone">Phone number: </label>
                            <input type="tel" id="phone" name="phone" value="0772121201" required>
                        </div>
                        <div class="separation">
                            <label for="supplyQty">Quantity (kg): </label>
                            <input type="number" id="supplyQty" name="supplyQty" min="1000" value="1000" required>
                        </div>
                        <div class="separation">
                            <label for="yourPrice">Your price (Rs. per kg): </label>
                            <input type="number" id="yourPrice" name="yourPrice" step="0.01" min="0" max="125.50" value="125.50" required>
                        </div>
                        <div class="separation">
                            <label for="supplyDate">Date, you can supply: </label>
                            <input type="date" id="date" name="supplyDate" min="" required>
                        </div>
                        <div class="separation">
                            <label for="comments">Special Comments (optional): </label>
                            <textarea type="comments" id="comments" name="comments" placeholder="Add some special comments..."></textarea>
                        </div>
                        <center>
                            <button type="submit" id="submitBtn" name="submitBtn" class="reqSubmitBtn" title="Submit Details">Submit <i class="fa-solid fa-paper-plane"></i></button>
                        </center>
                    </form>
                </center>
            </div>

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./products.php" title="Browse Products"><i class="fas fa-box-open"></i><br>Products</a>
                </div>
                <div class="card">
                    <a href="./accSettings.php" title="Edit Profile"><i class="fa-solid fa-wrench"></i><br>Account Settings</a>
                </div>
                <div class="card">
                    <a href="./logout.php" title="Sign Out"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/buyer.js"></script>
</body>
</html>