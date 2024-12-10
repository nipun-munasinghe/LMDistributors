<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Prices List</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/todayPrice.css">

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
                <i class="fas fa-times" id="close-sidebar" title="Close Side Bar"></i>
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
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Side Bar"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <div class="bodySeparation">
                <div class="toBuyers">
                    <h2><i class="fa-regular fa-handshake"></i> Price For Buyers</h2>
                    <div class="inputCard">
                        <form action="#" method="POST">
                            <input type="number" min="0" step="0.01" id="buyerPrice" name="buyerPrice" placeholder="Enter Today's Price for Buyers..." required>
                            <button class="addBtn" id="buyerPriceBtn" name="buyerPriceBtn" type="submit" title="Add Price">Add Buyer's Price</button>
                        </form>
                    </div>
                    <br>
                    <div class="displayCard">
                        <p class="priceLabel">Today's Price for Buyers:</p>
                        <div class="displayPrices"><p>Rs. <strong>150.00</strong> Per kg</p></div>
                    </div>
                </div>

                <div class="toSuppliers">
                    <h2><i class="fa-solid fa-cubes"></i> Price For Suppliers</h2>
                    <div class="inputCard">
                        <form action="#" method="POST">
                            <input type="number" min="0" step="0.01" id="supplierPrice" name="supplierPrice" placeholder="Enter Today's Price for Suppliers..." required>
                            <button class="addBtn" id="supplierPriceBtn" name="supplierPriceBtn" type="submit" title="Add Price">Add Supplier's Price</button>
                        </form>
                    </div>
                    <br>
                    <div class="displayCard">
                        <p class="priceLabel">Today's Price for Suppliers:</p>
                        <div class="displayPrices"><p>Rs. <strong>140.50</strong> Per kg</p></div>
                    </div>
                </div>
            </div>

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
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
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