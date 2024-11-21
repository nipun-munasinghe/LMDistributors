<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/customer.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>Customer Dashboard</h2>
            <i class="fas fa-times" id="close-sidebar"></i>
        </div>
        <ul>
            <li><a href="#profile"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#orders"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="#products"><i class="fas fa-box-open"></i> Products</a></li>
            <li><a href="#logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
            <i class="fas fa-bars" id="open-sidebar"></i>
            <h1>Welcome to Your Profile</h1>

        <section class="profile-section">
            <h2>Profile Details</h2>
            <form id="profile-form">
                <div class="form-group">
                    <label for="profile-pic">Profile Picture</label>
                    <img src="images/default-profile.png" alt="Profile Picture" class="profile-pic" id="profile-pic-preview">
                    <input type="file" id="profile-pic" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" placeholder="Enter your last name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone1">Phone Number 1</label>
                    <input type="tel" id="phone1" placeholder="Enter your primary phone number" required>
                </div>
                <div class="form-group">
                    <label for="phone2">Phone Number 2</label>
                    <input type="tel" id="phone2" placeholder="Enter your alternate phone number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" rows="3" placeholder="Enter your address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="password">Change Password</label>
                    <input type="password" id="password" placeholder="Enter new password">
                </div>
                <center>
                    <button type="submit">Update Details</button>
                </center>
            </form>
        </section>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/customer.js"></script>
</body>
</html>