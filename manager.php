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
            // welcome user with birthday message
            $greeting = 'Happy birthday '.htmlspecialchars($_SESSION['user_fName'].'!');
        }
        else {
            // welcome user with welcome message
            $greeting = 'Welcome '.htmlspecialchars($_SESSION['user_fName'].'!');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manager.css">

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

            <!-- Manager Profile -->
            <section class="manager-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" alt="Manager Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo $_SESSION['fullName']; ?></p>
                        <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $_SESSION['user_phone']; ?></p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'" title="Edit Profile"><i class="fa-solid fa-pen"></i> Edit Profile</button>
                    </div>
                </div>
            </section>

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./todayPrice.php" title="Update Price List"><i class="fa-solid fa-money-bill-1-wave"></i><br>Today's Price List</a>
                </div>
                <div class="card">
                    <a href="./buyersManagement.php" title="Buyers Management"><i class="fa-solid fa-handshake"></i><br>Manage Buyers</a>
                </div>
                <div class="card">
                    <a href="./supplyManagement.php" title="Suppliers Management"><i class="fa-solid fa-business-time"></i><br>Manage Suppliers</a>
                </div>
                <div class="card">
                    <a href="./manageProducts.php" title="Products Management"><i class="fa-solid fa-store"></i><br>Manage Products</a>
                </div>
                <div class="card">
                    <a href="./manageOrders.php" title="Orders Management"><i class="fa-solid fa-cart-shopping"></i><br>Manage Orders</a>
                </div>
                <div class="card">
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>