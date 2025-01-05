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

        // Status Button
        if (isset($_POST['statusBtn'])) {
            $messageID = $_POST['messageID'];

            // Fetch the current status
            $fetchStatusSql = "SELECT `status` FROM `message` WHERE `messageID` = ?";
            $fetchStatusStmt = $conn->prepare($fetchStatusSql);
            $fetchStatusStmt->bind_param("i", $messageID);
            $fetchStatusStmt->execute();
            $result = $fetchStatusStmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $currentStatus = $row['status'];

                // Determine the new status
                switch ($currentStatus) {
                    case 'unread':
                        $newStatus = 'read';
                        break;
                    case 'read':
                        $newStatus = 'replied';
                        break;
                    default:
                        $newStatus = 'unread'; // Reset to Unread if invalid status
                        break;
                }

                // Update the status in the database
                $updateStatusSql = "UPDATE `message` SET `status` = ? WHERE `messageID` = ?";
                $updateStatusStmt = $conn->prepare($updateStatusSql);
                $updateStatusStmt->bind_param("si", $newStatus, $messageID);
                $updateStatusStmt->execute();

                // Redirect to prevent resubmission
                header("Location: manageMessages.php");
                exit();
            }
            else {
                echo "Message ID not found.";
            }
        }

        // delete button
        if (isset($_POST['deleteBtn'])) {
            $messageID = $_POST['messageID'];
        
            // Prepare SQL query to delete
            $deleteSql = "DELETE FROM `message` WHERE `messageID` = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $messageID);
            $deleteStmt->execute();
        
            // Redirect to prevent resubmission
            header("Location: manageMessages.php");
            exit();
        }

        $sql = "SELECT * FROM `message`;";
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die("Error - Query failed: ".mysqli_error($conn));
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
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="messageID"><?php echo htmlspecialchars($row['messageID']) ?></td>
                                <td class="messageName"><?php echo htmlspecialchars($row['name']) ?></td>
                                <td class="email"><?php echo htmlspecialchars($row['email']) ?></td>
                                <td class="message"><?php echo htmlspecialchars($row['message']) ?></td>
                                <td class="tStatus">
                                    <?php
                                        if(htmlspecialchars($row['status']) == 'unread') {
                                            echo "<em class='unread'>Unread</em>";
                                        }
                                        else if(htmlspecialchars($row['status']) == 'read') {
                                            echo "<p class='read'>Read</p>";
                                        }
                                        else {
                                            echo "<p class='replied'>Replied</p>";
                                        }
                                    ?>
                                </td>
                                <td class="tAction">
                                    <form method="post" action="">
                                        <input type="hidden" name="messageID" value="<?php echo htmlspecialchars($row['messageID']);?>">
                                        <button type="submit" name="statusBtn">
                                            <i class="fa-solid fa-thumbs-up" title="Click to change status"></i>
                                        </button>
                                    </form>
                                    <form method="post" action="" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="messageID" value="<?php echo htmlspecialchars($row['messageID']);?>">
                                        <button type="submit" name="deleteBtn">
                                        <i class="fa-solid fa-trash-can" title="Click to Delete"></i>
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
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this message?');
        }
    </script>
</body>
</html>