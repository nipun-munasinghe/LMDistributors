<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageProducts.css">

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

            <h2 class="hiddenFormH2">Looking for add a new product? </h2>
            <center>
                <button type="submit" class="hiddenFormBtn" id="hiddenFormBtn" name="hiddenFormBtn">Add New Product</button>
            </center>

            <div id="formContainer" class="hidden">
                <form id="hiddenForm">
                    <h2>Add Product</h2>
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" placeholder="Enter product name" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="3" placeholder="Enter small description"></textarea>

                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Enter your email" required>

                    <div class="buttons">
                        <button type="submit">Submit</button>
                        <button type="button" id="cancelBtn">Cancel</button>
                    </div>
                </form>
            </div>

            <h2 class="displayProductH2">Products we already published</h2>

            <center>
            <div class="displayProducts">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="productID">Product Number</th>
                                <th class="tName">Product Name</th>
                                <th class="tDescription">Product Description</th>
                                <th class="tPrice">Price (Rs. )</th>
                                <th class="tProductImg">Product Image</th>
                                <th class="tCategory">Category</th>
                                <th class="tQuantity">Quantity</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <tr>
                                <td class="productID">1</td>
                                <td class="tName">Coconut Oil</td>
                                <td class="tDescription">High-quality coconut oil</td>
                                <td class="tPrice">550.00</td>
                                <td class="tProductImg"><img src="./images/slide1.jpg" alt="Product Image" class="productImg"></td>
                                <td class="tCategory">Coconut Oil</td>
                                <td class="tQuantity">100 liters</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="productID">2</td>
                                <td class="tName">White Coconut Oil</td>
                                <td class="tDescription">High-quality white coconut oil</td>
                                <td class="tPrice">650.00</td>
                                <td class="tProductImg"><img src="./images/slide3.jpg" alt="Product Image" class="productImg"></td>
                                <td class="tCategory">Coconut Oil</td>
                                <td class="tQuantity">160 liters</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="productID">3</td>
                                <td class="tName">Coconut Spoon</td>
                                <td class="tDescription">High-quality coconut spoon</td>
                                <td class="tPrice">100.00</td>
                                <td class="tProductImg"><img src="./images/slide2.jpg" alt="Product Image" class="productImg"></td>
                                <td class="tCategory">Coconut Products</td>
                                <td class="tQuantity">238 quantities</td>
                                <td class="tAction"><a href="#"><i class="fa-solid fa-edit"></i></a> | <a href="#"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="productID">4</td>
                                <td class="tName">Coconut Leaf Mat</td>
                                <td class="tDescription">High-quality coconut Mat</td>
                                <td class="tPrice">950.00</td>
                                <td class="tProductImg"><img src="./images/beach-background-with-two-coconuts.jpg" alt="Product Image" class="productImg"></td>
                                <td class="tCategory">Coconut Products</td>
                                <td class="tQuantity">100 quantities</td>
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
                    <a href="./admin.php"><i class="fa-solid fa-user"></i><br>My Profile</a>
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

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>