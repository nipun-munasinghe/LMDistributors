<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- link css -->
    <link rel="stylesheet" href="./css/customer.css">

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
                <h2>Customer Profile</h2>
                <i class="fas fa-times" id="close-sidebar"></i>
            </div>
            <ul class="sidebar-menu">
                <li><a href="./customer.php"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="./products.php"><i class="fas fa-box-open"></i> Products</a></li>
                <li><a href="./accSettings.php"><i class="fa-solid fa-wrench"></i> Account Settings</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar"></i>
                <h1>Welcome CustomerName!</h1>
            </div>

            <!-- Customer Profile -->
            <section class="customer-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Admin Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> Customer Name</p>
                        <p><strong>Email:</strong> customer@gmail.com</p>
                        <p><strong>Phone:</strong> +94 78 456 7880</p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'">Edit Profile</button>
                    </div>
                </div>
            </section>

            <h2>Some of Our Products</h2>
            <div class="slideshow-container">
                <!-- Slide 1 -->
                <div class="slide fade">
                    <img src="./images/slide1.jpg" alt="Slide 1">
                </div>
                <!-- Slide 2 -->
                <div class="slide fade">
                    <img src="./images/slide2.jpg" alt="Slide 2">
                </div>
                <!-- Slide 3 -->
                <div class="slide fade">
                    <img src="./images/slide3.jpg" alt="Slide 3">
                </div>
                <!-- Slide 4 -->
                <div class="slide fade">
                    <img src="./images/slide4.jpg" alt="Slide 4">
                </div>
            </div>

            <h2>Quick Actions</h2>
            <div class="cards">
                <div class="products">
                    <a href="./products.php"><i class="fas fa-box-open"></i><br>Products</a>
                </div>

                <div class="settings">
                    <a href="./accSettings.php"><i class="fa-solid fa-wrench"></i><br>Account Settings</a>
                </div>
            </div>

            <br>
        </div>
    </div>
    
    <script src="./js/sideBar.js"></script>

</body>
</html>