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
        
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Management</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/supplyManagement.css">

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
            <div class="sidebar-header">
                <h2>Admin Dashboard</h2>
                <i class="fas fa-times" id="close-sidebar" title="Close Dashboard"></i>
            </div>

            <ul class="sidebar-menu">
                <li><a href="./admin.php" title="Your Profile"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a href="./manageManagers.php" title="Managers Management"><i class="fas fa-user-tie"></i> Manage Managers</a></li>
                <li><a href="./manageProducts.php" title="Products Management"><i class="fa-solid fa-store"></i> Manage Products</a></li>
                <li><a href="./manageOrders.php" title="Orders Management"><i class="fa-solid fa-cart-shopping"></i> Manage Orders</a></li>
                <li><a href="./todayPrice.php" title="Buyers & Sellers price list"><i class="fa-solid fa-money-bill-1-wave"></i> Today's Price List</a></li>
                <li><a href="./buyersManagement.php" title="Buyers Management"><i class="fa-solid fa-handshake"></i> Manage Buyers</a></li>
                <li><a href="./supplyManagement.php" title="Suppliers Management"><i class="fa-solid fa-business-time"></i> Manage Suppliers</a></li>
                <li><a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i> Manage Messages</a></li>
                <li><a href="./viewIncome.php" title="View Analytics"><i class="fas fa-chart-line"></i> View Analytics</a></li>
                <li><a href="./accSettings.php" title="Edit profile & Change password"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="./logout.php" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <h2 class="displaySuppliersH2">Suppliers' Management Details</h2>

            <center>
            <div class="displaySuppliers">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="supplyID">Supply ID</th>
                                <th class="supplierName">Supplier Name</th>
                                <th class="reqDate">Requested Date</th>
                                <th class="supplyDate">Supply Date</th>
                                <th class="supplyQuantity">Quantity(kg)</th>
                                <th class="ourPrice">Our Price (Rs.)</th>
                                <th class="theirPrice">Their Price (Rs.)</th>
                                <th class="Phone">Phone</th>
                                <th class="comments">Comments</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="supplyID">1</td>
                                <td class="supplierName">Upali Coco Products</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="supplyDate">10/12/2024</td>
                                <td class="supplyQuantity">2000</td>
                                <td class="ourPrice">125.50</td>
                                <td class="theirPrice">125.50</td>
                                <td class="Phone">0788753442</td>
                                <td class="comments">null</td>
                                <td class="tStatus">Rejected</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="supplyID">2</td>
                                <td class="supplierName">Aberathne</td>
                                <td class="reqDate">09/12/2024</td>
                                <td class="supplyDate">15/12/2024</td>
                                <td class="supplyQuantity">2500</td>
                                <td class="ourPrice">125.50</td>
                                <td class="theirPrice">125.00</td>
                                <td class="Phone">0788759466</td>
                                <td class="comments">Lower price</td>
                                <td class="tStatus">Accepted</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="supplyID">3</td>
                                <td class="supplierName">Jayindi Coco Lanka</td>
                                <td class="reqDate">09/12/2024</td>
                                <td class="supplyDate">11/12/2024</td>
                                <td class="supplyQuantity">10000</td>
                                <td class="ourPrice">125.50</td>
                                <td class="theirPrice">125.50</td>
                                <td class="Phone">0766753442</td>
                                <td class="comments">Ten thousand kilo grams</td>
                                <td class="tStatus">null</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="supplyID">4</td>
                                <td class="supplierName">Kamal Rathnasiri</td>
                                <td class="reqDate">10/12/2024</td>
                                <td class="supplyDate">20/12/2024</td>
                                <td class="supplyQuantity">3600</td>
                                <td class="ourPrice">125.50</td>
                                <td class="theirPrice">124.50</td>
                                <td class="Phone">0788555442</td>
                                <td class="comments">null</td>
                                <td class="tStatus">Accepted</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="supplyID">5</td>
                                <td class="supplierName">Samagi Products</td>
                                <td class="reqDate">18/12/2024</td>
                                <td class="supplyDate">30/12/2024</td>
                                <td class="supplyQuantity">1000</td>
                                <td class="ourPrice">125.50</td>
                                <td class="theirPrice">125.50</td>
                                <td class="Phone">0788753442</td>
                                <td class="comments">null</td>
                                <td class="tStatus">null</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
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
                    <a href="./manageOrders.php" title="Orders Management"><i class="fa-solid fa-cart-shopping"></i><br>Manage Orders</a>
                </div>
                <div class="card">
                    <a href="./todayPrice.php" title="Buyers & Sellers price list"><i class="fa-solid fa-money-bill-1-wave"></i><br>Today's Price List</a>
                </div>
                <div class="card">
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
                <div class="card">
                    <a href="./buyersManagement.php" title="Buyers Management"><i class="fa-solid fa-handshake"></i><br>Manage Buyers</a>
                </div>
            </div>
        </div>
    </div>

    <!-- link scripts -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>