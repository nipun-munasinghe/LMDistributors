<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/accSettings.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Hidden Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h2>Customer Profile</h2>
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
        <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>

        <section class="profile-section">
            <h2>Profile Details</h2>
            <form id="profile-form">
                <div class="form-group">
                    <center>
                        <img src="images/default-profile.png" alt="Profile Picture" class="profile-pic" id="profile-pic-preview">
                    </center>
                    <input type="file" id="profile-pic" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" id="birthday" name="birthday" placeholder="dd/mm/yyyy" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone1">Phone Number 1</label>
                    <input type="tel" id="phone1" name="phone1" placeholder="Enter your primary phone number" required>
                </div>
                <div class="form-group">
                    <label for="phone2">Phone Number 2</label>
                    <input type="tel" id="phone2" name="phone2" placeholder="Enter your alternate phone number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" rows="3" name="address" placeholder="Enter your address" required></textarea>
                </div>
                
                <center>
                    <button type="submit" id="detailsBtn" name="detailsBtn" >Update Details</button>
                </center>
            </form>
        </section>

        <section class="change-pwd">
            <form>
                <h2>Password Settings</h2>

                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter current password">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="reEnterPassword">New Password Again</label>
                    <input type="password" id="reEnterPassword" name="reEnterPassword" placeholder="Enter new password again">
                </div>

                <center>
                    <button type="submit" id="pwdBtn" name="pwdBtn">Change Password</button>
                </center>
            </form>
        </section>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/profilePicPreview.js"></script>
</body>
</html>