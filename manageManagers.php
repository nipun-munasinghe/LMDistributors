<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Managers Page</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageManagers.css">

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
                <i class="fas fa-bars" id="toggle-sidebar"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <section class="mainSeparation">
                <div class="addManager">
                    <h2>Add Managers</h2>
                    <form action="#" method="POST" class="addForm">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="Enter your last name">
                        </div>
                        <div class="form-group">
                            <label for="assignWork">Assigned Work</label>
                            <input type="text" id="assignWork" name="assignWork" placeholder="Enter the assigned work for manager">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone1">Phone Number</label>
                            <input type="tel" id="phone1" name="phone1" placeholder="Enter your primary phone number">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter a password">
                        </div>
                        
                        <center>
                            <button type="submit" id="addBtn" name="addBtn" ><i class="fa-solid fa-user-plus"></i> Add Manager</button>
                        </center>
                    </form>
                </div>

                <div class="rightSide">
                    <div class="checkManager">
                        <h2>Check, Activate, Deactivate and Remove Managers</h2>
                        <div class="checkCard">
                            <form action="#" method="POST">
                                <input type="text" id="checkmail" name="checkmail" placeholder="Enter email" required>
                                <button id="checkMailBtn" name="checkMailBtn"><i class="fa-solid fa-magnifying-glass"></i> Check</button>
                                <div class="status">
                                    <label for="status"><strong>Status: </strong>Active</label>
                                </div>
                                <div class="btns">
                                    <button id="activate" name="activate">Activate <i class="fa-regular fa-thumbs-up"></i></button>
                                    <button id="deactivate" name="deactivate">Deactivate <i class="fa-solid fa-user-lock"></i></button>
                                    <button id="remove" name="remove">Remove <i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="managerList">
                        <h2>Manager List</h2>

                        <div class="custom-scroll">
                            <div class="content" id="scrollable-content">
                                <table class="listTable" border="1px">
                                    <tr>
                                        <th class="tFName">First Name</th>
                                        <th class="tLName">Last Name</th>
                                        <th class="tType">Assign Type</th>
                                        <th class="tMail">Email</th>
                                        <th class="tPhone">Phone Number</th>
                                        <th class="tStatus">Status</th>
                                    </tr>
                                    <tr>
                                        <td>Susantha</td>
                                        <td>Perera</td>
                                        <td>Product Manager</td>
                                        <td>manager.susantha@gmail.com</td>
                                        <td>0772274083</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>Siriwardhana</td>
                                        <td>Silvage</td>
                                        <td>Supply Manager</td>
                                        <td>manager.silvas@gmail.com</td>
                                        <td>0712514562</td>
                                        <td>Non-Active</td>
                                    </tr>
                                    <tr>
                                        <td>Ishini</td>
                                        <td>Maneesha</td>
                                        <td>Order Manager</td>
                                        <td>manager.ishini@gmail.com</td>
                                        <td>0712512587</td>
                                        <td>Active</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
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