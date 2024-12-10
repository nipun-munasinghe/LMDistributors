<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Profile</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/buyer.css">

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
                <h2>Buyer Dashboard</h2>
                <i title="Close" class="fas fa-times" id="close-sidebar" title="Close Dashboard"></i>
            </div>

            <ul class="sidebar-menu">
                <li><a href="./buyer.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a href="./accSettings.php"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1>Welcome BuyerName!</h1>
            </div>

            <!-- Buyer Profile -->
            <section class="buyer-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Buyer Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> Buyer Name</p>
                        <p><strong>Email:</strong> buyer@gmail.com</p>
                        <p><strong>Phone:</strong> +94 73 456 7890</p>
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
            
            <div class="requestOrder">
                <h2>Request an Order</h2>
                <center>
                    <form action="#" method="POST" class="reqForm">
                        <div class="separation">
                            <label for="orderName">Order name: </label>
                            <input type="text" id="orderName" name="orderName" value="Buyer Name" required>
                        </div>
                        <div class="separation">
                            <label for="phone">Phone number: </label>
                            <input type="tel" id="phone" name="phone" value="0772121200" required>
                        </div>
                        <div class="separation">
                            <label for="orderQty">Quantity (kg): </label>
                            <input type="number" id="orderQty" name="orderQty" min="1000" value="1000" required>
                        </div>
                        <div class="separation">
                            <label for="yourPrice">Your price (Rs. per kg): </label>
                            <input type="number" id="yourPrice" name="yourPrice" step="0.01" min="130.50" value="130.50" required>
                        </div>
                        <div class="separation">
                            <label for="orderDate">Date, the order do you want: </label>
                            <input type="date" id="date" name="orderDate" min="" required>
                        </div>
                        <div class="separation">
                            <label for="comments">Special Comments (optional): </label>
                            <textarea type="comments" id="comments" name="comments" placeholder="Add some special comments..."></textarea>
                        </div>
                        <center>
                            <button type="submit" id="submitBtn" name="submitBtn" class="reqSubmitBtn" title="Submit Details">Submit <i class="fa-solid fa-paper-plane"></i></button>
                        </center>
                    </form>
                </center>
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

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <!-- link scripts -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/buyer.js"></script>
</body>
</html>