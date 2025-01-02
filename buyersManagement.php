<?php
//start sessions
session_start();

//connect to database
include_once 'config.php';

// Check if user is logged in
if(!isset($_SESSION['user_fName'])) {
    //user is not logged in, redirect to login page
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

    //query to fetch buyers data
    $query = "SELECT * FROM `buyer`";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyers Management</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/buyersManagement.css">

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

            <h2 class="displaySuppliersH2">Buyers' Management Details</h2>

            <center>
            <div class="displaySuppliers">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="buyID">Buy ID</th>
                                <th class="buyerName">Buyer Name</th>
                                <th class="reqDate">Requested Date</th>
                                <th class="wantedDate">Wanted Date</th>
                                <th class="buyQuantity">Quantity(kg)</th>
                                <th class="ourPrice">Our Price (Rs.)</th>
                                <th class="theirPrice">Their Price (Rs.)</th>
                                <th class="Phone">Phone</th>
                                <th class="comments">Comments</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="buyID"><?php echo htmlspecialchars($row['buyID']); ?></td>
                                <td class="buyerName"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="reqDate"><?php echo htmlspecialchars($row['reqDate']); ?></td>
                                <td class="wantedDate"><?php echo htmlspecialchars($row['wantedDate']); ?></td>
                                <td class="buyQuantity"><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <td class="ourPrice"><?php echo htmlspecialchars($row['ourPrice']); ?></td>
                                <td class="theirPrice"><?php echo htmlspecialchars($row['theirPrice']); ?></td>
                                <td class="Phone"><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td class="comments"><?php echo htmlspecialchars($row['comments']); ?></td>
                                <td class="tStatus"><?php echo htmlspecialchars($row['status']); ?></td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <?php endwhile;?>
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
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
            </div>
        </div>
    </div>

    <!-- link scripts -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>