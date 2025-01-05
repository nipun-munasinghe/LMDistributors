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
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));
        // check user's birthday
        if($birthday == $today) {
            // birthday message
            $greeting = "Happy birthday ".$_SESSION['user_fName']."!";
        }
        else {
            // welcome message
            $greeting = "Welcome ".$_SESSION['user_fName']."!";
        }

        // Get the total number of products in the database
        $productQuery = "SELECT COUNT(`productid`) FROM `product`";
        $productCount = mysqli_query($conn, $productQuery);


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/viewIncome.css">

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

            <div class="middleContent">
                <center>
                    <div class="analyzeOutContainer">
                        <h2>Total Analysis <i class="fa-solid fa-chart-column"></i></h2>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Our Total Products</p>
                            <p class="analyzeDisplay" id="totalProducts">: 56</p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Total Orders</p>
                            <p class="analyzeDisplay" id="totalOrders">: 128</p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Total income from Orders (Rs.)</p>
                            <p class="analyzeDisplay" id="totalPrice">: <u>49525.00</u></p>
                        </div>
                    </div>

                    <div class="analyzeOutContainer">
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Accepted Supplies</p>
                            <p class="analyzeDisplay" id="acceptedSupplies">: 201</p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Accepted Orders</p>
                            <p class="analyzeDisplay" id="acceptedOrders">: 261</p>
                        </div>
                    </div>
                </center>
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
                    <a href="./todayPrice.php" title="Buyers & Sellers price list"><i class="fa-solid fa-money-bill-1-wave"></i><br>Today's Price List</a>
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

    <!-- Header -->
    <?php include 'footer.php'; ?>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>