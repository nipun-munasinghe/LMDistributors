<?php
    // start sessions
    session_start();

    // include database config file
    include_once 'config.php';

    // check user is logged or not
    if(isset($_SESSION['user_fName']) && $_SESSION['user_type'] == 'buyer') {
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));
        // check user's birthday
        if($birthday == $today) {
            // display birthday message
            $greeting = "Happy birthday ".$_SESSION['user_fName']."!";
        }
        else {
            // display welcome message
            $greeting = "Welcome ".$_SESSION['user_fName']."!";
        }

        // get today's price from the database
        $todayPriceSql = "SELECT price FROM buyerprice";
        $todayPriceResult = mysqli_query($conn, $todayPriceSql);
        if (!$todayPriceResult) {
            die("Query failed: " . mysqli_error($conn));
        }

        $todayPriceRow = mysqli_fetch_assoc($todayPriceResult);
        $todayPrice = $todayPriceRow['price'];

        //Fetch details from user_info
        $userID = $_SESSION['user_id'];

        $sql = "SELECT * FROM user_info WHERE `userID` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // request order form
        if (isset($_POST['submitBtn'])) {
            $orderName = htmlspecialchars($_POST['orderName']);
            $reqDate = date('Y-m-d');
            $orderDate = $_POST['orderDate'];
            $orderQty = intval($_POST['orderQty']);
            $theirPrice = floatval($_POST['yourPrice']);
            $phone = htmlspecialchars($_POST['phone']);
            $comments = htmlspecialchars($_POST['comments']);
            $status = 'Not Selected';
        
            // Insert the data into the database
            $sql = "INSERT INTO buyer (`name`, reqDate, wantedDate, quantity, ourPrice, theirPrice, phone, comments, `status`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiddiss", $orderName, $reqDate, $orderDate, $orderQty, $todayPrice, $theirPrice, $phone, $comments, $status);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                echo "<script>
                        alert('Order placed successfully!');
                        window.location.href = 'buyer.php';
                      </script>";
            }
            else {
                echo "Failed to place the order: " . $conn->error;
            }
        }
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
    <title>Buyer Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/buyer.css">

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

            <!-- Buyer Profile -->
            <section class="buyer-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" alt="Buyer Profile Picture" class="profile-pic">
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
                    <p>Today Price: <strong>Rs. <?php echo htmlspecialchars($todayPrice); ?></strong> per 1kg</p>
                </div>
            </div>
            
            <div class="requestOrder">
                <h2>Request an Order</h2>
                <center>
                    <form action="buyer.php" method="POST" class="reqForm">
                        <div class="separation">
                            <label for="orderName">Order name: </label>
                            <input type="text" id="orderName" name="orderName" 
                                   value="<?php echo htmlspecialchars($row['fName']).' '.htmlspecialchars($row['lName']); ?>" required>
                        </div>
                        <div class="separation">
                            <label for="phone">Phone number: </label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone1']); ?>" required>
                        </div>
                        <div class="separation">
                            <label for="orderQty">Quantity (kg): </label>
                            <input type="number" id="orderQty" name="orderQty" min="1000" value="1000" required>
                        </div>
                        <div class="separation">
                            <label for="yourPrice">Your price (Rs. per kg): </label>
                            <input type="number" id="yourPrice" name="yourPrice" step="0.01" 
                                   min="<?php echo htmlspecialchars($todayPrice); ?>" value="<?php echo htmlspecialchars($todayPrice); ?>" required>
                        </div>
                        <div class="separation">
                            <label for="orderDate">Date, the order do you want: </label>
                            <input type="date" id="date" name="orderDate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="separation">
                            <label for="comments">Special Comments (optional): </label>
                            <textarea type="comments" id="comments" name="comments" placeholder="Add some special comments..."></textarea>
                        </div>
                        <center>
                            <button type="submit" id="submitBtn" name="submitBtn" class="reqSubmitBtn" title="Submit Details">
                                Submit <i class="fa-solid fa-paper-plane"></i>
                            </button>
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

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <!-- link scripts -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/buyer.js"></script>
</body>
</html>