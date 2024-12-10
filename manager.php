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
            <div class="sidebar-header">
                <h2>Manager Dashboard</h2>
                <i title="close" class="fas fa-times" id="close-sidebar"></i>
            </div>

            <ul class="sidebar-menu">
                <li><a href="./manager.php" title="Your Profile"><i class="fa-solid fa-user"></i> My Profile</a></li>
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
                <i class="fas fa-bars" id="toggle-sidebar"></i>
                <h1>Welcome ManagerName!</h1>
            </div>

            <!-- Manager Profile -->
            <section class="manager-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Manager Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> Manager Name</p>
                        <p><strong>Email:</strong> manager@gmail.com</p>
                        <p><strong>Phone:</strong> +94 73 456 7890</p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'"><i class="fa-solid fa-pen"></i> Edit Profile</button>
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