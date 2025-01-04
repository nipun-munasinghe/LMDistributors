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
        
        //edit order status part
        if (isset($_POST['editOrderBtn'])) {
            // Get the orderID from the form
            $orderID = $_POST['orderID'];
        
            // Prepare the SQL to fetch the current status
            $sql = "SELECT `status` FROM `order` WHERE `orderID` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $orderID);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        
            if ($row) {
                // Get the current status
                $currentStatus = $row['status'];
        
                // Toggle the status
                $newStatus = ($currentStatus == "pending") ? "completed" : "pending";
        
                // Update the status in the database
                $updateSql = "UPDATE `order` SET `status` = ? WHERE `orderID` = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("si", $newStatus, $orderID);
                $updateStmt->execute();
        
                // Redirect to prevent resubmission
                header("Location: manageOrders.php");
                exit();
            }
            else {
                echo "<script>alert('Order not found.');</script>";
            }
        }
        
        //delete order part
        if (isset($_POST['deleteOrderBtn'])) {
            $orderID = $_POST['orderID'];
        
            // Prepare the SQL to delete the order
            $deleteSql = "DELETE FROM `order` WHERE `orderID` = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $orderID);
            $deleteStmt->execute();
        
            if ($deleteStmt->affected_rows > 0) {
                echo "<script>alert('Order deleted successfully!');</script>";
            }
            else {
                echo "<script>alert('Failed to delete order.');</script>";
            }

            // Redirect to prevent resubmission
            header("Location: manageOrders.php");
            exit();
        }

        // Fetch all orders from the database
        $sql = "SELECT * FROM `order`";
        $result = $conn->query($sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
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
                                <th class="orderID">Order ID</th>
                                <th class="orderDate">Ordered Date</th>
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
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="orderID"><?php echo htmlspecialchars($row['orderID']); ?></td>
                                <td class="orderDate"><?php echo $row['date']; ?></td>
                                <td class="customerName"><?php echo $row['name']; ?></td>
                                <td class="customerPhone1"><?php echo $row['phone1']; ?></td>
                                <td class="customerPhone2"><?php echo !empty($row['phone2']) ? htmlspecialchars($row['phone2']) : 'None'; ?></td>
                                <td class="customerAddress"><?php echo $row['address']; ?></td>
                                <td class="tName"><?php echo $row['productName']; ?></td>
                                <td class="productID"><?php echo $row['productid']; ?></td>
                                <td class="tQuantity"><?php echo $row['quantity']; ?></td>
                                <td class="tPrice"><?php echo $row['itemPrice']; ?></td>
                                <td class="totalPrice"><?php echo $row['totalPrice']; ?></td>
                                <td class="tStatus"><?php echo $row['status']; ?></td>
                                <td class="tAction actionBtn">
                                    <!-- Edit Button -->
                                    <form method="POST" action="">
                                        <input type="hidden" name="orderID" value="<?php echo htmlspecialchars($row['orderID']); ?>">
                                        <button type="submit" name="editOrderBtn" class="actionBtns" id="editOrderBtn" title="Edit Status">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    </form>
                                    <!-- Delete Button -->
                                    <form method="POST" action="" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="orderID" value="<?php echo htmlspecialchars($row['orderID']); ?>">
                                        <button type="submit" name="deleteOrderBtn" class="actionBtns" id="deleteOrderBtn" title="Delete Order">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>
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
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this order?');
        }
    </script>
</body>
</html>