<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyers Management</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/buyersManagement.css">

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

            <h2 class="displaySuppliersH2">Buyers' Management Details</h2>

            <center>
            <div class="displaySuppliers">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="buyID">Buy ID</th>
                                <th class="buyerName">Buyer Name</th>
                                <th class="reqDate">Requested Date</th>
                                <th class="wantedDate">Wanted Date</th>
                                <th class="buyQuantity">Quantity(kg)</th>
                                <th class="ourPrice">Our Price (Rs.)</th>
                                <th class="theirPrice">Their Price (Rs.)</th>
                                <th class="Phone">Phone</th>
                                <th class="comments">Comments</th>
                                <th class="tStatus">Status</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="buyID">1</td>
                                <td class="buyerName">Jayindi Coconut Products</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="wantedDate">10/12/2024</td>
                                <td class="buyQuantity">2000</td>
                                <td class="ourPrice">130.50</td>
                                <td class="theirPrice">130.50</td>
                                <td class="Phone">0788753442</td>
                                <td class="comments">null</td>
                                <td class="tStatus">Rejected</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="buyID">2</td>
                                <td class="buyerName">Kamalsiri Hewage</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="wantedDate">11/12/2024</td>
                                <td class="buyQuantity">3000</td>
                                <td class="ourPrice">130.50</td>
                                <td class="theirPrice">131.50</td>
                                <td class="Phone">0788763492</td>
                                <td class="comments">Higher Price</td>
                                <td class="tStatus">Accepted</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="buyID">3</td>
                                <td class="buyerName">Negombo Coco Products</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="wantedDate">12/12/2024</td>
                                <td class="buyQuantity">8000</td>
                                <td class="ourPrice">130.50</td>
                                <td class="theirPrice">130.50</td>
                                <td class="Phone">0788753654</td>
                                <td class="comments">Eight thousand coconuts</td>
                                <td class="tStatus">Accepted</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="buyID">4</td>
                                <td class="buyerName">Himanthara Coco Products</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="wantedDate">15/12/2024</td>
                                <td class="buyQuantity">10000</td>
                                <td class="ourPrice">130.50</td>
                                <td class="theirPrice">133.50</td>
                                <td class="Phone">0788753440</td>
                                <td class="comments">We give highest price for your coconuts</td>
                                <td class="tStatus">Accepted</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                            <tr>
                                <td class="buyID">5</td>
                                <td class="buyerName">Valentine mills</td>
                                <td class="reqDate">08/12/2024</td>
                                <td class="wantedDate">15/12/2024</td>
                                <td class="buyQuantity">1000</td>
                                <td class="ourPrice">130.50</td>
                                <td class="theirPrice">130.50</td>
                                <td class="Phone">0788753482</td>
                                <td class="comments">null</td>
                                <td class="tStatus">null</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-thumbs-up" title="Accept"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-thumbs-down" title="Reject"></i></a> | 
                                                    <a href="#"><i class="fa-solid fa-trash-can" title="Delete"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            </center>
            

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
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
                    <a href="./todayPrice.php"><i class="fa-solid fa-money-bill-1-wave"></i><br>Today's Price List</a>
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

    <!-- link scripts -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>