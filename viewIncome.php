<?php
    // start sessions
    session_start();

    // include database config file
    include_once 'config.php';
    
    // check user is logged or not
    if(isset($_SESSION['user_fName']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) {
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));
        // check user's birthday
        if($birthday == $today) {
            // birthday message
            $greeting = "Happy birthday ".htmlspecialchars($_SESSION['user_fName'])."!";
        }
        else {
            // welcome message
            $greeting = "Welcome ".htmlspecialchars($_SESSION['user_fName'])."!";
        }

        // Get the total number of products in the database
        $productQuery = "SELECT COUNT(`productid`) AS totalProducts FROM `product`;";
        $productResult = mysqli_query($conn, $productQuery);
        if (!$productResult) {
            die("Query failed: " . mysqli_error($conn));
        }
        // Fetch the product count from the result
        $productData = mysqli_fetch_assoc($productResult);
        $totalProducts = $productData['totalProducts'];

        // Get the total number of orders in the database
        $orderQuery = "SELECT COUNT(`orderID`) AS totalOrders FROM `order`;";
        $orderResult = mysqli_query($conn, $orderQuery);
        if (!$orderResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the order count from the result
        $orderData = mysqli_fetch_assoc($orderResult);
        $totalOrders = $orderData['totalOrders'];

        // Get the total income from selling products
        $incomeQuery = "SELECT SUM(`totalPrice`) AS totalIncome FROM `order`;";
        $incomeResult = mysqli_query($conn, $incomeQuery);
        if (!$incomeResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the income from the result
        $incomeData = mysqli_fetch_assoc($incomeResult);
        $totalLocalIncome = $incomeData['totalIncome'];

        //calculate accepted supplies from suppliers
        $acceptedQuery = "SELECT COUNT(`supplyID`) AS acceptedSupplies FROM `supplier` WHERE `status` = 'Accepted';";
        $acceptedResult = mysqli_query($conn, $acceptedQuery);
        if (!$acceptedResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the accepted order count from the result
        $acceptedData = mysqli_fetch_assoc($acceptedResult);
        $totalAcceptedSupplies = $acceptedData['acceptedSupplies'];

        // Calculate accepted orders from buyers
        $acceptedOrdersQuery = "SELECT COUNT(`buyID`) AS acceptedOrders FROM `buyer` WHERE `status` = 'Accepted';";
        $acceptedOrdersResult = mysqli_query($conn, $acceptedOrdersQuery);
        if (!$acceptedOrdersResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the accepted order count from the result
        $acceptedOrdersData = mysqli_fetch_assoc($acceptedOrdersResult);
        $totalAcceptedOrders = $acceptedOrdersData['acceptedOrders'];

        // Calculate total messages
        $messageQuery = "SELECT COUNT(`messageID`) AS totalMessages FROM `message`;";
        $messageResult = mysqli_query($conn, $messageQuery);
        if (!$messageResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the message count from the result
        $messageData = mysqli_fetch_assoc($messageResult);
        $totalMessages = $messageData['totalMessages'];

        // Calculate unread messages
        $unreadMessageQuery = "SELECT COUNT(`messageID`) AS unreadMessages FROM `message` WHERE `status` = 'unread';";
        $unreadMessageResult = mysqli_query($conn, $unreadMessageQuery);
        if (!$unreadMessageResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the unread message count from the result
        $unreadMessageData = mysqli_fetch_assoc($unreadMessageResult);
        $totalUnreadMessages = $unreadMessageData['unreadMessages'];

        // Calculate read messages
        $readMessageQuery = "SELECT COUNT(`messageID`) AS readMessages FROM `message` WHERE `status` = 'read';";
        $readMessageResult = mysqli_query($conn, $readMessageQuery);
        if (!$readMessageResult) {
            die("Query failed: ". mysqli_error($conn));
        }
        // Fetch the read message count from the result
        $readMessageData = mysqli_fetch_assoc($readMessageResult);
        $totalReadMessages = $readMessageData['readMessages'];

        // Calculate replied messages
        $totalRepliedMessages = $totalMessages - ($totalReadMessages + $totalUnreadMessages);
    }
    else {
        // user is not logged in, redirect to login page
        header('Location: login.php');
        exit();
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
                            <p class="analyzeDisplay" id="totalProducts">: <?php echo $totalProducts; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Total Orders</p>
                            <p class="analyzeDisplay" id="totalOrders">: <?php echo $totalOrders; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Total income from selling products</p>
                            <p class="analyzeDisplay" id="totalPrice">: <u><?php echo 'Rs. '.$totalLocalIncome; ?></u></p>
                        </div>
                    </div>

                    <div class="analyzeOutContainer">
                        <h2>Coconut Orders & Supplies</h2>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Accepted Supplies from Suppliers</p>
                            <p class="analyzeDisplay" id="acceptedSupplies">: <?php echo $totalAcceptedSupplies; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Accepted Orders from Buyers</p>
                            <p class="analyzeDisplay" id="acceptedOrders">: <?php echo $totalAcceptedOrders; ?></p>
                        </div>
                    </div>

                    <div class="analyzeOutContainer">
                        <h2>Messages Overview</h2>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Total Messages</p>
                            <p class="analyzeDisplay">: <?php echo $totalMessages; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Unread Messages</p>
                            <p class="analyzeDisplay">: <?php echo $totalUnreadMessages; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Read but not replied Messages</p>
                            <p class="analyzeDisplay">: <?php echo $totalReadMessages; ?></p>
                        </div>
                        <div class="analyzeContainer">
                            <p class="analyzeLabel">Replied Messages</p>
                            <p class="analyzeDisplay">: <?php echo $totalRepliedMessages; ?></p>
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