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
            <div class="sidebar-header">
                <h2>Admin Dashboard</h2>
                <i class="fas fa-times" id="close-sidebar" title="Close Dashboard"></i>
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
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <h2 class="displayOrdersH2">All orders <i class="fa-solid fa-box-open"></i></h2>

            <center>
            <div class="displayOrders">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="orderID">Order Number</th>
                                <th class="orderDate">Order Date</th>
                                <th class="customerName">Customer Name</th>
                                <th class="customerPhone1">Phone 1</th>
                                <th class="customerPhone2">Phone 2</th>
                                <th class="customerAddress">Address</th>
                                <th class="tName">Product Name</th>
                                <th class="tQuantity">Quantity</th>
                                <th class="tPrice">Price (Rs. )</th>
                                <th class="totalPrice">Total Price(Rs.)</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="orderID">1</td>
                                <td class="orderDate">2024-05-15</td>
                                <td class="customerName">Shehara Gihethmi</td>
                                <td class="customerPhone1">0777431661</td>
                                <td class="customerPhone2">0718567899</td>
                                <td class="customerAddress">no 125/A, big brain road, Kollupitiya, Sri Lanka.</td>
                                <td class="tName">Coconut Oil</td>
                                <td class="tQuantity">5</td>
                                <td class="tPrice">500.00</td>
                                <td class="totalPrice">2500.00</td>
                                <td class="tStatus">Pending</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="orderID">2</td>
                                <td class="orderDate">2024-08-15</td>
                                <td class="customerName">Shehan Gihethma</td>
                                <td class="customerPhone1">077 2431661</td>
                                <td class="customerPhone2">071 4567899</td>
                                <td class="customerAddress">no 15/A, Nelum Uyana road, Kuliyapitiya, Sri Lanka.</td>
                                <td class="tName">Coconut spoon</td>
                                <td class="tQuantity">10</td>
                                <td class="tPrice">100.00</td>
                                <td class="totalPrice">1000.00</td>
                                <td class="tStatus">Completed</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="orderID">3</td>
                                <td class="orderDate">2024-09-25</td>
                                <td class="customerName">Nurawi Gihethmini</td>
                                <td class="customerPhone1">077 2430661</td>
                                <td class="customerPhone2">071 9567899</td>
                                <td class="customerAddress">no 125/A, Keselgas mawatha, Chilaw, Sri Lanka.</td>
                                <td class="tName">Coconut Mat</td>
                                <td class="tQuantity">1</td>
                                <td class="tPrice">500.00</td>
                                <td class="totalPrice">500.00</td>
                                <td class="tStatus">Shipped</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="orderID">4</td>
                                <td class="orderDate">2024-09-28</td>
                                <td class="customerName">Sumudi Samarakoon</td>
                                <td class="customerPhone1">+94772431610</td>
                                <td class="customerPhone2">+94714567949</td>
                                <td class="customerAddress">No 12, Kaludiya pokuna road, Hiripitiya, Nugegoda, Sri Lanka.</td>
                                <td class="tName">White Coconut Oil</td>
                                <td class="tQuantity">5</td>
                                <td class="tPrice">600.00</td>
                                <td class="totalPrice">3000.00</td>
                                <td class="tStatus">Pending</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="orderID">5</td>
                                <td class="orderDate">2024-11-11</td>
                                <td class="customerName">Sihali Weerarathna</td>
                                <td class="customerPhone1">077 2431661</td>
                                <td class="customerPhone2">071 4567899</td>
                                <td class="customerAddress">18/5, A1 road, Negombo, Sri Lanka.</td>
                                <td class="tName">Coconut water 200ml</td>
                                <td class="tQuantity">50</td>
                                <td class="tPrice">80.00</td>
                                <td class="totalPrice">4000.00</td>
                                <td class="tStatus">Shipped</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
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
</body>
</html>