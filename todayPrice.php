<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Prices List</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/commonProfile.css">

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
                <i class="fas fa-times" id="close-sidebar"></i>
            </div>

            <ul class="sidebar-menu">
                <li><a href="./admin.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a href="./manageManagers.php"><i class="fas fa-user-tie"></i> Manage Managers</a></li>
                <li><a href="./manageProducts.php"><i class="fa-solid fa-store"></i> Manage Products</a></li>
                <li><a href="./manageOrders.php"><i class="fa-solid fa-cart-shopping"></i> Manage Orders</a></li>
                <li><a href="./todayPrice.php"><i class="fa-solid fa-money-bill-1-wave"></i> Today's Price List</a></li>
                <li><a href="./viewIncome.php"><i class="fas fa-chart-line"></i> View Income</a></li>
                <li><a href="./accSettings.php"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <div class="bodySeparation">
                <div class="toBuyers">
                    <h2>Price For Buyers</h2>
                    <div class="inputCard">
                        <input type="number" min="0" step="0.01" id="buyerPrice" name="buyerPrice" placeholder="Enter Today's Price...">
                        <button class="addBtn" id="buyerPriceBtn" name="buyerPriceBtn" type="submit">Add Buyer's Price</button>
                    </div>
                    <div class="displayCard">
                        <p>Today's Price for Buyers:</p>
                        <br>
                        <div id="displayPrices"><p>Rs. <strong>150.00</strong> Per kg</p></div>
                    </div>
                </div>

                <div class="toSuppliers">
                    <h2>Price For Suppliers</h2>
                    <div class="inputCard">
                        <input type="number" min="0" step="0.01" id="supplierPrice" name="supplierPrice" placeholder="Enter Today's Price...">
                        <button class="addBtn" id="supplierPriceBtn" name="supplierPriceBtn" type="submit">Add Supplier's Price</button>
                    </div>
                    <div class="displayCard">
                        <p>Today's Price for Suppliers:</p>
                        <br>
                        <div id="displayPrices"><p>Rs. <strong>140.50</strong> Per kg</p></div>
                    </div>
                </div>
            </div>




            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./admin.php"><i class="fa-solid fa-user"></i><br>My Profile</a>
                </div>
                <div class="card">
                    <a href="./manageManagers.php"><i class="fas fa-user-tie"></i><br>Manage Managers</a>
                </div>
                <div class="card">
                    <a href="./manageProducts.php"><i class="fa-solid fa-store"></i><br>Manage Products</a>
                </div>
                <div class="card">
                    <a href="./manageOrders.php"><i class="fa-solid fa-cart-shopping"></i><br>Manage Orders</a>
                </div>
                <div class="card">
                    <a href="./viewIncome.php"><i class="fas fa-chart-line"></i><br>View Income</a>
                </div>
                <div class="card">
                    <a href="./accSettings.php"><i class="fas fa-cog"></i><br>Settings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <?php include 'footer.php'; ?>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>