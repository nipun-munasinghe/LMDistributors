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
        //check user's birthday
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));

        if($birthday == $today) {
            $greeting = "Happy birthday ". htmlspecialchars($_SESSION['user_fName'])."!";
        }
        else {
            $greeting = "Welcome ". htmlspecialchars($_SESSION['user_fName'])."!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Messages</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageMessages.css">

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

            <h2 class="displayH2">Messages Details</h2>

            <center>
            <div class="displaySuppliers">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="messageID">Message ID</th>
                                <th class="messageName">Name</th>
                                <th class="email">Email</th>
                                <th class="message">Message</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="messageID">1</td>
                                <td class="messageName">Savindu Rajapksha</td>
                                <td class="email">savindu.r@gmail.com</td>
                                <td class="message">I want to know, do you can supply our ordered products without late?</td>
                                <td class="tStatus">Just asked</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="messageID">2</td>
                                <td class="messageName">Kavindu Ramanayaka</td>
                                <td class="email">kavindu.r@gmail.com</td>
                                <td class="message">Do you have coconut milk products?</td>
                                <td class="tStatus">Replied</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="messageID">3</td>
                                <td class="messageName">K Manchanayaka</td>
                                <td class="email">manchanayaka898@gmail.com</td>
                                <td class="message">Can I pay with paypal for products?</td>
                                <td class="tStatus">Just asked</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="messageID">4</td>
                                <td class="messageName">Priyantha Mahaulpathagama</td>
                                <td class="email">priya1234@gmail.com</td>
                                <td class="message">Can I supply 500 coconuts for lower price for you?</td>
                                <td class="tStatus">Replied</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="messageID">5</td>
                                <td class="messageName">Jehan Fernando</td>
                                <td class="email">purchase.in.lanka.international@gmail.com</td>
                                <td class="message">Can I have a validation form to resell your products from our company?</td>
                                <td class="tStatus">Just asked</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="messageID">6</td>
                                <td class="messageName">Dhanushka Dambagolla</td>
                                <td class="email">dhanu5566@gmail.com</td>
                                <td class="message">Can I exchange a product after I get it?</td>
                                <td class="tStatus">Just asked</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Replied"></i></a> | 
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
                    <a href="./supplyManagement.php" title="Suppliers Management"><i class="fa-solid fa-business-time"></i><br>Manage Suppliers</a>
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