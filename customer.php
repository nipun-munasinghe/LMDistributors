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
            <li><a href="./customer.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#orders"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="./products.php"><i class="fas fa-box-open"></i> Products</a></li>
            <li><a href="./accSettings.php"><i class="fa-solid fa-wrench"></i> Account Settings</a></li>
            <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
            <i class="fas fa-bars" id="open-sidebar"></i>
            <h1>Welcome to Your Profile</h1>

        
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/customer.js"></script>
</body>
</html>