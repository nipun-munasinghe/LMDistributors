<?php
//start sessions
session_start();

// connect config file
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
        if($birthday == $today) {
            $greeting = "Happy Birthday ".htmlspecialchars($_SESSION['user_fName']). "!";
        }
        else {
            $greeting = "Welcome ".htmlspecialchars($_SESSION['user_fName'])."!";
        }

        // Fetch all orders from the database
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageOrders.css">

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

            <h2 class="displayOrdersH2">All orders <i class="fa-solid fa-box-open"></i></h2>

            <center>
            <div class="displayOrders">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="orderID">Order Number</th>
                                <th class="orderDate">Order Date</th>
                                <th class="customerName">Customer Name</th>
                                <th class="customerPhone1">Phone 1</th>
                                <th class="customerPhone2">Phone 2</th>
                                <th class="customerAddress">Address</th>
                                <th class="tName">Product Name</th>
                                <th class="productID">Product ID</th>
                                <th class="tQuantity">Quantity</th>
                                <th class="tPrice">Price (Rs. )</th>
                                <th class="totalPrice">Total Price(Rs.)</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="orderID">1</td>
                                <td class="orderDate">2024-05-15</td>
                                <td class="customerName">Shehara Gihethmi</td>
                                <td class="customerPhone1">0777431661</td>
                                <td class="customerPhone2">0718567899</td>
                                <td class="customerAddress">no 125/A, big brain road, Kollupitiya, Sri Lanka.</td>
                                <td class="tName">Coconut Oil</td>
                                <td class="productID">4</td>
                                <td class="tQuantity">5</td>
                                <td class="tPrice">500.00</td>
                                <td class="totalPrice">2500.00</td>
                                <td class="tStatus">Pending</td>
                                <td class="tAction"><a href="#" title="Edit status"><i class="fa-solid fa-edit"></i></a> | <a href="#" title="Delete Order"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            </center>
            
            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./manageManagers.php" title="Managers Management"><i class="fas fa-user-tie"></i><br>Manage Managers</a>
                </div>
                <div class="card">
                    <a href="./manageProducts.php" title="Products Management"><i class="fa-solid fa-store"></i><br>Manage Products</a>
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
                <div class="card">
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
            </div>
        </div>
    </div>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>