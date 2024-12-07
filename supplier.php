<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/supplier.css">

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
                <h2>Supplier Dashboard</h2>
                <i title="Close" class="fas fa-times" id="close-sidebar"></i>
            </div>

            <ul class="sidebar-menu">
                <li><a href="./supplier.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a href="./accSettings.php"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Dashboard"></i>
                <h1>Welcome SupplierName!</h1>
            </div>

            <!-- Supplier Profile -->
            <section class="supplier-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Supplier Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> Supplier Name</p>
                        <p><strong>Email:</strong> supplier@gmail.com</p>
                        <p><strong>Phone:</strong> +94 73 456 7891</p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'" title="Edit Profile"><i class="fa-solid fa-pen"></i> Edit Profile</button>
                    </div>
                </div>
            </section>

            <div class="todayPrice">
                <h2>L.M. Distributors' Today Price</h2>
                <div class="priceContainer">
                    <p>Today Price: <strong>Rs. 130.50</strong> per 1kg</p>
                </div>
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

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>