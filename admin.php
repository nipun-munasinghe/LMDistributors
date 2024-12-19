<?php
// start the sessions
    session_start();

    require_once 'config.php';

    //check user logged in
    if (!isset($_SESSION['user_fName'])) {
        //user is not logged in
        header('Location: login.php');
        exit();
    }
    else {
        //fetch user data from sessions
        $fName = $_SESSION['user_fName'];
        $fullName = $_SESSION['fullName'];
        $email = $_SESSION['user_email'];
        $phone = $_SESSION['user_phone'];
        $birthday = $_SESSION['user_dob'];

        //check user's b'day
        $currentDate = date('m-d');
        echo $currentDate;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/admin.css">

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
                <h1>Welcome <?php echo $fName; ?>!</h1>
            </div>

            <!-- Admin Profile -->
            <section class="admin-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Admin Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo $fullName; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                        <button class="btn edit-profile" title="Edit Profile" onclick="window.location.href='./accSettings.php'"><i class="fa-solid fa-pen"></i> Edit Profile</button>
                    </div>
                </div>
            </section>

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

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>